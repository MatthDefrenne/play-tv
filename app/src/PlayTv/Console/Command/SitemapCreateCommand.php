<?php

namespace PlayTv\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Monolog\Logger;
use Symfony\Bridge\Monolog\Handler\ConsoleHandler;
use Monolog\Handler\StreamHandler;
use PlayTv\Application;
use PlayTv\Sitemap\SitemapIndex;
use PlayTv\Core\Website;

class SitemapCreateCommand extends Command
{
    private $app;
    private $logger;
    private $routerResolver;
    private $sitemapResolver;
    private $router;
    private $tempDir;
    private $website;
    private $domain;
    private $targetDir;
    private $scheme;

    public function __construct(Application $app)
    {
        $this->app = $app;
        parent::__construct(null);
    }

    protected function configure()
    {
        $this
            ->setName('sitemap:create')
            ->addArgument(
                'domain',
                InputArgument::REQUIRED,
                'Domain name'
            )
            ->addOption(
                'https',
                null,
                InputOption::VALUE_NONE,
                'Use https:// scheme'
            );
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->routerResolver = $this->app['router_resolver'];
        $this->sitemapResolver = $this->app['sitemap_resolver'];
        $this->scheme = $input->getOption('https') ? 'https' : 'http';

        $domain = $input->getArgument('domain');
        $this->website = new Website($this->app['host_resolver']->getKeyForHost($domain), $domain, $this->app['host_resolver']->getCountryForHost($domain));

        $this->app['sdk']['services.channel']->setStreamsCollection(
            $this->app['sdk']['services.channel.stream']->collection($this->website->getCountry() ?: 'FR')
        );

        $this->logger = new Logger('sitemap.create');
        $this->logger->pushHandler(new ConsoleHandler($output));
        $this->logger->pushHandler(new StreamHandler(sprintf('%s/sitemap.log', $this->app['app.log_dir'])));
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        ini_set('memory_limit', '512M');

        $this->domain = $input->getArgument('domain');
        $this->targetDir = $this->sitemapResolver->getPath($this->domain);
        $this->tempDir = $this->createTempDir();

        $router = $this->routerResolver->getRouter($this->domain);
        $routes = $router->getRouteCollection();

        foreach ($routes as $name => $route) {
            if ($route->hasOption('sitemap') && $route->getOption('sitemap')) {
                if (!$route->hasOption('sitemap_builder')) {
                    $this->logger->warn(sprintf('No sitemap_builder option for route %s', $name));
                    continue;
                }

                $class = $route->getOption('sitemap_builder');

                if (!class_exists($class)) {
                    $this->logger->warn(sprintf('Class %s does not exist', $class));
                    continue;
                }

                $this->logger->info(sprintf('Building sitemap for route "%s"', $name));

                $builder = new $class(
                    $this->app['sdk']['database'],
                    $this->app['sdk']['services.channel'],
                    $router->getGenerator(),
                    $this->logger,
                    $this->tempDir
                );
                $builder->setScheme($this->scheme);
                $builder->build($this->website, $name, $route);
            }
        }

        $this->logger->info('Compressing sitemaps and building sitemap index...');
        $this->gzipSitemaps();
        $this->buildSitemapIndex();

        if (!is_writable($this->targetDir)) {
            $this->logger->error(sprintf('Folder %s is not writable', $this->targetDir));

            return 1;
        }

        $this->logger->info('Moving files to '.$this->targetDir.'...');
        $this->moveFiles();
    }

    private function buildSitemapIndex()
    {
        $files = glob($this->tempDir.'/*.xml.gz');

        $sitemapIndex = new SitemapIndex();
        foreach ($files as $file) {
            $sitemapIndex->add(sprintf('%s://%s/%s', $this->scheme, $this->domain, basename($file)));
        }

        $prefix = $this->scheme === 'http' ? 'sitemap-' : 'sitemap-https-';
        $sitemapIndex->write($this->tempDir.'/'.$prefix.'index.xml');
    }

    private function createTempDir()
    {
        $dir = realpath($this->app['app.root_dir']).'/.sitemap';
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $files = array_merge(
            glob($dir.'/*.xml'),
            glob($dir.'/*.xml.gz')
        );

        foreach ($files as $file) {
            unlink($file);
        }

        return $dir;
    }

    private function gzipSitemaps()
    {
        $files = glob($this->tempDir.'/*.xml');
        foreach ($files as $file) {
            $gzf = gzopen($this->tempDir.'/'.basename($file).'.gz', 'w');
            gzwrite($gzf, file_get_contents($file));
            gzclose($gzf);
            unlink($file);
        }
    }

    private function moveFiles()
    {
        $files = glob($this->tempDir.'/sitemap-*');
        foreach ($files as $file) {
            rename($file, $this->targetDir.'/'.basename($file));
        }
    }
}

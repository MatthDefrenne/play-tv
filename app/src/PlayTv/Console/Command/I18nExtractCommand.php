<?php

namespace PlayTv\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Loader\PoFileLoader;
use Symfony\Component\Translation\Catalogue\DiffOperation;
use Symfony\Component\Translation\Writer\TranslationWriter;
use Symfony\Bridge\Twig\Translation\TwigExtractor;
use PlayTv\Application;
use Playmedia\Translation\Dumper\PotFileDumper;
use Playmedia\Translation\Extractor\PhpExtractor;

class I18nExtractCommand extends Command
{
    private $app;
    private static $skipDomains = [
        'seo',
    ];

    public function __construct(Application $app)
    {
        $this->app = $app;
        parent::__construct(null);
    }

    protected function configure()
    {
        $this
            ->setName('i18n:extract');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sourceCatalogue = new MessageCatalogue('en');
        $targetCatalogue = new MessageCatalogue('en');

        $output->writeln('Loading current catalogue...');
        $loader = new PoFileLoader();
        $finder = new Finder();
        $files = $finder->files()->name('*.pot')->in($this->app['app.root_dir'].'app/locales/');

        // Do not load domains to skip
        foreach (self::$skipDomains as $domain) {
            $files->notName("{$domain}.pot");
        }

        foreach ($files as $file) {
            $domain = $file->getBasename('.pot');
            $sourceCatalogue->addCatalogue($loader->load($file->getPathname(), 'en', $domain));
        }
        $output->writeln('Done.');

        // Extract from PHP files
        $output->writeln('Extracting translations from PHP files...');
        $phpExtractor = new PhpExtractor();
        $phpExtractor->setIgnoredFiles([
            'app_controller.php',
        ]);
        $phpExtractor->extract($this->app['app.root_dir'].'app/src', $targetCatalogue);
        $phpExtractor->extract($this->app['app.root_dir'].'app/controllers', $targetCatalogue);
        $output->writeln('Done.');

        // Extract from Twig template
        $output->writeln('Extracting translations from Twig templates...');
        $twigExtractor = new TwigExtractor($this->app['twig']);
        $twigExtractor->extract($this->app['app.templates_dir'], $targetCatalogue);
        $output->writeln('Done.');

        // Remove domains to skip
        $allMessages = $targetCatalogue->all();
        foreach (self::$skipDomains as $domain) {
            unset($allMessages[$domain]);
        }
        $targetCatalogue = new MessageCatalogue($targetCatalogue->getLocale(), $allMessages);

        // Merge catalogues
        $operation = new DiffOperation($sourceCatalogue, $targetCatalogue);

        $catalogue = new MessageCatalogue('en');

        foreach ($operation->getDomains() as $domain) {
            $messages = $operation->getMessages($domain);

            if (count($operation->getObsoleteMessages($domain)) > 0) {
                $output->writeln(sprintf('<comment>Found %d obsolete message(s) in domain "%s"</comment>', count($operation->getObsoleteMessages($domain)), $domain));
                foreach (array_keys($operation->getObsoleteMessages($domain)) as $key) {
                    unset($messages[$key]);
                }
            }

            if (count($operation->getNewMessages($domain)) > 0) {
                $output->writeln(sprintf('<info>Found %d new message(s) in domain "%s"</info>', count($operation->getNewMessages($domain)), $domain));
                $messages += $operation->getNewMessages($domain);
            }

            if (count($operation->getObsoleteMessages($domain)) > 0 || count($operation->getNewMessages($domain)) > 0) {
                $catalogue->add($messages, $domain);
            }
        }

        $translationsPath = $this->app['app.root_dir'].'app/locales';
        $writer = new TranslationWriter();
        $writer->addDumper('pot', new PotFileDumper());
        $writer->disableBackup();

        $output->writeln('Writing PO template files...');
        $writer->writeTranslations($catalogue, 'pot', ['path' => $translationsPath]);
        $output->writeln('Done.');
    }
}

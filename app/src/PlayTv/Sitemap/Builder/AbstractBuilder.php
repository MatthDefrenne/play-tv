<?php

namespace PlayTv\Sitemap\Builder;

use Doctrine\DBAL\Connection;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Exception\InvalidParameterException;
use Symfony\Component\Routing\Route;
use Psr\Log\LoggerInterface;
use Playmedia\Component\Channel as ChannelComponent;
use PlayTv\Sitemap\Sitemap;
use PlayTv\Core\Website;

abstract class AbstractBuilder
{
    protected $db;
    protected $channelComponent;
    protected $generator;
    protected $route;
    protected $targetDir;
    protected $scheme;

    public function __construct(Connection $db, ChannelComponent $channelComponent, UrlGeneratorInterface $generator, LoggerInterface $logger, $targetDir)
    {
        $this->db = $db;
        $this->channelComponent = $channelComponent;
        $this->generator = $generator;
        $this->logger = $logger;
        $this->targetDir = $targetDir;
        $this->scheme = 'http';
    }

    public function setScheme($scheme)
    {
        $this->scheme = mb_strtolower($scheme);
        $this->generator->getContext()->setScheme($this->scheme);
    }

    public function build(Website $website, $routeName, Route $route)
    {
        $count = $this->countItems();
        $pages = $this->countPages($count);

        for ($page = 1; $page <= $pages; ++$page) {
            $sitemap = new Sitemap($website->getHost(), $this->scheme);

            $stmt = $this->getItems($page);
            while ($item = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                try {
                    $item = $this->processItem($item, $route);
                    $url = $this->getUrl($item, $routeName, $route);

                    $sitemap->add($url, $this->getChangeFrequency());
                } catch (InvalidParameterException $e) {
                    $this->logger->warn($e->getMessage());
                }
            }

            // echo (string) $sitemap;
            $prefix = $this->scheme === 'http' ? 'sitemap-' : 'sitemap-https-';
            $file = $this->targetDir.'/'.$prefix.$this->getBasename().'-'.$page.'.xml';

            if ($sitemap->count() === 0) {
                $this->logger->warn(sprintf('Sitemap "%s" has no items, skip "%s" file', $this->getBasename(), $file));

                return;
            }

            $sitemap->write($file);
        }
    }

    protected function getUrl($item, $routeName, Route $route)
    {
        $parameters = $this->filterRouteParameters($this->getRouteParameters($item), $route->compile()->getPathVariables());

        return $this->generator->generate($routeName, $parameters);
    }

    protected function processItem($item, Route $route)
    {
        return $item;
    }

    protected function filterRouteParameters($parameters, array $variables = array())
    {
        return array_intersect_key($parameters, array_flip($variables));
    }

    protected function executeSelect($sql)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    protected function executeCount($sql)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_NUM);

        return $row[0];
    }

    protected function countPages($items)
    {
        return (int) ceil($items / Sitemap::MAX_URL_COUNT);
    }

    protected function limit($sql, $page = 1)
    {
        $offset = Sitemap::MAX_URL_COUNT * ($page - 1);
        $limit = Sitemap::MAX_URL_COUNT;

        return sprintf("$sql LIMIT %s, %s", $offset, $limit);
    }

    abstract protected function getBasename();

    abstract protected function getChangeFrequency();

    abstract protected function getRouteParameters($item);

    abstract protected function countItems();

    abstract protected function getItems($page);
}

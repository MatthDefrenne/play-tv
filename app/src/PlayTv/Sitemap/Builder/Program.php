<?php

namespace PlayTv\Sitemap\Builder;

use Symfony\Component\Routing\Route;
use Playmedia\Utils\Tool as Utils;

class Program extends AbstractBuilder
{
    protected function getBasename()
    {
        return 'programs';
    }

    protected function countItems()
    {
        return $this->executeCount('SELECT COUNT(program_id) FROM tv_programs');
    }

    protected function getItems($page)
    {
        return $this->executeSelect($this->limit('SELECT program_id AS id, title FROM tv_programs', $page));
    }

    protected function processItem($item, Route $route)
    {
        $item['alias'] = Utils::slugify($item['title']);

        return $item;
    }

    protected function getChangeFrequency()
    {
        return 'monthly';
    }

    protected function getRouteParameters($item)
    {
        return [
            'program_id' => $item['id'],
            'program_alias' => $item['alias'],
        ];
    }
}

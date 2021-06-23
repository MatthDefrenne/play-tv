<?php

namespace PlayTv\Sitemap\Builder;

use Symfony\Component\Routing\Route;
use Playmedia\Utils\Tool as Utils;

class Cast extends AbstractBuilder
{
    protected function getBasename()
    {
        return 'casts';
    }

    protected function countItems()
    {
        return $this->executeCount('SELECT COUNT(cast_id) FROM tv_casts');
    }

    protected function getItems($page)
    {
        return $this->executeSelect($this->limit('SELECT cast_id AS id, firstname, lastname FROM tv_casts', $page));
    }

    protected function processItem($item, Route $route)
    {
        if (empty($item['firstname'])) {
            $slug = Utils::slugify($item['lastname']);
        } elseif (empty($cast['lastname'])) {
            $slug = Utils::slugify($item['firstname']);
        } else {
            $slug = sprintf('%s-%s', Utils::slugify($item['firstname']), Utils::slugify($item['lastname']));
        }

        $item['alias'] = $slug;

        return $item;
    }

    protected function getChangeFrequency()
    {
        return 'monthly';
    }

    protected function getRouteParameters($item)
    {
        return [
            'cast_id' => $item['id'],
            'cast_alias' => $item['alias'],
        ];
    }
}

<?php

namespace PlayTv\Sitemap\Builder;

use Symfony\Component\Routing\Route;
use Playmedia\Utils\Tool as Utils;

class Group extends AbstractBuilder
{
    protected function getBasename()
    {
        return 'groups';
    }

    protected function countItems()
    {
        return $this->executeCount('SELECT COUNT(group_id) FROM tv_groups');
    }

    protected function getItems($page)
    {
        return $this->executeSelect($this->limit('SELECT group_id AS id, title, type_id FROM tv_groups', $page));
    }

    protected function processItem($item, Route $route)
    {
        $typeAlias = $route->getOption('type_alias');
        $typeAliasDefault = $route->getOption('type_alias_default');

        $item['type_alias'] = isset($typeAlias[$item['type_id']]) ? $typeAlias[$item['type_id']] : $typeAliasDefault;
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
            'type_alias' => $item['type_alias'],
            'group_id' => $item['id'],
            'group_alias' => $item['alias'],
        ];
    }
}

<?php

namespace Playmedia\Api\Service;

use Playmedia\Api\Api;

/**
 * Abstract Service class.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
abstract class AbstractService implements ServiceInterface
{
    protected $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function getCommand($name, array $args = array())
    {
        return $this->api->getCommand($this->buildCommandName($name), $args);
    }

    public function __call($method, $args)
    {
        return $this->getCommand($method, isset($args[0]) ? $args[0] : array())->getResult();
    }

    public function create(array $data = array())
    {
        return $this->getCommand('create', $data)->getResult();
    }

    public function show($id)
    {
        return $this->getCommand('show', array('id' => $id))->getResult();
    }

    public function modify($id, array $data = array())
    {
        $data['id'] = $id;

        return $this->getCommand('modify', $data)->getResult();
    }

    public function destroy($id)
    {
        return $this->getCommand('destroy', array('id' => $id))->getResult();
    }

    public function collection(array $params = array())
    {
        return $this->getCommand('collection', $params)->getResult();
    }

    public function buildCommandName($name)
    {
        $className = str_replace(__NAMESPACE__.'\\', '', get_class($this));
        $commandName = sprintf('%s.%s', lcfirst($className), $name);

        return $commandName;
    }

    public function purge($name, array $args = array())
    {
        $command = $this->getCommand($name, $args);
        $request = $command->prepare();
        $this->api->purge($request->getUrl());
    }
}

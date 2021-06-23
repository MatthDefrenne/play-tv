<?php

namespace Playmedia\Api\Service;

class Feedbacks extends AbstractService
{
    public function show($id, array $embed = array())
    {
        return $this->getCommand('show', array(
            'id' => $id,
            'embed' => implode(',', $embed),
        ))->getResult();
    }

    public function search($q)
    {
        return $this->getCommand('search', array('q' => $q))->getResult();
    }
}

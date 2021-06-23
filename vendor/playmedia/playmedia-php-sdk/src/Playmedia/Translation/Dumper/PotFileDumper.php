<?php

namespace Playmedia\Translation\Dumper;

use Symfony\Component\Translation\Dumper\PoFileDumper as BasePoFileDumper;
use Symfony\Component\Translation\MessageCatalogue;

class PotFileDumper extends BasePoFileDumper
{
    protected $relativePathTemplate = '%domain%.%extension%';

    /**
     * {@inheritdoc}
     */
    public function format(MessageCatalogue $messages, $domain = 'messages')
    {
        foreach ($messages->all($domain) as $id => $message) {
            $messages->set($id, '', $domain);
        }

        return parent::format($messages, $domain);
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtension()
    {
        return 'pot';
    }
}

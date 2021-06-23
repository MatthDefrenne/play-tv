<?php

namespace Playmedia\Api\Service;

use Playmedia\Api\Entity\Account;
use Guzzle\Service\Command\AbstractCommand;

class Streams extends AbstractService
{
    private function addHeaders(AbstractCommand $command, $country, Account $account = null)
    {
        if (!$command->isPrepared()) {
            $request = $command->prepare();

            $request->addHeader('X-Playmedia-CountryCode', $country);

            if (null !== $account) {
                $request->addHeader('X-Playmedia-Account', $account->getId());
            }
        }
    }

    public function getStreamsByChannel($alias, $country, Account $account = null)
    {
        $command = $this->getCommand('collection', ['channel' => $alias]);

        $this->addHeaders($command, $country, $account);

        return $command->getResult();
    }

    public function tokenizer($channelId, $format, $languageCode, $bitrate, $country, Account $account = null)
    {
        $command = $this->getCommand('tokenizer', [
            'channelId' => $channelId,
            'format' => $format,
            'languageCode' => $languageCode,
            'bitrate' => $bitrate,
        ]);

        $this->addHeaders($command, $country, $account);

        return $command->getResult();
    }
}

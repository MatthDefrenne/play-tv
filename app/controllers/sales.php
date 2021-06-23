<?php

use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Sales endpoints.
 *
 * @author David Guyon <david.guyon@playmedia.fr>
 */
class sales_controller extends ppl_app_controller
{
    /**
     * Product plans.
     */
    public function plans_action()
    {
        $this->set_page_title('Découvrez les offres de Play TV');
        $this->set_page_description('Découvrez les offres payantes de Play TV pour un accès sans publicités et en HQ.');

        $account = $this->container['account'];

        $packs = $this->container['product.formatter']->findByType('pack');
        $retails = $this->container['product.formatter']->findByType('retail');

        $trialPeriodDays = $this->getSdk()->getApi()->config()->get(['key' => 'sales.trial_period_days']);

        $premium = null;
        foreach ($packs as $product) {
            if ($product['alias'] == 'pack-premium') {
                $premium = $product;
                break;
            }
        }

        // Separate Premium pack from others
        $packs = array_filter($packs, function ($product) use ($account) {
            if ($product['alias'] == 'pack-premium') {
                return false;
            }
            if ($account && $account->isSubscribedTo($product['alias'])) {
                return false;
            }

            return true;
        });

        $retails = array_filter($retails, function ($product) use ($account) {
            if ($account && $account->isSubscribedTo($product['alias'])) {
                return false;
            }

            return true;
        });

        // Remove embed channels from Premium pack
        foreach ($premium['channels'] as $index => $channel) {
            // Channel is embed if 'live' starts with 'iframe|'
            if (strpos($channel['live'], 'iframe|') === 0) {
                unset($premium['channels'][$index]);
            }
        }

        $hd_channels = [];
        foreach ($premium['channels'] as $channel) {
            if ($channel['has_hd']) {
                $hd_channels[] = $channel;
            }
        }

        return $this->render(array(
            'packs' => $packs,
            'retails' => $retails,
            'premium' => $premium,
            'hd_channels' => $hd_channels,
            'trial_period_days' => $trialPeriodDays,
        ));
    }

    public function product_action($alias)
    {
        $product = $this->container['product.formatter']->show($alias);

        if (!$this->getSdk()->getApi()->getLastResponse()->isSuccessful()) {
            return $this->createNotFoundResponse();
        }

        // unsaleable product
        if (false === (bool) $product['active']) {
            return RedirectResponse::create(
                $this->container['url_generator']->generate('sales_plans')
            );
        }

        if ($product['type'] == 'retail') {
            $this->set_page_title(sprintf('Découvrez la chaine à la carte %s à %s€ /mois sans engagement de Play TV',
                $product['name'],
                number_format((float) $product['price'] / 100, 2)
            ));
            $this->set_page_description("La chaine à la carte {$product['name']} sur Play TV sans pub, une qualité d'image HQ.");
        } else {
            $this->set_page_title(sprintf('Découvrez le Pack %s à %s€ /mois sans engagement de Play TV',
                $product['name'],
                number_format((float) $product['price'] / 100, 2)
            ));
            $this->set_page_description("Le Pack {$product['name']} sur Play TV sans pub, une qualité d'image HQ et des chaînes exclusives.");
        }

        return $this->render(array(
            'product' => $product,
            'trial_period_days' => $this->getSdk()->getApi()->config()->get(['key' => 'sales.trial_period_days']),
        ));
    }

    public function webhook_action()
    {
        $url = $this->getSdk()->getApi()->getBaseUrl().'/paymill/webhook/';
        $post = file_get_contents('php://input');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);

        echo $data;
        exit;
    }

    // This route/action exists only to enable 'sales' feature
    // See app_controller 'route_to_feature' array
    public function noop_action()
    {
        return $this->response->redirect('/', 301);
    }
}

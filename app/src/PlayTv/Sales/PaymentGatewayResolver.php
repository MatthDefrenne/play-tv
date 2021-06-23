<?php

namespace PlayTv\Sales;

use Playmedia\Api\Entity\Account;

/**
 * This class is responsible for deciding which payment gateways will be displayed.
 */
class PaymentGatewayResolver
{
    const GATEWAY_PAYMILL = 'paymill';
    const GATEWAY_PAYPAL = 'paypal';
    const GATEWAY_CELLPASS = 'cellpass';

    private $countryCode;
    private $cellpassUtils;

    private static $gateways = [
        self::GATEWAY_PAYMILL,
        self::GATEWAY_PAYPAL,
        self::GATEWAY_CELLPASS,
    ];

    private static $gatewaysCountryFilter = [
        'cellpass' => ['FR'],
        'paymill' => [],
        'paypal' => [],
    ];

    public function __construct($countryCode, CellpassUtils $cellpassUtils)
    {
        $this->countryCode = $countryCode;
        $this->cellpassUtils = $cellpassUtils;
    }

    private function isAvailableByCountry($gateway)
    {
        if (!empty(self::$gatewaysCountryFilter[$gateway])) {
            if (!in_array($this->countryCode, self::$gatewaysCountryFilter[$gateway])) {
                return false;
            }
        }

        return true;
    }

    private function isAvailableByCart($gateway, Cart $cart)
    {
        switch ($gateway) {
            case self::GATEWAY_CELLPASS:
                // Make sure product can be sold via Cellpass
                if (!$service = $this->cellpassUtils->getService($cart)) {
                    return false;
                }
                break;

            case self::GATEWAY_PAYPAL:
                return $cart->containsPrepaidProduct();
                break;
        }

        return true;
    }

    private function isAvailableByAccount($gateway, Account $account = null)
    {
        if (null !== $account) {

            // Keep only non-prepaid subscriptions
            $subscriptions = array_filter($account['subscriptions'], function ($subscription) {
                return $subscription['product']['type'] !== 'prepaid';
            });

            if (count($subscriptions) > 0) {
                $accountGateways = [];
                foreach ($subscriptions as $subscription) {
                    $accountGateways[] = $subscription['gateway'];
                }

                $accountGateways = array_unique($accountGateways);

                // Once you have used a gateway, you stick with it
                return $accountGateways[0] === $gateway;
            }
        }

        return true;
    }

    public function isAvailable($gateway, Cart $cart, Account $account = null)
    {
        if (!$this->isAvailableByCountry($gateway)) {
            return false;
        }

        if (!$this->isAvailableByCart($gateway, $cart)) {
            return false;
        }

        // Account check is useless if cart contains prepaid product
        if (!$cart->containsPrepaidProduct() && !$this->isAvailableByAccount($gateway, $account)) {
            return false;
        }

        return true;
    }

    public function getGateways(Cart $cart, Account $account = null)
    {
        return array_filter(self::$gateways, function ($gateway) use ($cart, $account) {
            return $this->isAvailable($gateway, $cart, $account);
        });
    }
}

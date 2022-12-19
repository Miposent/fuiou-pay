<?php

namespace Miposent\FuiOuPay\Providers;

use Miposent\FuiOuPay\Service\MerchantService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class MerchantProviders
 * @package Miposent\FuiOuPay\Providers
 */
class MerchantProviders implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['merchant'] = function (Container $pimple) {
            return new MerchantService($pimple['config']);
        };
    }
}
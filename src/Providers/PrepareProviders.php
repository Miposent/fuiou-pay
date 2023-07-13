<?php

namespace Miposent\FuiOuPay\Providers;

use Miposent\FuiOuPay\Service\PrepareService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class PrepareProviders
 * @package Miposent\FuiOuPay\Providers
 */
class PrepareProviders implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['prepare'] = function (Container $pimple) {
            return new PrepareService($pimple['config']);
        };
    }
}
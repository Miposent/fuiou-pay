<?php


namespace Miposent\FuiOuPay\Providers;

use Miposent\FuiOuPay\Service\ScanService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ScanProviders
 * @package Miposent\FuiOuPay\Providers
 */
class ScanProviders implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['scan'] = function (Container $pimple) {
            return new ScanService($pimple['config']);
        };
    }
}
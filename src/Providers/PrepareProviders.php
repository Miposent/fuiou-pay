<?php


namespace Miposent\FuiOuPay\Providers;

use Miposent\FuiOuPay\Service\Prepare;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PrepareProviders implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['prepare'] = function (Container $pimple) {
            return new Prepare($pimple['config']);
        };
    }
}
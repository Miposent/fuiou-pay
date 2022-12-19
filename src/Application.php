<?php

namespace Miposent\FuiOuPay;

use Miposent\FuiOuPay\Providers\MerchantProviders;
use Miposent\FuiOuPay\Providers\PrepareProviders;
use Miposent\FuiOuPay\Providers\ScanProviders;
use Miposent\FuiOuPay\Service\MerchantService;
use Miposent\FuiOuPay\Service\PrepareService;
use Miposent\FuiOuPay\Service\ScanService;
use Pimple\Container;

/**
 * @property PrepareService $prepare
 * @property ScanService $scan
 * @property MerchantService $merchant
 * Class Application
 * @package Miposent\FuiOuPay
 */
class Application extends Container
{
    /**
     * @var array
     */
    protected $providers = [
        PrepareProviders::class,
        ScanProviders::class,
        MerchantProviders::class
    ];

    public function __construct(array $config)
    {
        parent::__construct();
        $this['config'] = $config;
        $this->registerProviders();
    }

    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get(string $id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed $value
     */
    public function __set(string $id, $value)
    {
        $this->offsetSet($id, $value);
    }

    /**
     * Register provides
     */
    private function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }
}
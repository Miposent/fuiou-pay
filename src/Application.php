<?php

namespace Miposent\FuiOuPay;

use Miposent\FuiOuPay\Providers\PrepareProviders;
use Miposent\FuiOuPay\Service\Prepare;
use Pimple\Container;

/**
 * @property Prepare $prepare
 * Class Application
 * @package Miposent\FuiOuPay
 */
class Application extends Container
{
    /**
     * @var array
     */
    protected array $providers = [
        PrepareProviders::class,
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
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed $value
     */
    public function __set($id, $value)
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
<?php

namespace Skand\Container;

use Psr\Container\ContainerInterface;
use Skand\Provider\ProviderInterface;

class ContainerBuilder implements ContainerBuilderInterface
{
    public function build(ContainerInterface $c, ProviderInterface $provider): void
    {
        $provider->init($c);
    }
}

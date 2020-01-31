<?php

namespace Skand\Container;

use Psr\Container\ContainerInterface;
use Skand\Provider\ProviderInterface;

interface ContainerBuilderInterface
{
    public function build(ContainerInterface $c, ProviderInterface $provider): void;
}

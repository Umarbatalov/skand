<?php

namespace Skand\Provider;

use Psr\Container\ContainerInterface;

interface ProviderInterface
{
    public function init(ContainerInterface $c): void;
}

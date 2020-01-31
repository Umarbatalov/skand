<?php

namespace Skand\Provider;

use Psr\Container\ContainerInterface;
use Skand\Main;

class CommonProvider implements ProviderInterface
{
    public function init(ContainerInterface $c): void
    {
        $c->set(
            Main::class,
            static function() {
                return new Main();
            }
        );
    }
}

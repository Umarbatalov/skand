<?php

use Skand\Container\Container;
use Skand\Container\ContainerBuilder;
use Skand\Main;
use Skand\Provider\CommonProvider;
use Skand\Provider\ProviderInterface;

require __DIR__ . '/../vendor/autoload.php';

$container        = new Container();
$containerBuilder = new ContainerBuilder();

$providers = collect(
    [
        new CommonProvider(),
    ]
);

$providers->each(
    static function (ProviderInterface $provider) use (&$container) {
        $provider->init($container);
    }
);

/** @var Main $main */
$main = $container->get(Main::class);

die($main->ret());

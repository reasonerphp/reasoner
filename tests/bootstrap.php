<?php
/**
 * Copyright (c) 2020 Nikolas Lada <https://nikolaslada.cz>.
 */

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$configurator = new \Nette\Configurator;

$configurator->setDebugMode(true);

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory(__DIR__ . '/tmp');

$configurator
    ->createRobotLoader()
    ->addDirectory(__DIR__ . '/../src')
    ->register();

$container = $configurator->createContainer();

return $container;

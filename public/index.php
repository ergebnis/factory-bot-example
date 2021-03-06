<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-bot-example
 */

use Ergebnis\Example;
use Symfony\Component\Dotenv;
use Symfony\Component\ErrorHandler;
use Symfony\Component\HttpFoundation;

require \dirname(__DIR__) . '/vendor/autoload.php';

(new Dotenv\Dotenv())->bootEnv(\dirname(__DIR__) . '/.env');

if ($_SERVER['APP_DEBUG']) {
    \umask(0000);

    ErrorHandler\Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
    HttpFoundation\Request::setTrustedProxies(
        \explode(',', $trustedProxies),
        HttpFoundation\Request::HEADER_X_FORWARDED_FOR | HttpFoundation\Request::HEADER_X_FORWARDED_PORT | HttpFoundation\Request::HEADER_X_FORWARDED_PROTO
    );
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? $_ENV['TRUSTED_HOSTS'] ?? false) {
    HttpFoundation\Request::setTrustedHosts([$trustedHosts]);
}

$kernel = new Example\Kernel(
    $_SERVER['APP_ENV'],
    (bool) $_SERVER['APP_DEBUG']
);

$request = HttpFoundation\Request::createFromGlobals();

$response = $kernel->handle($request);

$response->send();

$kernel->terminate(
    $request,
    $response
);

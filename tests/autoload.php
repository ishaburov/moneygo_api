<?php

require dirname(__DIR__).'/vendor/autoload.php';

global $apiProvider;

$apiProvider = new \MoneyGo\MoneyGoApi();

$clientId = '';
$secret = '';

\Tests\StaticApi::setApi($apiProvider);
\Tests\StaticApi::setClintId($clientId);
\Tests\StaticApi::setSecret($secret);

$accessToken = \Tests\StaticApi::getApi()->getToken()
    ->setClientId(\Tests\StaticApi::getClientId())
    ->setClientSecret(\Tests\StaticApi::getSecret())
    ->send()
    ->getAccessToken();

\Tests\StaticApi::getApi()->setAccessToken($accessToken);
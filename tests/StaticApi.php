<?php

namespace Tests;

use MoneyGo\MoneyGoApi;

class StaticApi
{
    private static $api = null;
    private static $clientId = null;
    private static $secret = null;

    public static function setApi(MoneyGoApi $api): void
    {
        static::$api = $api;
    }

    public static function setClintId($clientId): void
    {
        static::$clientId = $clientId;
    }

    public static function setSecret($secret): void
    {
        static::$secret = $secret;
    }

    public static function getApi(): MoneyGoApi
    {
        return static::$api;
    }

    public static function getClientId(): string
    {
        return static::$clientId;
    }

    public static function getSecret(): string
    {
        return static::$secret;
    }
}
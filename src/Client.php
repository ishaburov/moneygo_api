<?php

namespace MoneyGo;

final class Client
{
    /*** @var \GuzzleHttp\Client */
    protected $client;
    /*** @var string */
    const BASE_URL = 'https://api.money-go.com';
    /*** @var string */
    private $baseUrl;

    public function __construct()
    {
        $this->onInit();
    }

    private function onInit()
    {
        $this->setBaseUrl();
        $this->setClient();
    }

    private function setClient()
    {
        $this->client = new \GuzzleHttp\Client(['base_uri' => $this->baseUrl]);
    }

    public function getClient()
    {
        return $this->client;
    }

    private function setBaseUrl()
    {
        $this->baseUrl = self::BASE_URL;
    }


    public function getApiProvider(): ApiProvider
    {
        return new ApiProvider($this);
    }

}
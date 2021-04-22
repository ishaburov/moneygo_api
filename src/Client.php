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

    /**
     * Client constructor.
     */
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

    /**
     * @return \GuzzleHttp\Client
     */
    public function getClient(): \GuzzleHttp\Client
    {
        return $this->client;
    }

    private function setBaseUrl()
    {
        $this->baseUrl = self::BASE_URL;
    }


    /**
     * @return ApiProvider
     */
    public function getApiProvider(): ApiProvider
    {
        return new ApiProvider($this);
    }

}
<?php


namespace MoneyGo\Methods;


use GuzzleHttp\Client;

abstract class BaseMethod
{
    /*** @var Client */
    protected $client;
    protected $originalResult;
    protected $arrayResult;
    /**
     * @var string|null
     */
    protected $accessToken;

    public function __construct(Client $client, string $accessToken = null)
    {
        $this->client = $client;
        $this->accessToken = $accessToken;
    }


    protected function decode(string $json)
    {
        return json_decode($json, true);
    }

    public function getOriginal()
    {
        return $this->originalResult;
    }

    public function setOriginal(string $content)
    {
        $this->originalResult = $content;
    }

    public function setArrayResult(array $content)
    {
        $this->arrayResult = $content;
    }

    /**
     * @return mixed
     */
    public function getArrayResult()
    {
        return $this->arrayResult;
    }


    abstract public function response();
}
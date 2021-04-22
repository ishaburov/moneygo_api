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

    /**
     * @return mixed
     */
    abstract public function send();

    /**
     * BaseMethod constructor.
     * @param Client $client
     * @param string|null $accessToken
     */
    public function __construct(Client $client, string $accessToken = null)
    {
        $this->client = $client;
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed
     */
    public function getOriginal()
    {
        return $this->originalResult;
    }

    /**
     * @param string $content
     */
    public function setOriginal(string $content)
    {
        $this->originalResult = $content;
    }

    /**
     * @param array $content
     */
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

    /**
     * @param string $json
     * @return mixed
     */
    protected function decode(string $json)
    {
        return json_decode($json, true);
    }
}
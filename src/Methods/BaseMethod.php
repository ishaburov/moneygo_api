<?php


namespace MoneyGo\Methods;


use MoneyGo\Curl\Curl;

abstract class BaseMethod
{
    /*** @var Curl */
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
     * @param  Curl  $client
     * @param  string|null  $accessToken
     */
    public function __construct(Curl $client, string $accessToken = null)
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
     * @param  string  $content
     */
    public function setOriginal(object $content)
    {
        $this->originalResult = $content;
    }
    
    /**
     * @param  object  $content
     */
    public function setArrayResult(object $content): void
    {
        $this->arrayResult = json_decode(json_encode($content), true);
        
        if ((isset($this->arrayResult['status']) && !$this->arrayResult['status']) || $this->client->getHttpStatusCode() !== 200) {
            throw new \UnexpectedValueException(json_encode($this->arrayResult), $this->client->getHttpStatusCode());
        }
    }
    
    /**
     * @return mixed
     */
    public function getArrayResult()
    {
        return $this->arrayResult;
    }
    
    /**
     * @param  string  $json
     * @return mixed
     */
    protected function decode(string $json)
    {
        return json_decode($json, true);
    }
}
<?php

namespace MoneyGo\Methods;

use MoneyGo\Resource\TokenResource;

final class Token extends BaseMethod
{
    private const URL = 'token';
    protected $grantType = 'client_credentials';
    protected $scope = 'api';
    protected $clientId;
    protected $clientSecret;
    
    /**
     * @param  string  $clientId
     * @return $this
     */
    public function setClientId(string $clientId): Token
    {
        $this->clientId = $clientId;
        
        return $this;
    }
    
    /**
     * @param  string  $clientSecret
     * @return $this
     */
    public function setClientSecret(string $clientSecret): Token
    {
        $this->clientSecret = $clientSecret;
        
        return $this;
    }
    
    /**
     * @return array
     */
    protected function getBody(): array
    {
        return [
          "grant_type" => $this->grantType,
          "client_id" => $this->clientId,
          "client_secret" => $this->clientSecret,
          "scope" => $this->scope,
        ];
    }
    
    /**
     * @return TokenResource
     */
    public function send(): TokenResource
    {
        $curl = $this->client
          ->post(self::URL, $this->getBody());
        
        $this->setOriginal($curl);
        $this->setArrayResult($curl);
        
        return $this->getResult();
    }
    
    /**
     * @param  array  $result
     * @return TokenResource
     */
    protected function getResult(): TokenResource
    {
        $result = $this->getArrayResult();
        $resource = new TokenResource();
        $resource->setAccessToken($result['access_token']);
        $resource->setExpiresIn($result['expires_in']);
        $resource->setTokenType($result['token_type']);

        return $resource;
    }
}
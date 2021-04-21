<?php

namespace MoneyGo\Methods;

use MoneyGo\Resource\TokenResource;

final class Token extends BaseMethod
{
    protected $grandType = 'client_credentials';
    protected $scope = 'api';
    protected $clientId;
    protected $clientSecret;

    public function setClientId(string $clientId): Token
    {
        $this->clientId = $clientId;
        return $this;
    }

    public function setClientSecret(string $clientSecret): Token
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }


    protected function getBody(): array
    {
        return [
            "grant_type" => $this->grandType,
            "client_id" => $this->clientId,
            "client_secret" => $this->clientSecret,
            "scope" => $this->scope
        ];
    }

    public function response(): TokenResource
    {
        $content = $this->client
            ->post('token', ['json' => $this->getBody()])
            ->getBody()
            ->getContents();

        $result = $this->decode($content);

        return $this->getResult($result);
    }

    protected function getResult(array $result): TokenResource
    {
        $resource = new TokenResource();
        $resource->setAccessToken($result['access_token']);
        $resource->setExpiresIn($result['expires_in']);
        $resource->setTokenType($result['token_type']);
        return $resource;
    }
}
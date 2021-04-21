<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\RateResource;

final class Rate extends BaseMethod
{

    public function response(): Rate
    {
        $content = $this->client
            ->get("api/currencies/rates", [
                'headers' => [
                    'Authorization' => $this->accessToken
                ]
            ])
            ->getBody()
            ->getContents();

        $this->setOriginal($content);

        $result = $this->decode($content);

        $this->setArrayResult($result);

        return $this;
    }

    public function getResult(): array
    {
        $rates = [];
        $data = $this->arrayResult['data'];
        foreach ($data as $rate) {
            $resource = new RateResource();
            $resource->setName($rate['name']);
            $resource->setGroup($rate['group']);
            $resource->setValue($rate['value']);
            $rates[] = $resource;
        }

        return $rates;
    }
}
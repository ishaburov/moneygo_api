<?php


namespace MoneyGo\Methods;


use GuzzleHttp\Exception\GuzzleException;
use MoneyGo\Resource\RateResource;

final class Rate extends BaseMethod
{
    private const URL = "api/currencies/rates";

    /**
     * @return $this
     * @throws GuzzleException
     */
    public function send(): Rate
    {
        $content = $this->client
            ->get(self::URL, [
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

    /**
     * @return array
     */
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
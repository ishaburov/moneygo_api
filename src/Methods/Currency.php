<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\CurrencyResource;

final class Currency extends BaseMethod
{

    /**
     * @return $this
     */
    public function send(): Currency
    {
        $content = $this->client
            ->get("api/currencies", [
                'headers' => [
                    'Authorization' => $this->accessToken,
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
     * @throws \Exception
     */
    public function getResult(): array
    {
        if (!isset($this->arrayResult['data'])) {
            throw new \Exception("key data doesn't exist");
        }
        $currencies = [];
        foreach ($this->arrayResult['data'] as $currency) {
            $currencyResource = new CurrencyResource();
            $currencyResource->setId($currency['id']);
            $currencyResource->setCode($currency['code']);
            $currencyResource->setName($currency['name']);
            $currencyResource->setPrefix($currency['prefix']);
            $currencyResource->setRate($currency['rate']);
            $currencyResource->setTimeUpdatedRate($currency['timeUpdatedRate']);
            $currencyResource->setPrecision($currency['decimals']);
            $currencies[] = $currencyResource;
        }

        return $currencies;
    }
}
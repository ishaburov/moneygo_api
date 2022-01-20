<?php


namespace MoneyGo\Methods;


use GuzzleHttp\Exception\GuzzleException;
use MoneyGo\Resource\CurrencyResource;

final class Currency extends BaseMethod
{
    private const URL = "/api/currencies";

    /**
     * @return $this
     */
    public function send(): Currency
    {
        $content = $this->client
            ->get(self::URL);

        $this->setOriginal($content);
        
        $this->setArrayResult($content);

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
<?php


namespace MoneyGo\Resource;


final class SearchWalletResource
{
    protected $id;
    protected $number;
    protected $currency;
    protected $isWalletExists = false;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function isWalletExists(): bool
    {
        return $this->isWalletExists;
    }

    /**
     * @param mixed $isWalletExists
     */
    public function setIsWalletExists($isWalletExists)
    {
        $this->isWalletExists = $isWalletExists;
    }


    /**
     * @param mixed $currency
     */
    public function setCurrency(array $currency)
    {
        $currencyResource = new CurrencyResource();
        $currencyResource->setId($currency['id']);
        $currencyResource->setName($currency['name']);
        $currencyResource->setCode($currency['code']);
        $currencyResource->setRate($currency['rate']);
        $currencyResource->setPrefix($currency['prefix']);
        $this->currency = $currencyResource;
    }


}
<?php


namespace MoneyGo\Resource;


final class WalletExistsResource
{
    protected $walletToId;
    protected $numberTo;
    protected $walletFromId;
    protected $numberFrom;
    protected $currency;
    protected $isWalletExists = false;

    /**
     * @return mixed
     */
    public function getWalletToId()
    {
        return $this->walletToId;
    }

    /**
     * @param mixed $walletToId
     */
    public function setWalletToId($walletToId)
    {
        $this->walletToId = $walletToId;
    }

    /**
     * @return mixed
     */
    public function getNumberTo()
    {
        return $this->numberTo;
    }

    /**
     * @param mixed $numberTo
     */
    public function setNumberTo($numberTo)
    {
        $this->numberTo = $numberTo;
    }

    /**
     * @return mixed
     */
    public function getWalletFromId()
    {
        return $this->walletFromId;
    }

    /**
     * @param mixed $walletFromId
     */
    public function setWalletFromId($walletFromId)
    {
        $this->walletFromId = $walletFromId;
    }

    /**
     * @return mixed
     */
    public function getNumberFrom()
    {
        return $this->numberFrom;
    }

    /**
     * @param mixed $numberFrom
     */
    public function setNumberFrom($numberFrom)
    {
        $this->numberFrom = $numberFrom;
    }

    /**
     * @return bool
     */
    public function isWalletExists(): bool
    {
        return $this->isWalletExists;
    }

    /**
     * @param bool $isWalletExists
     */
    public function setIsWalletExists(bool $isWalletExists)
    {
        $this->isWalletExists = $isWalletExists;
    }


    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
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
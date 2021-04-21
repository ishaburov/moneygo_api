<?php


namespace MoneyGo\Resource;


final class WalletResource
{
    protected $id;
    protected $amount;
    protected $amountLimit;
    protected $status;
    protected $number;
    protected $currency;

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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAmountLimit()
    {
        return $this->amountLimit;
    }

    /**
     * @param mixed $amountLimit
     */
    public function setAmountLimit($amountLimit)
    {
        $this->amountLimit = $amountLimit;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
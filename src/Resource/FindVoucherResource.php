<?php


namespace MoneyGo\Resource;


class FindVoucherResource
{
    protected $id;
    protected $total;
    protected $totalCurrency;
    protected $secret;
    protected $amount;
    protected $amountCurrency;
    protected $walletCode;
    protected $expiredAt;
    protected $dateCreated;

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
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getTotalCurrency()
    {
        return $this->totalCurrency;
    }

    /**
     * @param mixed $totalCurrency
     */
    public function setTotalCurrency($totalCurrency)
    {
        $this->totalCurrency = $totalCurrency;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
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
    public function getAmountCurrency()
    {
        return $this->amountCurrency;
    }

    /**
     * @param mixed $amountCurrency
     */
    public function setAmountCurrency($amountCurrency)
    {
        $this->amountCurrency = $amountCurrency;
    }

    /**
     * @return mixed
     */
    public function getWalletCode()
    {
        return $this->walletCode;
    }

    /**
     * @param mixed $walletCode
     */
    public function setWalletCode($walletCode)
    {
        $this->walletCode = $walletCode;
    }

    /**
     * @return mixed
     */
    public function getExpiredAt()
    {
        return $this->expiredAt;
    }

    /**
     * @param mixed $expiredAt
     */
    public function setExpiredAt($expiredAt)
    {
        $this->expiredAt = $expiredAt;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }


}
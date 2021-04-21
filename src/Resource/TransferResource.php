<?php


namespace MoneyGo\Resource;


final class TransferResource
{
    private $id;
    private $message;
    private $isExchanger = false;
    private $amount = 0;

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
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return bool
     */
    public function isExchanger(): bool
    {
        return $this->isExchanger;
    }

    /**
     * @param bool $isExchanger
     */
    public function setIsExchanger(bool $isExchanger)
    {
        $this->isExchanger = $isExchanger;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount)
    {
        $this->amount = $amount;
    }


}
<?php


namespace MoneyGo\Methods;

use MoneyGo\Resource\TransferResource;

final class Transfer extends BaseMethod
{
    private const URL = "/api/transaction/transfer";
    private $walletFromNumber;
    private $walletToNumber;
    /**
     * @var string
     */
    private $paymentId;
    /**
     * @var float
     */
    private $amount;
    /**
     * @var string
     */
    private $description;

    /**
     * @param string $walletFrom
     * @return $this
     */
    public function setWalletFromNumber(string $walletFrom): Transfer
    {
        $this->walletFromNumber = $walletFrom;
        return $this;
    }

    /**
     * @param string $walletTo
     * @return $this
     */
    public function setWalletToNumber(string $walletTo): Transfer
    {
        $this->walletToNumber = $walletTo;
        return $this;
    }

    /**
     * @param float $amount
     * @return $this
     */
    public function setAmount(float $amount): Transfer
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param string $paymentId
     * @return $this
     */
    public function setPaymentId(string $paymentId): Transfer
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): Transfer
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return $this
     */
    public function send(): Transfer
    {
        $content = $this->client
            ->post(self::URL, [
              'wallet_from' => $this->walletFromNumber,
              'wallet_to' => $this->walletToNumber,
              'amount' => $this->amount,
              'payment_id' => $this->paymentId,
              'description' => $this->description
            ]);
        
        $this->setOriginal($content);
        $this->setArrayResult($content);

        return $this;
    }

    /**
     * @return TransferResource
     */
    public function getResult(): TransferResource
    {
        $result = $this->arrayResult['data'];
        
        $resource = new TransferResource();
        $resource->setId($result['id']);
        $resource->setAmount($result['amount'] ?? $this->amount);
        $resource->setIsExchanger($result['is_exchanger'] ?? false);
        $resource->setMessage($result['message']);

        return $resource;
    }
}
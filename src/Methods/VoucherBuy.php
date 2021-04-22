<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\VoucherResource;

final class VoucherBuy extends BaseMethod
{
    private $amount;
    private $walletFrom;
    private $description;

    /**
     * @param mixed $amount
     * @return VoucherBuy
     */
    public function setAmount($amount): VoucherBuy
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param mixed $walletFrom
     * @return VoucherBuy
     */
    public function setWalletFrom($walletFrom): VoucherBuy
    {
        $this->walletFrom = $walletFrom;
        return $this;
    }

    /**
     * @param mixed $description
     * @return VoucherBuy
     */
    public function setDescription($description): VoucherBuy
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return $this
     */
    public function send(): VoucherBuy
    {
        $content = $this->client
            ->post("api/vouchers/confirm", [
                'headers' => [
                    'Authorization' => $this->accessToken
                ],
                'json' => [
                    'amount' => $this->amount,
                    'wallet_from' => $this->walletFrom,
                    'additional' => $this->description
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
     * @return VoucherResource
     */
    public function getResult(): VoucherResource
    {
        $data = $this->arrayResult['data'];
        $voucherResource = new VoucherResource();
        $voucherResource->setId($data['id']);
        $voucherResource->setAmount($data['amount']);
        $voucherResource->setStatus($data['status']);
        $voucherResource->setSecret($data['secret']);
        $voucherResource->setDateCreated($data['dateCreated']);
        $voucherResource->setCurrencyCode($data['currencyCode']);
        return $voucherResource;
    }
}
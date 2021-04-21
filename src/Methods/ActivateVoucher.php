<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\FindVoucherResource;

final class ActivateVoucher extends BaseMethod
{
    protected $voucherNumber;
    protected $voucherCode;
    protected $walletId;
    protected $walletNumber;
    protected $description;

    /**
     * @param mixed $voucherNumber
     */
    public function setVoucherNumber($voucherNumber): ActivateVoucher
    {
        $this->voucherNumber = $voucherNumber;
        return $this;
    }

    /**
     * @param mixed $voucherCode
     */
    public function setVoucherCode($voucherCode): ActivateVoucher
    {
        $this->voucherCode = $voucherCode;
        return $this;
    }

    /**
     * @param mixed $walletId
     */
    public function setWalletId($walletId): ActivateVoucher
    {
        $this->walletId = $walletId;
        return $this;
    }

    /**
     * @param mixed $walletNumber
     */
    public function setWalletNumber($walletNumber): ActivateVoucher
    {
        $this->walletNumber = $walletNumber;
        return $this;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): ActivateVoucher
    {
        $this->description = $description;
        return $this;
    }


    public function response()
    {
        $content = $this->client
            ->post("api/vouchers/activation", [
                'headers' => [
                    'Authorization' => $this->accessToken
                ],
                'json' => [
                    'voucher_number' => $this->voucherNumber,
                    'voucher_code' => $this->voucherCode,
                    'wallet_number' => $this->walletNumber,
                    'wallet_id' => $this->walletId,
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

    public function getResult(): array
    {
        return $this->arrayResult['data'];
    }
}
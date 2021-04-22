<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\FindVoucherResource;

final class FindVoucher extends BaseMethod
{
    protected $voucherNumber;
    protected $voucherCode;
    protected $walletId;
    protected $walletNumber;

    /**
     * @param mixed $voucherNumber
     * @return FindVoucher
     */
    public function setVoucherNumber($voucherNumber): FindVoucher
    {
        $this->voucherNumber = $voucherNumber;
        return $this;
    }

    /**
     * @param mixed $voucherCode
     * @return FindVoucher
     */
    public function setVoucherCode($voucherCode): FindVoucher
    {
        $this->voucherCode = $voucherCode;
        return $this;
    }

    /**
     * @param mixed $walletId
     * @return FindVoucher
     */
    public function setWalletId($walletId): FindVoucher
    {
        $this->walletId = $walletId;
        return $this;
    }

    /**
     * @param mixed $walletNumber
     * @return FindVoucher
     */
    public function setWalletNumber($walletNumber): FindVoucher
    {
        $this->walletNumber = $walletNumber;
        return $this;
    }

    /**
     * @return $this|mixed
     */
    public function send(): FindVoucher
    {
        $content = $this->client
            ->get("api/vouchers/activation", [
                'headers' => [
                    'Authorization' => $this->accessToken
                ],
                'query' => [
                    'voucher_number' => $this->voucherNumber,
                    'voucher_code' => $this->voucherCode,
                    'wallet_number' => $this->walletNumber,
                    'wallet_id' => $this->walletId
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
     * @return FindVoucherResource
     */
    public function getResult(): FindVoucherResource
    {
        $data = $this->arrayResult['data'];

        $resource = new FindVoucherResource();
        $resource->setId($data['id']);
        $resource->setAmount($data['amount']);
        $resource->setTotal($data['total']);
        $resource->setDateCreated($data['date_created']);
        $resource->setWalletCode($data['wallet_code']);
        $resource->setSecret($data['secret']);
        $resource->setExpiredAt($data['expired_at']);
        $resource->setAmountCurrency($data['amount_currency']);
        $resource->setTotalCurrency($data['total_currency']);

        return $resource;
    }
}
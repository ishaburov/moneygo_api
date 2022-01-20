<?php


namespace MoneyGo\Methods;


final class ActivateVoucher extends BaseMethod
{
    private const URL = "/api/vouchers/activation";
    protected $voucherNumber;
    protected $voucherCode;
    protected $walletId;
    protected $walletNumber;
    protected $description;
    
    /**
     * @param  mixed  $voucherNumber
     * @return ActivateVoucher
     */
    public function setVoucherNumber($voucherNumber): ActivateVoucher
    {
        $this->voucherNumber = $voucherNumber;
        
        return $this;
    }
    
    /**
     * @param  mixed  $voucherCode
     * @return ActivateVoucher
     */
    public function setVoucherCode($voucherCode): ActivateVoucher
    {
        $this->voucherCode = $voucherCode;
        
        return $this;
    }
    
    /**
     * @param  mixed  $walletId
     * @return ActivateVoucher
     */
    public function setWalletId($walletId): ActivateVoucher
    {
        $this->walletId = $walletId;
        
        return $this;
    }
    
    /**
     * @param  mixed  $walletNumber
     * @return ActivateVoucher
     */
    public function setWalletNumber($walletNumber): ActivateVoucher
    {
        $this->walletNumber = $walletNumber;
        
        return $this;
    }
    
    /**
     * @param  mixed  $description
     * @return ActivateVoucher
     */
    public function setDescription($description): ActivateVoucher
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * @return $this
     */
    public function send(): ActivateVoucher
    {
        $content = $this->client
          ->post(self::URL, [
            'voucher_number' => $this->voucherNumber,
            'voucher_code' => $this->voucherCode,
            'wallet_number' => $this->walletNumber,
            'wallet_id' => $this->walletId,
            'additional' => $this->description,
          ]);
        
        $this->setOriginal($content);
        
        $this->setArrayResult($content);
        
        return $this;
    }
    
    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->arrayResult['data'];
    }
}
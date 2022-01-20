<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\ProcessingCheckoutResource;

final class ProcessingCheckout extends BaseMethod
{
    private const URL = "/api/processing/checkout";
    protected $secret;
    protected $id;
    protected $amount;
    protected $walletFromNumber;
    protected $walletToNumber;
    private $successUrl;
    private $cancelUrl;
    private $statusUrl;
    /**
     * @var string
     */
    private $userInfo = null;
    
    /**
     * @param  mixed  $secret
     * @return ProcessingCheckout
     */
    public function setSecret($secret): ProcessingCheckout
    {
        $this->secret = $secret;
        
        return $this;
    }
    
    /**
     * @param  mixed  $id
     * @return ProcessingCheckout
     */
    public function setId($id): ProcessingCheckout
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function setUserInfo(?string $userInfo): ProcessingCheckout
    {
        $this->userInfo = $userInfo;
        
        return $this;
    }
    
    /**
     * @param  mixed  $amount
     * @return ProcessingCheckout
     */
    public function setAmount(float $amount): ProcessingCheckout
    {
        $this->amount = $amount;
        
        return $this;
    }
    
    /**
     * @param  mixed  $walletFromNumber
     * @return ProcessingCheckout
     */
    public function setWalletFromNumber($walletFromNumber): ProcessingCheckout
    {
        $this->walletFromNumber = $walletFromNumber;
        
        return $this;
    }
    
    /**
     * @param  mixed  $walletTo
     * @return ProcessingCheckout
     */
    public function setWalletToNumber($walletTo): ProcessingCheckout
    {
        $this->walletToNumber = $walletTo;
        
        return $this;
    }
    
    /**
     * @param  mixed  $successUrl
     * @return ProcessingCheckout
     */
    public function setSuccessUrl($successUrl): ProcessingCheckout
    {
        $this->successUrl = $successUrl;
        
        return $this;
    }
    
    /**
     * @param  mixed  $cancelUrl
     * @return ProcessingCheckout
     */
    public function setCancelUrl($cancelUrl): ProcessingCheckout
    {
        $this->cancelUrl = $cancelUrl;
        
        return $this;
    }
    
    /**
     * @param  mixed  $statusUrl
     * @return ProcessingCheckout
     */
    public function setStatusUrl($statusUrl): ProcessingCheckout
    {
        $this->statusUrl = $statusUrl;
        
        return $this;
    }
    
    /**
     * @return $this
     */
    public function send(): ProcessingCheckout
    {
        $data = [
          'wallet_to' => $this->walletToNumber,
          'wallet_from' => $this->walletFromNumber,
          'amount' => $this->amount,
          'id' => $this->id,
          'success_url' => $this->successUrl,
          'cancel_url' => $this->cancelUrl,
          'status_url' => $this->statusUrl,
          'user_info' => $this->userInfo,
          'signature' => $this->makeSignature(),
        ];
        
        
        $content = $this->client->post(self::URL, $data);
        
        $this->setOriginal($content);
        
        $this->setArrayResult($content);
        
        return $this;
    }
    
    /**
     * @return ProcessingCheckoutResource
     */
    public function getResult(): ProcessingCheckoutResource
    {
        $data = $this->arrayResult['data'];
        
        $processingCheckout = new ProcessingCheckoutResource();
        $processingCheckout->setExpiredAt($data['expired_at']);
        $processingCheckout->setUrl($data['url']);
        
        return $processingCheckout;
    }
    
    /**
     * @return string
     */
    protected function makeSignature(): string
    {
        $data = [
          'wallet_to' => $this->walletToNumber,
          'wallet_from' => $this->walletFromNumber,
          'amount' => (string) $this->amount,
          'id' => $this->id,
          'secret' => $this->secret,
        ];
        
        return hash('sha256', json_encode($data));
    }
}
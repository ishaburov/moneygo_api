<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\ProcessingCheckoutResource;

final class ProcessingCheckout extends BaseMethod
{
    protected $secret;
    protected $id;
    protected $amount;
    protected $walletFromNumber;
    protected $walletToNumber;
    private $successUrl;
    private $cancelUrl;
    private $statusUrl;

    /**
     * @param mixed $secret
     */
    public function setSecret($secret): ProcessingCheckout
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): ProcessingCheckout
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): ProcessingCheckout
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param mixed $walletFromNumber
     */
    public function setWalletFromNumber($walletFromNumber): ProcessingCheckout
    {
        $this->walletFromNumber = $walletFromNumber;
        return $this;
    }

    /**
     * @param mixed $walletTo
     */
    public function setWalletToNumber($walletTo): ProcessingCheckout
    {
        $this->walletToNumber = $walletTo;
        return $this;
    }

    /**
     * @param mixed $successUrl
     */
    public function setSuccessUrl($successUrl): ProcessingCheckout
    {
        $this->successUrl = $successUrl;
        return $this;
    }

    /**
     * @param mixed $cancelUrl
     */
    public function setCancelUrl($cancelUrl): ProcessingCheckout
    {
        $this->cancelUrl = $cancelUrl;
        return $this;
    }

    /**
     * @param mixed $statusUrl
     */
    public function setStatusUrl($statusUrl): ProcessingCheckout
    {
        $this->statusUrl = $statusUrl;
        return $this;
    }


    public function response(): ProcessingCheckout
    {

        $content = $this->client
            ->post("api/processing/checkout", [
                'headers' => [
                    'Authorization' => $this->accessToken
                ],
                'json' => [
                    'wallet_to' => $this->walletToNumber,
                    'wallet_from' => $this->walletFromNumber,
                    'amount' => $this->amount,
                    'id' => $this->id,
                    'success_url' => $this->successUrl,
                    'cancel_url' => $this->cancelUrl,
                    'status_url' => $this->statusUrl,
                    'signature' => $this->makeSignature()
                ]
            ])
            ->getBody()
            ->getContents();


        $this->setOriginal($content);

        $result = $this->decode($content);

        $this->setArrayResult($result);

        return $this;
    }

    public function getResult(): ProcessingCheckoutResource
    {
        $data = $this->arrayResult['data'];

        $processingCheckout = new ProcessingCheckoutResource();
        $processingCheckout->setExpiredAt($data['expired_at']);
        $processingCheckout->setUrl($data['url']);

        return $processingCheckout;
    }

    protected function makeSignature(): string
    {
        $data = [
            'wallet_to' => $this->walletToNumber,
            'wallet_from' => $this->walletFromNumber,
            'amount' => (float)$this->amount,
            'id' => $this->id,
            'secret' => $this->secret,
        ];
        return hash('sha256', json_encode($data));
    }
}
<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\WalletResource;

final class Wallet extends BaseMethod
{
    private const URL = '/api/wallets';

    /**
     * @return $this
     */
    public function send(): Wallet
    {
        $content = $this->client
            ->get(self::URL);
    
        $this->setOriginal($content);
        
        $this->setArrayResult($content);

        return $this;
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        $resource = [];
        foreach ($this->arrayResult['data'] as $wallet) {
            $walletResource = new WalletResource();
            $walletResource->setId($wallet['id']);
            $walletResource->setAmount($wallet['amount']);
            $walletResource->setStatus($wallet['status']);
            $walletResource->setAmountLimit($wallet['amountLimit']);
            $walletResource->setNumber($wallet['number']);
            $walletResource->setCurrency($wallet['currency']);
            $resource[] = $walletResource;
        }

        return $resource;
    }
}
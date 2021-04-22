<?php


namespace MoneyGo\Methods;


use GuzzleHttp\Client;
use MoneyGo\Resource\WalletResource;

final class Wallet extends BaseMethod
{
    /**
     * @return $this
     */
    public function send(): Wallet
    {
        $content = $this->client
            ->get('api/wallets', ['headers' => [
                'Authorization' => $this->accessToken
            ]])
            ->getBody()
            ->getContents();

        $this->setOriginal($content);

        $result = $this->decode($content);

        $this->setArrayResult($result);

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
<?php


namespace MoneyGo\Methods;


use GuzzleHttp\Exception\GuzzleException;
use MoneyGo\Resource\WalletResource;

final class Wallet extends BaseMethod
{
    private const URL = 'api/wallets';

    /**
     * @return $this
     * @throws GuzzleException
     */
    public function send(): Wallet
    {
        $content = $this->client
            ->get(self::URL, ['headers' => [
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
<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\SearchWalletResource;

final class SearchWallet extends BaseMethod
{
    /*** @var string */
    private $walletNumber = "";

    public function setWalletNumber(string $walletNumber): SearchWallet
    {
        $this->walletNumber = $walletNumber;
        return $this;
    }

    /**
     * @return $this
     */
    public function send(): SearchWallet
    {
        $content = $this->client
            ->get("api/wallets/search/{$this->walletNumber}", [
                'headers' => [
                    'Authorization' => $this->accessToken
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
     * @return SearchWalletResource
     */
    public function getResult(): SearchWalletResource
    {
        $result = $this->arrayResult['data'];
        if (empty($result)) {
            return new SearchWalletResource();
        }
        $walletResource = new SearchWalletResource();
        $walletResource->setId($result['id']);
        $walletResource->setNumber($result['number']);
        $walletResource->setCurrency($result['currency']);
        $walletResource->setIsWalletExists(true);

        return $walletResource;
    }
}
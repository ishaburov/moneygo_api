<?php


namespace MoneyGo\Methods;


use GuzzleHttp\Exception\GuzzleException;
use MoneyGo\Resource\SearchWalletResource;

final class SearchWallet extends BaseMethod
{
    private const URL = "api/wallets/search/";
    /*** @var string */
    private $walletNumber = "";

    public function setWalletNumber(string $walletNumber): SearchWallet
    {
        $this->walletNumber = $walletNumber;
        return $this;
    }

    /**
     * @return $this
     * @throws GuzzleException
     */
    public function send(): SearchWallet
    {
        $content = $this->client
            ->get(self::URL . "{$this->walletNumber}", [
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
<?php


namespace MoneyGo\Methods;


use GuzzleHttp\Exception\GuzzleException;
use MoneyGo\Resource\WalletExistsResource;

final class WalletExists extends BaseMethod
{
    private const URL = "api/wallet-exists";
    /*** @var string */
    private $walletToNumber = "";
    /*** @var string */
    private $walletFromNumber = "";

    /**
     * Your wallet
     * @param string $walletNumber
     * @return $this
     */
    public function setWalletToNumber(string $walletNumber): WalletExists
    {
        $this->walletToNumber = $walletNumber;
        return $this;
    }

    /**
     * Other user wallet
     * @param string $walletNumber
     * @return $this
     */
    public function setWalletFromNumber(string $walletNumber): WalletExists
    {
        $this->walletFromNumber = $walletNumber;
        return $this;
    }

    /**
     * @return $this
     * @throws GuzzleException
     */
    public function send(): WalletExists
    {
        $content = $this->client
            ->get(self::URL, [
                'headers' => [
                    'Authorization' => $this->accessToken,
                ],
                'query' => [
                    'number_to' => $this->walletToNumber,
                    'number_from' => $this->walletFromNumber
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
     * @return WalletExistsResource
     */
    public function getResult(): WalletExistsResource
    {
        $result = $this->arrayResult['data'];
        if (empty($result)) {
            return new WalletExistsResource();
        }
        $walletResource = new WalletExistsResource();
        $walletResource->setNumberFrom($result['number_from']);
        $walletResource->setWalletFromId($result['wallet_from_id']);
        $walletResource->setNumberTo($result['number_to']);
        $walletResource->setWalletToId($result['wallet_to_id']);
        $walletResource->setCurrency($result['currency']);
        $walletResource->setIsWalletExists(true);

        return $walletResource;
    }
}
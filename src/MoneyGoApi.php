<?php

namespace MoneyGo;

use MoneyGo\Curl\Curl;
use MoneyGo\Methods\ActivateVoucher;
use MoneyGo\Methods\Currency;
use MoneyGo\Methods\FindVoucher;
use MoneyGo\Methods\ProcessingCheckout;
use MoneyGo\Methods\Rate;
use MoneyGo\Methods\SearchWallet;
use MoneyGo\Methods\Token;
use MoneyGo\Methods\Transfer;
use MoneyGo\Methods\User;
use MoneyGo\Methods\Voucher;
use MoneyGo\Methods\VoucherBuy;
use MoneyGo\Methods\Wallet;
use MoneyGo\Methods\WalletExists;

final class MoneyGoApi
{
    public static $isProd = true;
    /*** @var Curl */
    private $client;
    /*** @var string */
    private $accessToken;
    private const BASE_URL = 'https://api.money-go.com';
    private const BASE_URL_TEST = 'https://api.money-go-test.com';

    /**
     * ApiProvider constructor.
     */
    public function __construct()
    {
        $this->client = new Curl(static::$isProd ? self::BASE_URL : self::BASE_URL_TEST);
    }

    /**
     * @param string $token
     */
    public function setAccessToken(string $token): void
    {
        $this->client->setHeader('Authorization', 'Bearer ' . $token);
        $this->accessToken = $token;
    }
    
    /**
     * @return bool
     */
    public function isProd(): bool
    {
        return self::$isProd;
    }

    /**
     * @return Token
     */
    public function getToken(): Token
    {
        return new Token($this->getClient());
    }

    public function getTokenString(): string
    {
        return $this->accessToken;
    }

    /**
     * @return User
     */
    public function getMe(): User
    {
        return new User($this->getClient(), $this->accessToken);
    }

    /**
     * @return Wallet
     */
    public function getWallets(): Wallet
    {
        return new Wallet($this->getClient(), $this->accessToken);
    }

    /**
     * @return SearchWallet
     */
    public function searchWallet(): SearchWallet
    {
        return new SearchWallet($this->getClient(), $this->accessToken);
    }

    /**
     * @return WalletExists
     */
    public function walletExists(): WalletExists
    {
        return new WalletExists($this->getClient(), $this->accessToken);
    }

    /**
     * @return Transfer
     */
    public function transfer(): Transfer
    {
        return new Transfer($this->getClient(), $this->accessToken);
    }

    /**
     * @return Currency
     */
    public function currencies(): Currency
    {
        return new Currency($this->getClient(), $this->accessToken);
    }

    /**
     * @return Rate
     */
    public function rates(): Rate
    {
        return new Rate($this->getClient(), $this->accessToken);
    }

    /**
     * @return Voucher
     */
    public function vouchers(): Voucher
    {
        return new Voucher($this->getClient(), $this->accessToken);
    }

    /**
     * @deprecated since v1.40
     *
     * @return VoucherBuy
     */
    public function buyVoucher(): VoucherBuy
    {
        return new VoucherBuy($this->getClient(), $this->accessToken);
    }

    /**
     * @deprecated since v1.40
     *
     * @return FindVoucher
     */
    public function findVoucher(): FindVoucher
    {
        return new FindVoucher($this->getClient(), $this->accessToken);
    }

    /**
     * @deprecated since v1.40
     *
     * @return ActivateVoucher
     */
    public function activateVoucher(): ActivateVoucher
    {
        return new ActivateVoucher($this->getClient(), $this->accessToken);
    }

    /**
     * @return ProcessingCheckout
     */
    public function processingCheckout(): ProcessingCheckout
    {
        return new ProcessingCheckout($this->getClient(), $this->accessToken);
    }

    /**
     * @return Curl
     */
    private function getClient(): Curl
    {
        return $this->client;
    }
}
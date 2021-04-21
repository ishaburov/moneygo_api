<?php

namespace MoneyGo;

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

final class ApiProvider
{
    /*** @var Client */
    private $client;
    /*** @var string */
    private $accessToken;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function getClient(): \GuzzleHttp\Client
    {
        return $this->client
            ->getClient();
    }

    public function setAccessToken(string $token)
    {
        $this->accessToken = $token;
    }

    public function getToken(): Token
    {
        return new Token($this->getClient());
    }

    public function getMe(): User
    {
        return new User($this->getClient(), $this->accessToken);
    }

    public function getWallets(): Wallet
    {
        return new Wallet($this->getClient(), $this->accessToken);
    }

    public function searchWallet(): SearchWallet
    {
        return new SearchWallet($this->getClient(), $this->accessToken);
    }

    public function walletExists(): WalletExists
    {
        return new WalletExists($this->getClient(), $this->accessToken);
    }

    public function transfer(): Transfer
    {
        return new Transfer($this->getClient(), $this->accessToken);
    }

    public function currencies(): Currency
    {
        return new Currency($this->getClient(), $this->accessToken);
    }

    public function rates(): Rate
    {
        return new Rate($this->getClient(), $this->accessToken);
    }

    public function vouchers(): Voucher
    {
        return new Voucher($this->getClient(), $this->accessToken);
    }

    public function buyVoucher(): VoucherBuy
    {
        return new VoucherBuy($this->getClient(), $this->accessToken);
    }

    public function findVoucher(): FindVoucher
    {
        return new FindVoucher($this->getClient(), $this->accessToken);
    }

    public function activateVoucher(): ActivateVoucher
    {
        return new ActivateVoucher($this->getClient(), $this->accessToken);
    }

    public function processingCheckout(): ProcessingCheckout
    {
        return new ProcessingCheckout($this->getClient(), $this->accessToken);
    }
}
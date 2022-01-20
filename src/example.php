<?php

require dirname(__DIR__).'/vendor/autoload.php';

// prod url https://api.money-go.com
// test url https://api.money-go-test.com
\MoneyGo\MoneyGoApi::$isProd = true; // default true

$apiProvider = new \MoneyGo\MoneyGoApi();


$clientId = '';
$secret = '';

try {
    $accessToken = $apiProvider->getToken()
      ->setClientId($clientId)
      ->setClientSecret($secret)
      ->send()
      ->getAccessToken();
    
    $apiProvider->setAccessToken($accessToken);
} catch (\UnexpectedValueException $exception) {
    dd($exception->getMessage(), $exception->getCode());
}


dd($apiProvider->getMe()
  ->send()
  ->getResult());

//dump($apiProvider->getWallets()
//  ->send()
//  ->getResult());

//dump($apiProvider->searchWallet()
//  ->setWalletNumber('CLIENT_WALLET_NUMBER')
//  ->send()
//  ->getResult());

//dump($apiProvider->walletExists()
//  ->setWalletFromNumber('CLIENT_WALLET_NUMBER')
//  ->setWalletToNumber('YOUR_WALLET_NUMBER')
//  ->send()
//  ->getResult());

//dump($apiProvider->transfer()
//  ->setWalletFromNumber('YOUR_WALLET_NUMBER')
//  ->setWalletToNumber('CLIENT_WALLET_NUMBER')
//  ->setAmount(0.1)
//  ->setPaymentId('EXAMPLE_PAYMENT_INFO')
//  ->setDescription('EXAMPLE_DESCRIPTION')
//  ->send()
//  ->getResult());

//dump($apiProvider->currencies()
//  ->send()
//  ->getResult());

//dump($apiProvider->vouchers()
//  ->setPage(1)
//  ->send()
//  ->getResult());

//
//$voucher = $apiProvider->buyVoucher()
//  ->setAmount('0.1')
//  ->setWalletFrom('WALLET_NUMBER')
//  ->setDescription('EXAMPLE_DESCRIPTION')
//  ->send()
//  ->getResult();
//
//dump($apiProvider->findVoucher()
//  ->setWalletNumber('WALLET_NUMBER')
//  ->setVoucherCode($voucher->getSecret())
//  ->setVoucherNumber($voucher->getId())
//  ->send()
//  ->getResult());
//
//dump( $apiProvider->activateVoucher()
//  ->setWalletNumber('WALLET_NUMBER') // You can activate to other wallet
//  ->setVoucherCode($voucher->getSecret())
//  ->setVoucherNumber($voucher->getId())
//  ->setDescription('EXAMPLE_DESCRIPTION')
//  ->send()
//  ->getResult());

//dump($apiProvider->processingCheckout()
//  ->setSecret('FORM_SECRET_KEY')
//  ->setId('EXAMPLE_PAYMENT_INFO')
//  ->setUserInfo('EXAMPLE USER_INFO') //
//  ->setAmount(1.0)
//  ->setWalletFromNumber('CLIENT_WALLET_NUMBER')
//  ->setWalletToNumber('YOUR_WALLET_NUMBER')
//  ->setSuccessUrl('SUCCESS_URL') // link where redirect user after success
//  ->setStatusUrl('STATUS_URL') // link where you get payment status e.g https://webhook.site
//  ->setCancelUrl('CANCEL_URL') // link where redirect user after cancel
//  ->send()
//  ->getResult());
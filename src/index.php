<?php

require dirname(__DIR__) . '/vendor/autoload.php';


$apiProvider = (new MoneyGo\Client())->getApiProvider();
$clientId = '';
$secret = '';

$accessToken = $apiProvider->getToken()
    ->setClientId($clientId)
    ->setClientSecret($secret)
    ->response()
    ->getAccessToken();

$apiProvider->setAccessToken($accessToken);

/*
dump(
    $apiProvider->getMe()
        ->response()
        ->getResult()
);

dump(
    $apiProvider->getWallets()
        ->response()
        ->getResult()
);

dump(
    $apiProvider->searchWallet()
        ->setWalletNumber('U129')
        ->response()
        ->getResult()
);

dump(
    $apiProvider->walletExists()
        ->setWalletFromNumber('U129')
        ->setWalletToNumber('U7')
        ->response()
        ->getResult()
);

dump(
    $apiProvider->transfer()
        ->setWalletFromNumber('U7')
        ->setWalletToNumber('E173315')
        ->setAmount(0.1)
        ->setPaymentId('id1234')
        ->setDescription('From library')
        ->response()
        ->getResult()
);
dump(
    $apiProvider->currencies()
        ->response()
        ->getResult()
);
dump(
    $apiProvider->vouchers()
        ->setPage(1)
        ->response()
        ->getResult()
);
dump(
$voucher = $apiProvider->buyVoucher()
    ->setAmount('0.01')
    ->setWalletFrom('U7')
    ->setDescription('test')
    ->response()
    ->getResult();
)

$apiProvider->findVoucher()
    ->setWalletNumber('U7')
    ->setVoucherCode('OPOZtYvoF0JQlmXSrEV/vKUSO2dtjcHH5TzKl7aMdaM=')
    ->setVoucherNumber('2371')
    ->response()
    ->getResult();

$apiProvider->activateVoucher()
    ->setWalletNumber('U7')
    ->setVoucherCode($voucher->getSecret())
    ->setVoucherNumber($voucher->getId())
    ->setDescription('Description')
    ->response()
    ->getResult()



 $apiProvider->processingCheckout()
        ->setSecret('')
        ->setId('123')
        ->setAmount(1)
        ->setWalletToNumber('')
        ->setWalletFromNumber('')
        ->setSuccessUrl('https://google.com')
        ->setStatusUrl('https://google.com')
        ->setCancelUrl('https://google.com')
        ->response()
        ->getResult()
*/




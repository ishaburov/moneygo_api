# Api for MoneyGo wallet

## Install
composer require money-go/money-go-api
## Api documentation

#### https://moneygo.docs.apiary.io

## Usage 

### 1. Get CLIENT_ID and CLIENT_SECRET by contacting us
### 2. Get access_token using method
  - set client id
  - set client secret
  - get response using the method send
  - get access_token and set the token to ApiProvider class 

``` 
$apiProvider = new MoneyGoApi();
    $clientId = '';
    $secret = '';
    
    $accessToken = $apiProvider->getToken()
    ->setClientId($clientId)
    ->setClientSecret($secret)
    ->send()
    ->getAccessToken();
    
    $apiProvider->setAccessToken($accessToken);    
```
### 3. Available methods
#### Get information about my account
```
$apiProvider->getMe()
        ->send()
        ->getResult()
```
#### Get information about available wallets in your account
```     
$apiProvider->getWallets()
        ->send()
        ->getResult()
```
#### Search client wallet's which use MoneyGo wallet
```
$apiProvider->searchWallet()
        ->setWalletNumber('CLIENT_WALLET_NUMBER')
        ->send()
        ->getResult()
```
#### Check exists client wallet's which use MoneyGo wallet
```   
   $apiProvider->walletExists()
        ->setWalletFromNumber('CLIENT_WALLET_NUMBER')
        ->setWalletToNumber('YOUR_WALLET_NUMBER')
        ->send()
        ->getResult()
```
#### Withdraw money to moneyGO client wallet's
```  
  $apiProvider->transfer()
        ->setWalletFromNumber(YOUR_WALLET_NUMBER')
        ->setWalletToNumber(CLIENT_WALLET_NUMBER')
        ->setAmount(0.1)
        ->setPaymentId('EXAMPLE_PAYMENT_INFO')
        ->setDescription('EXAMPLE_DESCRIPTION')
        ->send()
        ->getResult()
```
#### Get all currencies which are used on MoneyGo
```
$apiProvider->currencies()
        ->send()
        ->getResult()
```
#### Get pagination vouchers
```   
   $apiProvider->vouchers()
        ->setPage(1)
        ->send()
        ->getResult()
```
#### Buy voucher
```    
    $apiProvider->buyVoucher()
        ->setAmount('0.1')
        ->setWalletFrom('YOUR_WALLET_NUMBER')
        ->setDescription('EXAMPLE_DESCRIPTION')
        ->send()
        ->getResult();
```
#### Find voucher for activation
```   
   $apiProvider->findVoucher()
        ->setWalletNumber('YOUR_WALLET_NUMBER')
        ->setVoucherCode('VOUCHER_SECRET')
        ->setVoucherNumber('VOUCHER_ID')
        ->send()
        ->getResult();
```
#### Activate voucher
``` 
 $apiProvider->activateVoucher()
        ->setWalletNumber('WALLET_NUMBER') // You can activate to other wallet
        ->setVoucherCode('VOUCHER_SECRET')
        ->setVoucherNumber('VOUCHER_ID')
        ->setDescription('EXAMPLE_DESCRIPTION')
        ->send()
        ->getResult()
```
#### Processing checkout(Create payment link, deposit your account)
``` 
 $apiProvider->processingCheckout()
        ->setSecret('FORM_SECRET_KEY')
        ->setId('EXAMPLE_PAYMENT_INFO')
        ->setAmount(1)
        ->setWalletToNumber('YOUR_WALLET_NUMBER')
        ->setWalletFromNumber('CLIENT_WALLET_NUMBER')
        ->setSuccessUrl('SUCCESS_URL') // link where redirect user after success
        ->setStatusUrl('STATUS_URL') // link where you get payment status
        ->setCancelUrl('CANCEL_URL') // link where redirect user after cancel
        ->send()
        ->getResult()
```

# Api for MoneyGo wallet

## Install
composer require money-go/money-go-api
## Api documentation

#### https://moneygo.docs.apiary.io

## Usage 

### 1. Get CLIENT_ID and CLIENT_SECRET by contacting us
### 2. Get access_token using method
https://api.money-go.com/token
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
https://api.money-go.com/api/user/me
```
$apiProvider->getMe()
        ->send()
        ->getResult()
```
#### Get information about available wallets in your account
https://api.money-go.com/api/wallets
```     
$apiProvider->getWallets()
        ->send()
        ->getResult()
```
#### Search client wallet's which use MoneyGo wallet
https://api.money-go.com/api/wallets/search/WALLET_CODE
```
$apiProvider->searchWallet()
        ->setWalletNumber('CLIENT_WALLET_NUMBER')
        ->send()
        ->getResult()
```
#### Check exists client wallet's which use MoneyGo wallet
https://api.money-go.com/api/wallet-exists?number_to=&number_from=
```   
   $apiProvider->walletExists()
        ->setWalletFromNumber('CLIENT_WALLET_NUMBER')
        ->setWalletToNumber('YOUR_WALLET_NUMBER')
        ->send()
        ->getResult()
```
#### Withdraw money to moneyGO client wallet's
https://api.money-go.com/api/transaction/transfer
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
https://api.money-go.com/api/currencies
```
$apiProvider->currencies()
        ->send()
        ->getResult()
```
#### Get pagination vouchers
https://api.money-go.com/api/vouchers?page=page
```   
   $apiProvider->vouchers()
        ->setPage(1)
        ->send()
        ->getResult()
```
#### Buy voucher
https://api.money-go.com/api/vouchers/buy
```    
    $apiProvider->buyVoucher()
        ->setAmount('0.1')
        ->setWalletFrom('YOUR_WALLET_NUMBER')
        ->setDescription('EXAMPLE_DESCRIPTION')
        ->send()
        ->getResult();
```
#### Find voucher for activation
https://api.money-go.com/api/vouchers/activation?voucher_number=voucher_number&voucher_code=voucher_code&wallet_id=wallet_id&wallet_number=wallet_number
```   
   $apiProvider->findVoucher()
        ->setWalletNumber('YOUR_WALLET_NUMBER')
        ->setVoucherCode('VOUCHER_SECRET')
        ->setVoucherNumber('VOUCHER_ID')
        ->send()
        ->getResult();
```
#### Activate voucher
https://api.money-go.com/api/vouchers/activation
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
https://api.money-go.com/api/processing/checkout
``` 
 $apiProvider->processingCheckout()
        ->setSecret('FORM_SECRET_KEY')
        ->setId('EXAMPLE_PAYMENT_INFO')
        ->setAmount(1)
        ->setUserInfo('EXAMPLE USER_INFO') //PLEASE fill user_info with unique user value 
        ->setWalletToNumber('YOUR_WALLET_NUMBER')
        ->setWalletFromNumber('CLIENT_WALLET_NUMBER')
        ->setSuccessUrl('SUCCESS_URL') // link where redirect user after success
        ->setStatusUrl('STATUS_URL') // link where you get payment status e.g https://webhook.site
        ->setCancelUrl('CANCEL_URL') // link where redirect user after cancel
        ->send()
        ->getResult()
```

<?php


namespace MoneyGo\Methods;


use GuzzleHttp\Client;
use MoneyGo\Resource\UserResource;

final class User extends BaseMethod
{
    /**
     * @return $this
     */
    public function send(): User
    {
        $content = $this->client
            ->get('api/user/me', ['headers' => [
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
     * @return UserResource
     */
    public function getResult(): UserResource
    {
        $result = $this->arrayResult['data'];
        $Resource = new UserResource();
        $Resource->setId($result['id']);
        $Resource->setEmail($result['email']);
        $Resource->setFullName($result['fullname']);
        $Resource->setLastLogin($result['lastlogin']);
        $Resource->setLastIp($result['lastip']);
        $Resource->setCountry($result['country']);
        $Resource->setAddress($result['address']);
        $Resource->setZipcode($result['zipcode']);
        $Resource->setPhone($result['phone']);
        $Resource->setWithdrawCommission($result['withdraw_commission']);
        $Resource->setProcessingCommission($result['processing_commission']);
        $Resource->setCodephrase($result['codephrase']);
        $Resource->setCity($result['city']);
        $Resource->setDateCreated($result['date_created']);
        $Resource->setDocumentUploaded($result['document_uploaded']);
        $Resource->setDocumentVerify($result['document_verify']);
        $Resource->setIsExchanger($result['is_excharger']);
        return $Resource;
    }
}
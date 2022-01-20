<?php


namespace MoneyGo\Methods;


use MoneyGo\Resource\UserResource;

final class User extends BaseMethod
{
    private const URL = '/api/user/me';
    
    /**
     * @return $this
     */
    public function send(): User
    {
        $content = $this->client
          ->get(self::URL, []);
        
        $this->setOriginal($content);
        
        $this->setArrayResult($content);
        
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
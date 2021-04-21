<?php


namespace MoneyGo\Resource;


final class UserResource
{
    private $email;
    private $id;
    private $fullName;
    private $lastLogin;
    private $lastIp;
    private $login;
    private $country;
    private $address;
    private $zipcode;
    private $phone;
    private $withdrawCommission;
    private $processingCommission;
    private $codephrase;
    private $city;
    private $dateCreated;
    private $documentUploaded;
    private $documentVerify;
    private $isExchanger;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param mixed $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return mixed
     */
    public function getLastIp()
    {
        return $this->lastIp;
    }

    /**
     * @param mixed $lastIp
     */
    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param mixed $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getWithdrawCommission()
    {
        return $this->withdrawCommission;
    }

    /**
     * @param mixed $withdrawCommission
     */
    public function setWithdrawCommission($withdrawCommission)
    {
        $this->withdrawCommission = $withdrawCommission;
    }

    /**
     * @return mixed
     */
    public function getProcessingCommission()
    {
        return $this->processingCommission;
    }

    /**
     * @param mixed $processingCommission
     */
    public function setProcessingCommission($processingCommission)
    {
        $this->processingCommission = $processingCommission;
    }

    /**
     * @return mixed
     */
    public function getCodephrase()
    {
        return $this->codephrase;
    }

    /**
     * @param mixed $codephrase
     */
    public function setCodephrase($codephrase)
    {
        $this->codephrase = $codephrase;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDocumentUploaded()
    {
        return $this->documentUploaded;
    }

    /**
     * @param mixed $documentUploaded
     */
    public function setDocumentUploaded($documentUploaded)
    {
        $this->documentUploaded = $documentUploaded;
    }

    /**
     * @return mixed
     */
    public function getDocumentVerify()
    {
        return $this->documentVerify;
    }

    /**
     * @param mixed $documentVerify
     */
    public function setDocumentVerify($documentVerify)
    {
        $this->documentVerify = $documentVerify;
    }

    /**
     * @return mixed
     */
    public function getIsExchanger()
    {
        return $this->isExchanger;
    }

    /**
     * @param mixed $isExchanger
     */
    public function setIsExchanger($isExchanger)
    {
        $this->isExchanger = $isExchanger;
    }


}
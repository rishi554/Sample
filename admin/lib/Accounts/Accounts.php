<?php
require __DIR__.'/../LocationMaster/City.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accounts
 *
 * @author PHP Developers
 */
class Accounts extends City {
    
    private $AccountName;
    private $GroupId;
    private $CostCenter;
    private $BillWiseDetail;
    private $CreditDays;
    private $CreditLimit;
    private $PriceListId;
    private $Address1;
    private $Address2;
    private $Address3;
    private $CityId;
    private $pincode;
    private $phone;
    private $email;
    private $website;
    private $remarks;
    private $contactPerson;
    private $ContactPersonMobile;
    private $CSTNo;
    private $VATNo;
    private $PANNo;
    private $ServiceTaxNo;
    private $DebitAmount;
    private $CreditAmount;
    private $VatClassId;
    private $IntRate;
    private $IntRatePer;
    private $AMField1;
    private $AMField2;
    private $Link;
    private $UseInPayroll;
    private $TeamId;
    private $AccountCode;
    
    
    public function __construct() {
        parent::__construct();
    }
    
    function getAccountName() {
        return $this->AccountName;
    }

    function getGroupId() {
        return $this->GroupId;
    }

    function getCostCenter() {
        return $this->CostCenter;
    }

    function getBillWiseDetail() {
        return $this->BillWiseDetail;
    }

    function getCreditDays() {
        return $this->CreditDays;
    }

    function getCreditLimit() {
        return $this->CreditLimit;
    }

    function getPriceListId() {
        return $this->PriceListId;
    }

    function getAddress1() {
        return $this->Address1;
    }

    function getAddress2() {
        return $this->Address2;
    }

    function getAddress3() {
        return $this->Address3;
    }

    function getCityId() {
        return $this->CityId;
    }

    function getPincode() {
        return $this->pincode;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getWebsite() {
        return $this->website;
    }

    function getRemarks() {
        return $this->remarks;
    }

    function getContactPerson() {
        return $this->contactPerson;
    }

    function getContactPersonMobile() {
        return $this->ContactPersonMobile;
    }

    function getCSTNo() {
        return $this->CSTNo;
    }

    function getVATNo() {
        return $this->VATNo;
    }

    function getPANNo() {
        return $this->PANNo;
    }

    function getServiceTaxNo() {
        return $this->ServiceTaxNo;
    }

    function getDebitAmount() {
        return $this->DebitAmount;
    }

    function getCreditAmount() {
        return $this->CreditAmount;
    }

    function getVatClassId() {
        return $this->VatClassId;
    }

    function getIntRate() {
        return $this->IntRate;
    }

    function getIntRatePer() {
        return $this->IntRatePer;
    }

    function getAMField1() {
        return $this->AMField1;
    }

    function getAMField2() {
        return $this->AMField2;
    }

    function getLink() {
        return $this->Link;
    }

    function getUseInPayroll() {
        return $this->UseInPayroll;
    }

    function getTeamId() {
        return $this->TeamId;
    }

    function getAccountCode() {
        return $this->AccountCode;
    }

    function getLogUser() {
        return $this->LogUser;
    }

    function getLogLocation() {
        return $this->LogLocation;
    }

    function getLogSession() {
        return $this->LogSession;
    }

    function setAccountName($AccountName) {
        $this->AccountName = $AccountName;
    }

    function setGroupId($GroupId) {
        $this->GroupId = $GroupId;
    }

    function setCostCenter($CostCenter) {
        $this->CostCenter = $CostCenter;
    }

    function setBillWiseDetail($BillWiseDetail) {
        $this->BillWiseDetail = $BillWiseDetail;
    }

    function setCreditDays($CreditDays) {
        $this->CreditDays = $CreditDays;
    }

    function setCreditLimit($CreditLimit) {
        $this->CreditLimit = $CreditLimit;
    }

    function setPriceListId($PriceListId) {
        $this->PriceListId = $PriceListId;
    }

    function setAddress1($Address1) {
        $this->Address1 = $Address1;
    }

    function setAddress2($Address2) {
        $this->Address2 = $Address2;
    }

    function setAddress3($Address3) {
        $this->Address3 = $Address3;
    }

    function setCityId($CityId) {
        $this->CityId = $CityId;
    }

    function setPincode($pincode) {
        $this->pincode = $pincode;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setWebsite($website) {
        $this->website = $website;
    }

    function setRemarks($remarks) {
        $this->remarks = $remarks;
    }

    function setContactPerson($contactPerson) {
        $this->contactPerson = $contactPerson;
    }

    function setContactPersonMobile($ContactPersonMobile) {
        $this->ContactPersonMobile = $ContactPersonMobile;
    }

    function setCSTNo($CSTNo) {
        $this->CSTNo = $CSTNo;
    }

    function setVATNo($VATNo) {
        $this->VATNo = $VATNo;
    }

    function setPANNo($PANNo) {
        $this->PANNo = $PANNo;
    }

    function setServiceTaxNo($ServiceTaxNo) {
        $this->ServiceTaxNo = $ServiceTaxNo;
    }

    function setDebitAmount($DebitAmount) {
        $this->DebitAmount = $DebitAmount;
    }

    function setCreditAmount($CreditAmount) {
        $this->CreditAmount = $CreditAmount;
    }

    function setVatClassId($VatClassId) {
        $this->VatClassId = $VatClassId;
    }

    function setIntRate($IntRate) {
        $this->IntRate = $IntRate;
    }

    function setIntRatePer($IntRatePer) {
        $this->IntRatePer = $IntRatePer;
    }

    function setAMField1($AMField1) {
        $this->AMField1 = $AMField1;
    }

    function setAMField2($AMField2) {
        $this->AMField2 = $AMField2;
    }

    function setLink($Link) {
        $this->Link = $Link;
    }

    function setUseInPayroll($UseInPayroll) {
        $this->UseInPayroll = $UseInPayroll;
    }

    function setTeamId($TeamId) {
        $this->TeamId = $TeamId;
    }

    function setAccountCode($AccountCode) {
        $this->AccountCode = $AccountCode;
    }

    function setLogUser($LogUser) {
        $this->LogUser = $LogUser;
    }

    function setLogLocation($LogLocation) {
        $this->LogLocation = $LogLocation;
    }

    function setLogSession($LogSession) {
        $this->LogSession = $LogSession;
    }

    public function GetAccounts(){
              
        $AccountTable = "account_master";
        $AccountCondition = "";
        $result = $this->SelectTable($AccountTable, $AccountCondition,'',0);
        
        if($result){
            
            $this->setJsonEncode($result); // setting data into json object
            $request = $this->getJsonEncode(); // getting data into json object
            return $request;
            
        }else{
            return false;
        }
    }
    public function AddAccount(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setAccountName($this->getEscapString($request->AccountName));
        $this->setGroupId($this->getEscapString($request->GroupId));
        $this->setCostCenter($this->getEscapString($request->CostCenter));
        $this->setBillWiseDetail($this->getEscapString($request->BillWiseDetail));
        $this->setPriceListId($this->getEscapString($request->PriceListId));
        $this->setUseInPayroll($this->getEscapString($request->UseInPayroll));
        $this->setCreditDays($this->getEscapString($request->CreditDays));
        $this->setCreditLimit($this->getEscapString($request->CreditLimit));
        $this->setIntRate($this->getEscapString($request->IntRate));
        $this->setIntRatePer($this->getEscapString($request->IntRatePer));
        $this->setRemarks($this->getEscapString($request->remarks));
        $this->setTeamId($this->getEscapString(implode(',', $request->TeamId)));
        $this->setAddress1($this->getEscapString($request->Address1));
        $this->setAddress2($this->getEscapString($request->Address2));
        $this->setAddress3($this->getEscapString($request->Address3));
        $this->setCityId($this->getEscapString($request->CityId));
        $this->setStateId($this->getEscapString($request->StateId));
        $this->setCountryId($this->getEscapString($request->CountryId));
        $this->setPincode($this->getEscapString($request->pincode));
        $this->setPhone($this->getEscapString($request->phone));
        $this->setEmail($this->getEscapString($request->email));
        $this->setWebsite($this->getEscapString($request->website));
        $this->setContactPerson($this->getEscapString($request->contactPerson));
        $this->setContactPersonMobile($this->getEscapString($request->ContactPersonMobile));
        $this->setCSTNo($this->getEscapString($request->CSTNo));
        $this->setVATNo($this->getEscapString($request->VATNo));
        $this->setPANNo($this->getEscapString($request->PANNo));
        $this->setServiceTaxNo($this->getEscapString($request->ServiceTaxNo));
        $this->setVatClassId($this->getEscapString($request->VatClassId));
        $this->setIsActive($this->getEscapString(1));
        $this->setIsFixed($this->getEscapString(1));
        
        $AccountTable = "account_master";
        $AccountData = array('AccountName'=>$this->getAccountName(),'GroupId'=>$this->getGroupId(),'CostCenter'=>$this->getCostCenter(), 'BillWiseDetail'=>$this->getBillWiseDetail(),'PriceListId'=>$this->getPriceListId(), 'UseInPayroll'=>$this->getUseInPayroll(),'CreditDays'=>$this->getCreditDays(), 'CreditLimit'=>$this->getCreditLimit(),'IntRate'=>$this->getIntRate(), 'IntRatePer'=>$this->getIntRatePer(),'remarks'=>$this->getremarks(),'TeamId'=>$this->getTeamId(), 'Address1'=>$this->getAddress1(),'Address2'=>$this->getAddress2(), 'Address3'=>$this->getAddress3(),'CityId'=>$this->getCityId(), 'StateId'=>$this->getStateId(),'CountryId'=>$this->getCountryId(), 'pincode'=>$this->getPincode(),'phone'=>$this->getPhone(), 'email'=>$this->getEmail(),'website'=>$this->getWebsite(),'contactPerson'=>$this->getContactPerson(),'ContactPersonMobile'=>$this->getContactPersonMobile(),'CSTNo'=>$this->getCSTNo(),'VATNo'=>$this->getVATNo(),'PANNo'=>$this->getPANNo(),'ServiceTaxNo'=>$this->getServiceTaxNo(),'VatClassId'=>$this->getVatClassId(),'IsActive'=>$this->getIsActive(),'IsFixed'=>$this->getIsFixed());
        
        $AccountCondition = "AccountName='$request->AccountName'";
        $Exists = $this->SelectSingleRow($AccountTable, $AccountCondition, '', 0);
        if(count($Exists['AccountName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($AccountTable, $AccountData, 0);
            return 1;
        }
        
    }
}

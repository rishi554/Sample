<?php
require __DIR__.'/../LocationMaster/City.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerManagement
 *
 * @author PHP Developers
 */
class CustomerManagement extends City{
    
    private $salutation;
    private $first_name;
    private $last_name;
    private $company_name;
    private $card_id;
    private $cust_typeid;
    private $allow_creditsale;
    private $account_id;
    private $opening_point;
    private $earned_point;
    private $redeemed_point;
    private $balance_point;
    private $card_issuedate;
    private $card_expiredate;
    private $address1;
    private $address2;
    private $address3;
    private $altaddress1;
    private $altaddress2;
    private $altaddress3;
    private $cityid;
    private $altcountryid;
    private $altstateid;
    private $altcityid;
    private $altpincode;
    private $pincode;
    private $mobile;
    private $phone;
    private $fax;
    private $email;
    private $website;
    private $birthdate;
    private $annivarsary;
    private $spouse_name;
    private $remark;
    private $picture;
    private $limit;
    private $spent;
    private $deposit;
    private $location_id;
    private $card_assign;
    private $nationality;
    private $gender;
    private $billing_address;
    private $deliverytype;
    private $team;
    private $send_email;
    private $send_sms;
    private $password;
    private $finger_scan;
    
    function __construct() {
        parent::__construct();
    }
    
    function getAltaddress1() {
        return $this->altaddress1;
    }

    function getAltaddress2() {
        return $this->altaddress2;
    }

    function getAltaddress3() {
        return $this->altaddress3;
    }

    function getAltcityid() {
        return $this->altcityid;
    }

    function setAltaddress1($altaddress1) {
        $this->altaddress1 = $altaddress1;
    }

    function setAltaddress2($altaddress2) {
        $this->altaddress2 = $altaddress2;
    }

    function setAltaddress3($altaddress3) {
        $this->altaddress3 = $altaddress3;
    }

    function setAltcityid($altcityid) {
        $this->altcityid = $altcityid;
    }
    function getAltcountryid() {
        return $this->altcountryid;
    }

    function getAltstateid() {
        return $this->altstateid;
    }

    function setAltcountryid($altcountryid) {
        $this->altcountryid = $altcountryid;
    }

    function setAltstateid($altstateid) {
        $this->altstateid = $altstateid;
    }

    function getSalutation() {
        return $this->salutation;
    }

    function getFirst_name() {
        return $this->first_name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getCompany_name() {
        return $this->company_name;
    }

    function getCard_id() {
        return $this->card_id;
    }

    function getCust_typeid() {
        return $this->cust_typeid;
    }

    function getAllow_creditsale() {
        return $this->allow_creditsale;
    }

    function getAccount_id() {
        return $this->account_id;
    }

    function getOpening_point() {
        return $this->opening_point;
    }

    function getEarned_point() {
        return $this->earned_point;
    }

    function getRedeemed_point() {
        return $this->redeemed_point;
    }

    function getBalance_point() {
        return $this->balance_point;
    }

    function getCard_issuedate() {
        return $this->card_issuedate;
    }

    function getCard_expiredate() {
        return $this->card_expiredate;
    }

    function getAddress1() {
        return $this->address1;
    }

    function getAddress2() {
        return $this->address2;
    }

    function getAddress3() {
        return $this->address3;
    }

    function getCityid() {
        return $this->cityid;
    }

    function getPincode() {
        return $this->pincode;
    }

    function getMobile() {
        return $this->mobile;
    }

    function getPhone() {
        return $this->phone;
    }

    function getFax() {
        return $this->fax;
    }

    function getEmail() {
        return $this->email;
    }

    function getWebsite() {
        return $this->website;
    }

    function getBirthdate() {
        return $this->birthdate;
    }

    function getAnnivarsary() {
        return $this->annivarsary;
    }

    function getSpouse_name() {
        return $this->spouse_name;
    }

    function getRemark() {
        return $this->remark;
    }

    function getPicture() {
        return $this->picture;
    }

    function getLimit() {
        return $this->limit;
    }

    function getSpent() {
        return $this->spent;
    }

    function getDeposit() {
        return $this->deposit;
    }

    function getLocation_id() {
        return $this->location_id;
    }

    function getCard_assign() {
        return $this->card_assign;
    }

    function getNationality() {
        return $this->nationality;
    }

    function getGender() {
        return $this->gender;
    }

    function getBilling_address() {
        return $this->billing_address;
    }

    function getDeliverytype() {
        return $this->deliverytype;
    }

    function getTeam() {
        return $this->team;
    }

    function getSend_email() {
        return $this->send_email;
    }

    function getSend_sms() {
        return $this->send_sms;
    }

    function getPassword() {
        return $this->password;
    }

    function getLogUser() {
        return $this->LogUser;
    }

    function getFinger_scan() {
        return $this->finger_scan;
    }

    function setSalutation($salutation) {
        $this->salutation = $salutation;
    }

    function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setCompany_name($company_name) {
        $this->company_name = $company_name;
    }

    function setCard_id($card_id) {
        $this->card_id = $card_id;
    }

    function setCust_typeid($cust_typeid) {
        $this->cust_typeid = $cust_typeid;
    }

    function setAllow_creditsale($allow_creditsale) {
        $this->allow_creditsale = $allow_creditsale;
    }

    function setAccount_id($account_id) {
        $this->account_id = $account_id;
    }

    function setOpening_point($opening_point) {
        $this->opening_point = $opening_point;
    }

    function setEarned_point($earned_point) {
        $this->earned_point = $earned_point;
    }

    function setRedeemed_point($redeemed_point) {
        $this->redeemed_point = $redeemed_point;
    }

    function setBalance_point($balance_point) {
        $this->balance_point = $balance_point;
    }

    function setCard_issuedate($card_issuedate) {
        $this->card_issuedate = $card_issuedate;
    }

    function setCard_expiredate($card_expiredate) {
        $this->card_expiredate = $card_expiredate;
    }

    function setAddress1($address1) {
        $this->address1 = $address1;
    }

    function setAddress2($address2) {
        $this->address2 = $address2;
    }

    function setAddress3($address3) {
        $this->address3 = $address3;
    }

    function setCityid($cityid) {
        $this->cityid = $cityid;
    }

    function setPincode($pincode) {
        $this->pincode = $pincode;
    }

    function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setFax($fax) {
        $this->fax = $fax;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setWebsite($website) {
        $this->website = $website;
    }

    function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    function setAnnivarsary($annivarsary) {
        $this->annivarsary = $annivarsary;
    }

    function setSpouse_name($spouse_name) {
        $this->spouse_name = $spouse_name;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setPicture($picture) {
        $this->picture = $picture;
    }

    function setLimit($limit) {
        $this->limit = $limit;
    }

    function setSpent($spent) {
        $this->spent = $spent;
    }

    function setDeposit($deposit) {
        $this->deposit = $deposit;
    }

    function setLocation_id($location_id) {
        $this->location_id = $location_id;
    }

    function setCard_assign($card_assign) {
        $this->card_assign = $card_assign;
    }

    function setNationality($nationality) {
        $this->nationality = $nationality;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setBilling_address($billing_address) {
        $this->billing_address = $billing_address;
    }

    function setDeliverytype($deliverytype) {
        $this->deliverytype = $deliverytype;
    }

    function setTeam($team) {
        $this->team = $team;
    }

    function setSend_email($send_email) {
        $this->send_email = $send_email;
    }

    function setSend_sms($send_sms) {
        $this->send_sms = $send_sms;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setLogUser($LogUser) {
        $this->LogUser = $LogUser;
    }

    function setFinger_scan($finger_scan) {
        $this->finger_scan = $finger_scan;
    }
    function getAltpincode() {
        return $this->altpincode;
    }

    function setAltpincode($altpincode) {
        $this->altpincode = $altpincode;
    }

    function AddCustomer(){
        
        $this->setIsActive(1);
        $this->IsActive = $this->getEscapString($this->getIsActive());
        $this->setIsFixed(1);
        $this->IsFixed = $this->getEscapString($this->getIsFixed());
        $this->setSalutation($this->getEscapString($_POST['Salutation']));
        $this->setFirst_name($this->getEscapString($_POST['firstname']));
        $this->setLast_name($this->getEscapString($_POST['lastname']));
        $this->setCompany_name($this->getEscapString($_POST['CompanyName']));
        $this->setCust_typeid($this->getEscapString($_POST['CustomerType']));
        $this->setCard_id($this->getEscapString($_POST['CardTypeName']));
        $this->setAllow_creditsale($this->getEscapString($_POST['AllowCreditSale']));
        $this->setAccount_id($this->getEscapString($_POST['selectedAccount']));
        $this->setRemark($this->getEscapString($_POST['OtherInfo']));
        $this->setOpening_point($this->getEscapString($_POST['OpeningPoint']));
        $this->setCard_issuedate($this->getEscapString($_POST['CardIssueDate']));
        $this->setCard_expiredate($this->getEscapString($_POST['CardExpiryDate']));
        $this->setLocation_id($this->getEscapString($_POST['LocationId']));
        $this->setTeam($this->getEscapString(implode(',', $_POST['CustTeamId'])));
        $this->setNationality($this->getEscapString($_POST['Nationality']));
        $this->setGender($this->getEscapString($_POST['Gender']));
        $this->setBirthdate($this->getEscapString($_POST['BirthDate']));
        $this->setSpouse_name($this->getEscapString($_POST['SpouseName']));
        $this->setAnnivarsary($this->getEscapString($_POST['AnniversaryDate']));
        $this->setAddress1($this->getEscapString($_POST['AddressLandmark']));
        $this->setAddress2($this->getEscapString($_POST['AddressCrossRoad']));
        $this->setAddress3($this->getEscapString($_POST['AddressOtherInstruct']));
        $this->setCityid($this->getEscapString($_POST['MainCityId']));
        $this->setStateId($this->getEscapString($_POST['MainStateId']));
        $this->setCountryId($this->getEscapString($_POST['MainCountryId']));
        $this->setPincode($this->getEscapString($_POST['PostalCode']));
        $this->setPhone($this->getEscapString($_POST['Phone']));
        $this->setMobile($this->getEscapString($_POST['Mobile']));
        $this->setFax($this->getEscapString($_POST['Fax']));
        $this->setEmail($this->getEscapString($_POST['Email']));
        $this->setWebsite($this->getEscapString($_POST['Website']));
        $this->setPicture($this->getEscapString($_POST['ProfileImage']));
        $this->setPassword($this->getEscapString($_POST['Password']));
        
        $ProfilePicture = $_FILES['ProfileImage']['name'];
        $path = $_SERVER['DOCUMENT_ROOT'].'/lib/CustomerManagement/ProfilePictures/'.$ProfilePicture;
        move_uploaded_file($_FILES['ProfileImage']['tmp_name'],$path);
        
        $this->setAltaddress1($this->getEscapString($_POST['altAddressLandmark']));
        $this->setAltaddress2($this->getEscapString($_POST['altAddressCrossRoad']));
        $this->setAltaddress3($this->getEscapString($_POST['altAddressOtherInstruct']));
        $this->setAltcityid($this->getEscapString($_POST['altCityId']));
        $this->setAltstateid($this->getEscapString($_POST['altStateId']));
        $this->setAltcountryid($this->getEscapString($_POST['altCountryId']));
        $this->setAltpincode($this->getEscapString($_POST['altPostalCode']));
        
        $CustomerTable = "customer_master";
        $CustomerData = array('salutation'=>$this->getSalutation(), 'first_name'=>$this->getFirst_name(), 'last_name'=>$this->getLast_name(), 'company_name'=>$this->getCompany_name(), 'card_id'=>$this->getCard_id(), 'cust_typeid'=>$this->getCust_typeid(), 'allow_creditsale'=>$this->getAllow_creditsale(), 'account_id'=>$this->getAccount_id(), 'opening_point'=>$this->getOpening_point(), 'card_issuedate'=>$this->getCard_issuedate(), 'card_expiredate'=>$this->getCard_expiredate(), 'address1'=>$this->getAddress1(), 'address2'=>$this->getAddress2(), 'address3'=>$this->getAddress3(), 'cityid'=>$this->getCityid(), 'stateid'=>$this->getStateId(), 'countryid'=>$this->getCountryId(), 'pincode'=>$this->getPincode(), 'altaddress1'=>$this->getAltaddress1(), 'altaddress2'=>$this->getAltaddress2(), 'altaddress3'=>$this->getAltaddress3(), 'altcityid'=>$this->getAltcityid(), 'altstateid'=>$this->getAltstateid(),'altcountryid'=>$this->getAltcountryid(), 'altpincode'=>$this->getAltpincode(), 'mobile'=>$this->getMobile(), 'phone'=>$this->getPhone(), 'fax'=>$this->getFax(), 'email'=>$this->getEmail(), 'website'=>$this->getWebsite(), 'birthdate'=>$this->getBirthdate(),'annivarsary'=>$this->getAnnivarsary(), 'spouse_name'=>$this->getSpouse_name(), 'remark'=>$this->getRemark(), 'picture'=>$ProfilePicture, 'isactive'=>$this->IsActive, 'isfixed'=>$this->IsFixed,  'location_id'=>$this->getLocation_id(), 'nationality'=>$this->getNationality(), 'gender'=>$this->getGender(), 'team'=>$this->getTeam(),'password'=>$this->getPassword());
        $mobile = $_POST['Mobile'];
        $CustomerCondition = "mobile='$mobile'";
        $Exists = $this->SelectSingleRow($CustomerTable, $CustomerCondition, '', 0);
        if(count($Exists['mobile']) > 0){
            return 0;
        }else{
            $this->InsertRecords($CustomerTable, $CustomerData, 0);
            return 1;
        }
        
    }
    public function getCustomers(){
        
        $CustomerTable = "customer_master";
        $CustomerCondition = "";
        $result = $this->SelectTable($CustomerTable, $CustomerCondition,'',0);
        
        if($result){
            
            $this->setJsonEncode($result); // setting data into json object
            $request = $this->getJsonEncode(); // getting data into json object
            return $request;
            
        }else{
            return 0;
        }
    }
    public function deleteCustomer(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $request = $this->getJsonDecode();
        $CustomerTable = "customer_master";
        $CustomerCondition = "cust_id='$request->id'";
        $result = $this->DeleteRecords($CustomerTable, $CustomerCondition);
        
        if($result){
            return 1;
        }else{
            return 0;
        }
    }

}

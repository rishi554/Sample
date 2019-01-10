<?php
require __DIR__.'/../CustomerManagement/CustomerManagement.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserRegistration
 *
 * @author PHP Developers
 */
class UserRegistration extends CustomerManagement{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function addUser(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->UserFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setEmail($request->Email);  
        $this->setMobile($request->Mobile);
        $this->setFirst_name($request->firstname);
        $this->setLast_name($request->lastname);
        $this->setPassword($request->Password);
        
        $EmailId = $this->getEscapString($this->getEmail());
        $MobileNo = $this->getEscapString($this->getMobile());
        
        $UserTable = "customer_master";
        $UserData = array('first_name'=>$this->getEscapString($this->getFirst_name()),'last_name'=>$this->getEscapString($this->getLast_name()),'password'=>$this->getEscapString($this->getPassword()),'email'=>$EmailId,'mobile'=>$MobileNo, 'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $UserCondition = "email='$EmailId' OR mobile='$MobileNo'";
        $Exists = $this->SelectSingleRow($UserTable, $UserCondition, '', 0);
        if(count($Exists['cust_id']) > 0){
            return 0;
        }else{
            $this->InsertRecords($UserTable, $UserData, 0);
            return 1;
        } 
    }
    function LoginUser(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->LoginUserFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setFirst_name($request->Username);
        $this->setPassword($request->Password);
        
        $UserName = $this->getEscapString($this->getFirst_name());
        $Password = $this->getEscapString($this->getPassword());
        
        $condition = "email='$UserName' AND password='$Password' OR mobile='$UserName' AND password='$Password'";
        $result = $this->SelectSingleRow("customer_master", $condition, "", 0);
        
        if(count($result['cust_id']) > 0){
            $result['status'] = "OK";
            $result['code'] = 200;
            $result['message'] = "Success";
            $result['LoginSessionId'] = md5(rand());
            $_SESSION['user'] = $result;
        }else{
            $result['status'] = "NO";
            $result['code'] = 401;
            $result['message'] = "Failed";
        }
        
        $this->setJsonEncode($result);
        return $this->getJsonEncode();
    }
    function Logout() {
        
        $response['status'] = 'Success';
        $response['message'] = 'Logged out.';
        $response['code'] = 401;
        unset($_SESSION['user']);
        $this->setJsonEncode($response);
        return $this->getJsonEncode();
    }
    function IsLoggedin() {
        
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            $response = $_SESSION['user'];
        }else{
            $response['status'] = 'Failed';
            $response['message'] = 'Unautherised access.';
            $response['code'] = 401;
        }
        $this->setJsonEncode($response);
        return $this->getJsonEncode();
    }
}

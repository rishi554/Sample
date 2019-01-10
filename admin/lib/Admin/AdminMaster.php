<?php
session_start();
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminMaster
 *
 * @author PHP Developers
 */
class AdminMaster extends DBOperation{
    
    private $UserName;
    private $FullName;
    private $Email;
    private $Mobile;
    private $Password;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getUserName() {
        return $this->UserName;
    }

    function getFullName() {
        return $this->FullName;
    }

    function getEmail() {
        return $this->Email;
    }

    function getMobile() {
        return $this->Mobile;
    }

    function getPassword() {
        return $this->Password;
    }

    function setUserName($UserName) {
        $this->UserName = $UserName;
    }

    function setFullName($FullName) {
        $this->FullName = $FullName;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setMobile($Mobile) {
        $this->Mobile = $Mobile;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }
    
    function login() {
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->LoginFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $this->setEmail($this->getEscapString($request->Username));
        $this->setMobile($this->getEscapString($request->Username));
        $this->setPassword($this->getEscapString(md5($request->Password)));
        
        $Email = $this->getEmail();
        $Mobile = $this->getMobile();
        $Password = $this->getPassword();
        
        $result = $this->SelectSingleRow("AdminMasterDetails", "Email='$Email' AND Password='$Password' OR Mobile='$Mobile' AND Password='$Password'", "", 0);
        
        if(count($result['id']) > 0){

            $result['Status'] = 'Success';
            $result['Message'] = 'Autherised access.';
            $result['Code'] = 200;
            $result['SessionId'] = md5(rand(000,111));
            $_SESSION['admin'] = $result;
        }else{
            $result['Status'] = 'Failed';
            $result['Message'] = 'Unautherised access.';
            $result['Code'] = 401;
        }
        
        $this->setJsonEncode($result);
        return $this->getJsonEncode();
    }
    function Logout() {
        
        $response['Status'] = 'Success';
        $response['Message'] = 'Logged out.';
        $response['Code'] = 401;
        unset($_SESSION['admin']);
        $this->setJsonEncode($response);
        return $this->getJsonEncode();
    }

    function CheckLogin() {
        
        if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
            $response = $_SESSION['user'];
        }else{
            $response['Status'] = 'Failed';
            $response['Message'] = 'Unautherised access.';
            $response['Code'] = 401;
        }
        $this->setJsonEncode($response);
        return $this->getJsonEncode();
    }
}

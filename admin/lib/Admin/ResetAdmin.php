<?php
require __DIR__.'/../Admin/AdminMaster.php';
require __DIR__.'/../Email/Email.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResetAdmin
 *
 * @author PHP Developers
 */
class ResetAdmin extends AdminMaster{
    
    private $EmailObject;
    public function __construct() {
        parent::__construct();
        $this->EmailObject = new Email;
    }
    public function reset(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ResetFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $this->setEmail($this->getEscapString($request->Username));
        $Username = $this->getEmail();
        
        $result = $this->SelectSingleRow("AdminMasterDetails", "Email='$Username'", "", 0);
        
        if(count($result['id']) > 0){
            
            $otp = rand(0000,1111);
            $message = "<h3>OTP is ".$otp;
            
            if($this->EmailObject->Sent($Username, "Regarding OTP password", $message)){
                $result['Status'] = 'Success';
                $result['Message'] = 'Mail sent successfully';
                $result['Code'] = 200;
                $_SESSION['otp'] = $otp;
                $_SESSION['Email'] = $Username;
            }else{
                $result['Status'] = 'Failed';
                $result['Message'] = 'Something went wrong';
                $result['Code'] = 401;
            }
            
        }else{
            $result['Status'] = 'Failed';
            $result['Message'] = 'Invalid Email address';
            $result['Code'] = 401;
        }
        $this->setJsonEncode($result);
        return $this->getJsonEncode();
    }
    public function ChangePassword(){
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ResetFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $OTP = $request->OTP;
        
        if($OTP == $_SESSION['otp']){
            
            $Password = rand();
            $NewPassword = md5($Password);
            $Username = $_SESSION['Email'];
            $updata = array('Password'=>$NewPassword);
            $result = $this->UpdateRecords("AdminMasterDetails", "Email='$Username'", $updata);
            if(count($result) > 0){
                $message = "<h3>Your new password is " . $Password;
                $this->EmailObject->Sent($Username, "Regarding password has been changed.", $message);
                $result['Status'] = 'Success';
                $result['Message'] = 'Mail sent successfully';
                $result['Code'] = 200;
            }else{
                $result['Status'] = 'Failed';
                $result['Message'] = 'Something went wrong';
                $result['Code'] = 401;
            }
            
        }else{
            $result['Status'] = 'Failed';
            $result['Message'] = 'Invalid OTP';
            $result['Code'] = 401;
        }
        $this->setJsonEncode($result);
        return $this->getJsonEncode();
    }
    //put your code here
}

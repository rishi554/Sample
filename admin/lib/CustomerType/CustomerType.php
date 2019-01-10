<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerType
 *
 * @author PHP Developers
 */
class CustomerType extends DBOperation{
        
    public function __construct() {
        parent::__construct();
    }

    public function AddCustType(){
        
        $this->setPostdata(); // setting post request
        $postdata = $this->getPostdata(); // getting post request
        
        $this->setJsonDecode($postdata); // setting data into json object
        $request = $this->getJsonDecode(); // getting data into json object
        $Name = $request->Name;    
        $CustomerTypeTable = "customer_type_master";
        $CustomerTypeData = array('CusTypeName'=>$Name, 'IsActive'=>1, 'IsFixed'=>"None");
        $CustomerTypeCondition = "CusTypeName='$Name'";
        $Exists = $this->SelectSingleRow($CustomerTypeTable, $CustomerTypeCondition, '', 0);
        
        if(count($Exists['CusTypeName']) > 0){
            return false;
        }else{
            $this->InsertRecords($CustomerTypeTable, $CustomerTypeData, 0);
            return true;
        }
        
    }
    public function UpdateCustType(){
        
        $this->setPostdata();
        $request = $this->getPostdata();
        $id = $request->id;
        
        $CustomerTypeTable = "customer_type_master";
        $CustomerTypeCondition = "id = '$id'";
        $CustomerTypeData = array('CusTypeName'=>$request->CustTypeName);
        $result = $this->UpdateRecords($CustomerTypeTable, $CustomerTypeCondition, $CustomerTypeData, 0);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function RemoveCustType(){
        
        $this->setPostdata();
        $request = $this->getPostdata();
        $id = $request->id;
        
        $CustomerTypeTable = "customer_type_master";
        $CustomerTypeCondition = "id = '$id'";
        $result = $this->DeleteRecords($CustomerTypeTable, $CustomerTypeCondition);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function GetCustType(){
              
        $CustomerTypeTable = "customer_type_master";
        $CustomerTypeCondition = "";
        $result = $this->SelectTable($CustomerTypeTable, $CustomerTypeCondition,'',0);
        if($result){
            
            $this->setJsonEncode($result); // setting data into json object
            $request = $this->getJsonEncode(); // getting data into json object
            return $request;
            
        }else{
            return false;
        }
    }
}

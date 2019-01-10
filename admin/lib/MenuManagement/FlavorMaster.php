<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlavorMaster
 *
 * @author PHP Developers
 */
class FlavorMaster extends DBOperation{
    
     private $FlavorMasterName;
     
     public function __construct() {
         parent::__construct();
     }
     
     function getFlavorMasterName() {
         return $this->FlavorMasterName;
     }

     function setFlavorMasterName($FlavorMasterName) {
         $this->FlavorMasterName = $FlavorMasterName;
     }
     function getFlavors(){
        $this->setJsonEncode($this->SelectTable("FlavorMaster", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteFlavor(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FlavorFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("FlavorMaster", "FlavorMasterId='$id'");
    }
    
    function addFlavor(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FlavorFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setFlavorMasterName($request->FlavorName);  
        $FlavorName = $this->getEscapString($this->getFlavorMasterName());
        
        $FlavorTable = "FlavorMaster";
        $FlavorData = array('FlavorMasterName'=>$FlavorName,'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $FlavorCondition = "FlavorMasterName='$FlavorName'";
        $Exists = $this->SelectSingleRow($FlavorTable, $FlavorCondition, '', 0);
        if(count($Exists['FlavorMasterName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($FlavorTable, $FlavorData, 0);
            return 1;
        } 
    }
}

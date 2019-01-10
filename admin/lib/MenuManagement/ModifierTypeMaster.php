<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModifierTypeMaster
 *
 * @author PHP Developers
 */
class ModifierTypeMaster extends DBOperation{
    
    private $TypeName;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getTypeName() {
        return $this->TypeName;
    }

    function setTypeName($TypeName) {
        $this->TypeName = $TypeName;
    }
    function getMasterModifiersType(){
        $this->setJsonEncode($this->SelectTable("ModifierTypeMaster", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteMasterModifierType(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ModiferTypeFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("ModifierTypeMaster", "ModiferTypeId='$id'");
    }
    
    function addMasterModifierType(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ModiferTypeFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setTypeName($request->ModifierTypeName);  
        $TypeName = $this->getEscapString($this->getTypeName());
        
        $ModiferTypeTable = "ModifierTypeMaster";
        $ModiferTypeData = array('TypeName'=>$TypeName,'IsActive'=>$this->getEscapString($this->getIsActive()),'IsFixed'=>$this->getEscapString($this->getIsFixed()),'TeamId'=> $this->getEscapString($this->getTeamId()));
        
        $ModiferTypeCondition = "TypeName='$TypeName'";
        $Exists = $this->SelectSingleRow($ModiferTypeTable, $ModiferTypeCondition, '', 0);
        if(count($Exists['TypeName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($ModiferTypeTable, $ModiferTypeData, 0);
            return 1;
        } 
    }
}

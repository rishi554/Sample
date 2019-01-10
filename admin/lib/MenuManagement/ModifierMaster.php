<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModifierMaster
 *
 * @author PHP Developers
 */
class ModifierMaster extends DBOperation{
    
    private $ModifierName;
    private $GroupOn;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getModifierName() {
        return $this->ModifierName;
    }

    function getGroupOn() {
        return $this->GroupOn;
    }

    function setModifierName($ModifierName) {
        $this->ModifierName = $ModifierName;
    }

    function setGroupOn($GroupOn) {
        $this->GroupOn = $GroupOn;
    }
    
    function getMasterModifiers(){
        $this->setJsonEncode($this->SelectTable("ModifierMaster", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteMasterModifier(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ModifierFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("ModifierMaster", "ModifierId='$id'");
    }
    
    function addMasterModifier(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ModifierFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setModifierName($request->ModifierName);
        $this->setGroupOn($request->GroupingId);  
        
        $ModifierName = $this->getEscapString($this->getModifierName());
        $GroupingId = $this->getEscapString($this->getGroupOn());
        
        $ModifierTable = "ModifierMaster";
        $ModifierData = array('ModifierName'=>$ModifierName,'GroupOn'=>$GroupingId,'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $ModifierCondition = "ModifierName='$ModifierName' OR ModifierName='$ModifierName' AND GroupOn='$GroupingId'";
        $Exists = $this->SelectSingleRow($ModifierTable, $ModifierCondition, '', 0);
        if(count($Exists['ModifierName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($ModifierTable, $ModifierData, 0);
            return 1;
        } 
    }
}

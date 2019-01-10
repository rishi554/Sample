<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemTypeMaster
 *
 * @author PHP Developers
 */
class ItemTypeMaster extends DBOperation{
    
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
    function getItemTypes(){
        $this->setJsonEncode($this->SelectTable("productitem_type_master", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteItemType(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ItemTypeFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("productitem_type_master", "TypeId='$id'");
    }
    
    public function addItemType(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ItemTypeFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setTypeName($request->ItemTypeName);        
        $ItemTypeName = $this->getEscapString($this->getListTypeName());
        
        $ItemTypeTable = "principle_company_master";
        $ItemTypeData = array('TypeName'=>$ItemTypeName,'IsActive'=>$this->getEscapString($this->getIsActive()));
        
        $ItemTypeCondition = "TypeName='$ItemTypeName'";
        $Exists = $this->SelectSingleRow($ItemTypeTable, $ItemTypeCondition, '', 0);
        if(count($Exists['TypeName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($ItemTypeTable, $ItemTypeData, 0);
            return 1;
        }   
    }
}

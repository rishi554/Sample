<?php
require __DIR__.'/../ProductManagement/ProductUnit.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductItemType
 *
 * @author PHP Developers
 */
class ProductItemType extends ProductUnit{
    
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
    public function existItemType($name){
        
        $Exists = $this->SelectSingleRow("productitem_type_master", "TypeName = '$name'", '', 0);
        if(count($Exists['TypeName']) > 0){
            return true;
        }else{
            return false;
        }
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
        $this->setIsFixed(1);
        
        $this->IsActive = $this->getEscapString($this->getIsActive());
        $this->IsFixed = $this->getEscapString($this->getIsFixed());
        
    }
}

<?php

require __DIR__.'/../ProductManagement/ProductDepartment.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductGroup
 *
 * @author PHP Developers
 */
class ProductGroup extends ProductDepartment{
    
    private $PGroupMName;
    private $DepartmentId;
    
    public function __construct() {
        parent::__construct();
    }
    function getPGroupMName() {
        return $this->PGroupMName;
    }

    function getDepartmentId() {
        return $this->DepartmentId;
    }

    function setPGroupMName($PGroupMName) {
        $this->PGroupMName = $PGroupMName;
    }

    function setDepartmentId($DepartmentId) {
        $this->DepartmentId = $DepartmentId;
    }
    function getGroups(){
        $this->setJsonEncode($this->SelectTable("product_group_master", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteGroup(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->GroupFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("product_group_master", "PGroupMId='$id'");
        
    }
    
    public function addGroup(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->GroupFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        
        $this->IsActive = $this->getEscapString($this->getIsActive());
        $this->IsFixed = $this->getEscapString($this->getIsFixed());
        $this->setDepartmentId($request->DepartmentId);
        
        $GroupName = $this->getPGroupMName($this->getEscapString($this->setPGroupMName($request->GroupName)));
        
        $GroupTable = "product_group_master";
        $GroupData = array('PGroupMName'=>$GroupName,'DepartmentId'=>$this->getEscapString($this->getDepartmentId()),'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $Exists = $this->SelectSingleRow($GroupTable, "PGroupMName = '$GroupName'", '', 0);
        if(count($Exists['PGroupMName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($GroupTable, $GroupData, 0);
            return 1;
        }  
    }
}

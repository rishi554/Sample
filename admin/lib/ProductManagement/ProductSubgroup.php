<?php
require __DIR__.'/../ProductManagement/ProductGroup.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductSubgroup
 *
 * @author PHP Developers
 */
class ProductSubgroup extends ProductGroup{
    
    private $ProductSubGroupName;
    private $ParentId;
    private $PGroupId;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getProductSubGroupName() {
        return $this->ProductSubGroupName;
    }

    function getParentId() {
        return $this->ParentId;
    }

    function getPGroupId() {
        return $this->PGroupId;
    }

    function setProductSubGroupName($ProductSubGroupName) {
        $this->ProductSubGroupName = $ProductSubGroupName;
    }

    function setParentId($ParentId) {
        $this->ParentId = $ParentId;
    }

    function setPGroupId($PGroupId) {
        $this->PGroupId = $PGroupId;
    } 
    function getSubgroups(){
        $this->setJsonEncode($this->SelectTable("product_subgroup_master", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteSubgroup(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->SubgroupFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("product_subgroup_master", "PSubGroupId='$id'");
        
    }
    
    public function addSubgroup(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->SubgroupFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        
        $this->setParentId($request->ParentGroupId);
        
        $SubgroupName = $this->getProductSubGroupName($this->getEscapString($this->setProductSubGroupName($request->SubgroupName)));
        $PGroupId = $this->getPGroupId($this->getEscapString($this->setPGroupId($request->GroupId)));
        
        $GroupTable = "product_subgroup_master";
        $GroupData = array('ProductSubGroupName'=>$SubgroupName,'ParentId'=>intval($this->getEscapString($this->getParentId())),'PGroupId'=>$PGroupId,'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $Exists = $this->SelectSingleRow($GroupTable, "ProductSubGroupName = '$SubgroupName' AND PGroupId='$PGroupId '", '', 0);
        if(count($Exists['ProductSubGroupName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($GroupTable, $GroupData, 0);
            return 1;
        }  
        
    }
}

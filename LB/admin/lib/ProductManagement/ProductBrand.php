<?php
require __DIR__.'/../ProductManagement/PrincipleCompany.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductBrand
 *
 * @author PHP Developers
 */

class ProductBrand extends PrincipleCompany{
    
    private $BrandName;
    private $PrincipalCompanyId;
    private $AreaAlloted;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getBrandName() {
        return $this->BrandName;
    }

    function getPrincipalCompanyId() {
        return $this->PrincipalCompanyId;
    }

    function getAreaAlloted() {
        return $this->AreaAlloted;
    }

    function setBrandName($BrandName) {
        $this->BrandName = $BrandName;
    }

    function setPrincipalCompanyId($PrincipalCompanyId) {
        $this->PrincipalCompanyId = $PrincipalCompanyId;
    }

    function setAreaAlloted($AreaAlloted) {
        $this->AreaAlloted = $AreaAlloted;
    }
    function getBrands(){
        $this->setJsonEncode($this->SelectTable("brand_master", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteBrand(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->BrandFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("brand_master", "BrandId='$id'");
        
    }
    
    public function addBrand(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->BrandFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);    
        $this->setBrandName($request->BrandName);
        $this->setPrincipalCompanyId($request->PCompanyId);
        $this->setAreaAlloted($request->AreaAlloted);
        
        $BrandName = $this->getEscapString($this->getBrandName());
        $PrincipleCompanyId = $this->getEscapString($this->getPrincipalCompanyId());
        
        $BrandTable = "brand_master";
        $BrandData = array('BrandName'=>$BrandName, 'PrincipalCompanyId'=>$PrincipleCompanyId, 'AreaAlloted'=>$this->getEscapString($this->getAreaAlloted()),'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $Exists = $this->SelectSingleRow($BrandTable, "BrandName = '$BrandName'", '', 0);
        if(count($Exists['BrandName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($BrandTable, $BrandData, 0);
            return 1;
        }  
    }
}

<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrincipleCompany
 *
 * @author PHP Developers
 */
class PrincipleCompany extends DBOperation{
    
    private $PCompanyName;
    
    public function __construct() {
        parent::__construct();
    }
    function getPCompanyName() {
        return $this->PCompanyName;
    }

    function setPCompanyName($PCompanyName) {
        $this->PCompanyName = $PCompanyName;
    }
    function getCompanies(){
        $this->setJsonEncode($this->SelectTable("principle_company_master", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteCompany(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->CompanyFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("principle_company_master", "PCompanyId='$id'");
        
    }
    
    public function addCompany(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->CompanyFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setPCompanyName($request->CompanyName);        
        $CompnayName = $this->getEscapString($this->getPCompanyName());
        
        $CompanyTable = "principle_company_master";
        $CompanyData = array('PCompanyName'=>$CompnayName,'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $CompanyCondition = "PCompanyName='$CompnayName'";
        $Exists = $this->SelectSingleRow($CompanyTable, $CompanyCondition, '', 0);
        if(count($Exists['PCompanyName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($CompanyTable, $CompanyData, 0);
            return 1;
        }   
    }
}

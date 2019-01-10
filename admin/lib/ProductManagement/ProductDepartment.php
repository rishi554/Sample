<?php
require __DIR__.'/../ProductManagement/ProductBrand.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductDepartment
 *
 * @author PHP Developers
 */
class ProductDepartment extends ProductBrand{
    
    private $DeptName;
    
    public function __construct() {
        parent::__construct();
    }
    function getDeptName() {
        return $this->DeptName;
    }

    function setDeptName($DeptName) {
        $this->DeptName = $DeptName;
    }
    function getDepartments(){
        $this->setJsonEncode($this->SelectTable("department_master", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteDepartment(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->DepartmentFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("department_master", "DeptMasterId='$id'");
        
    }
    
    public function addDepartment(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->DepartmentFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        
        $this->IsActive = $this->getEscapString($this->getIsActive());
        $this->IsFixed = $this->getEscapString($this->getIsFixed());
        $this->setAreaAlloted($request->AreaAlloted);
        
        $DepartmentName = $this->getDeptName($this->getEscapString($this->setDeptName($request->DepartmentName)));
        
        $DepartmentTable = "department_master";
        $DepartmentData = array('DeptName'=>$DepartmentName, 'AreaAlloted'=>$this->getEscapString($this->getAreaAlloted()),'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $Exists = $this->SelectSingleRow($DepartmentTable, "DeptName = '$DepartmentName'", '', 0);
        if(count($Exists['DeptName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($DepartmentTable, $DepartmentData, 0);
            return 1;
        }  
    }
}

<?php
require __DIR__.'/../ProductManagement/ProductTax.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductUnit
 *
 * @author PHP Developers
 */
class ProductUnit extends ProductTax{
    
    private $UnitName;
    private $FormalName;
    private $DigitAfterDecimal;
    
    public function __construct() {
        parent::__construct();
    }
    function getUnitName() {
        return $this->UnitName;
    }

    function getFormalName() {
        return $this->FormalName;
    }

    function getDigitAfterDecimal() {
        return $this->DigitAfterDecimal;
    }

    function setUnitName($UnitName) {
        $this->UnitName = $UnitName;
    }

    function setFormalName($FormalName) {
        $this->FormalName = $FormalName;
    }

    function setDigitAfterDecimal($DigitAfterDecimal) {
        $this->DigitAfterDecimal = $DigitAfterDecimal;
    }
    function getUnits(){
        $this->setJsonEncode($this->SelectTable("unit_master", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteUnit(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->UnitFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("unit_master", "UnitId='$id'");
        
    }
   
    public function addUnit(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->UnitFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);     
        $this->setFormalName($request->FormalName);
        $this->setDigitAfterDecimal($request->DigitAfterDecimal);
        $UnitName = $this->getUnitName($this->getEscapString($this->setUnitName($request->UnitName)));
        
        $UnitTable = "unit_master";
        $UnitData = array('UnitName'=>$UnitName,'FormalName'=>$this->getEscapString($this->getFormalName()),'DigitAfterDecimal'=>$this->getEscapString($this->getDigitAfterDecimal()),'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $Exists = $this->SelectSingleRow($UnitTable, "UnitName = '$UnitName'", '', 0);
        if(count($Exists['UnitName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($UnitTable, $UnitData, 0);
            return 1;
        } 
    }
}

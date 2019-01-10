<?php
require __DIR__.'/../ProductManagement/MatrixListMaster.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MatrixMaster
 *
 * @author PHP Developers
 */
class MatrixMaster extends MatrixListMaster{
    
    private $MatrixName;
    private $Field1Name;
    private $Field1ListId;
    private $Field2Name;
    private $Field2ListId;
    private $Field3Name;
    private $Field3ListId;
    
    public function __construct() {
        parent::__construct();
    }
    function getMatrixName() {
        return $this->MatrixName;
    }

    function getField1Name() {
        return $this->Field1Name;
    }

    function getField1ListId() {
        return $this->Field1ListId;
    }

    function getField2Name() {
        return $this->Field2Name;
    }

    function getField2ListId() {
        return $this->Field2ListId;
    }

    function getField3Name() {
        return $this->Field3Name;
    }

    function getField3ListId() {
        return $this->Field3ListId;
    }

    function setMatrixName($MatrixName) {
        $this->MatrixName = $MatrixName;
    }

    function setField1Name($Field1Name) {
        $this->Field1Name = $Field1Name;
    }

    function setField1ListId($Field1ListId) {
        $this->Field1ListId = $Field1ListId;
    }

    function setField2Name($Field2Name) {
        $this->Field2Name = $Field2Name;
    }

    function setField2ListId($Field2ListId) {
        $this->Field2ListId = $Field2ListId;
    }

    function setField3Name($Field3Name) {
        $this->Field3Name = $Field3Name;
    }

    function setField3ListId($Field3ListId) {
        $this->Field3ListId = $Field3ListId;
    }
    function getMatrixs(){
        $this->setJsonEncode($this->SelectTable("matrix_master", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteMatrix(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->MatrixFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("matrix_master", "MatrixId='$id'");
        
    }
    
    public function addMatrix(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->MatrixFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setMatrixName($request->MatrixName);
        $this->setField1ListId($request->List1Id);
        $this->setField2ListId($request->List2Id);
        $this->setField3ListId($request->List3Id);
        $this->setField1Name($request->List1Name);
        $this->setField2Name($request->List2Name);
        $this->setField3Name($request->List3Name);
        
        $MatrixName = $this->getEscapString($this->getMatrixName());
        
        $MatrixTable = "matrix_master";
        $MatrixData = array('MatrixName'=>$MatrixName,'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())),'Field1Name'=>$this->getEscapString($this->getField1Name()), 'Field1ListId'=>$this->getEscapString($this->getField1ListId()), 'Field2Name'=>$this->getEscapString($this->getField2Name()), 'Field2ListId'=>$this->getEscapString($this->getField2ListId()), 'Field3Name'=>$this->getEscapString($this->getField3Name()), 'Field3ListId'=>$this->getEscapString($this->getField3ListId()));
        
        $MatrixCondition = "MatrixName='$MatrixName'";
        $Exists = $this->SelectSingleRow($MatrixTable, $MatrixCondition, '', 0);
        if(count($Exists['MatrixName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($MatrixTable, $MatrixData, 0);
            return 1;
        }   
    }
}

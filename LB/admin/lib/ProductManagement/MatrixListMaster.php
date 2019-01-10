<?php
require __DIR__.'/../ProductManagement/ListMaster.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MatrixListMaster
 *
 * @author PHP Developers
 */
class MatrixListMaster extends ListMaster{
    
    private $DataName;
    private $MatListTypeId;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getDataName() {
        return $this->DataName;
    }

    function getMatListTypeId() {
        return $this->MatListTypeId;
    }

    function setDataName($DataName) {
        $this->DataName = $DataName;
    }

    function setMatListTypeId($MatListTypeId) {
        $this->MatListTypeId = $MatListTypeId;
    }
    
    function getMatrixLists(){
        $this->setJsonEncode($this->SelectTable("matrix_list_master", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteMatrixList(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->MatrixListFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("matrix_list_master", "MatrixListMasterId='$id'");
        
    }
    
    public function addMatrixList(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->MatrixListFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setMatListTypeId($request->ListId);
        $this->setDataName($request->MatrixListName);        
        $MatrixListName = $this->getEscapString($this->getDataName());
        
        $MatrixListTable = "matrix_list_master";
        $MatrixListData = array('DataName'=>$MatrixListName,'MatListTypeId'=>intval($this->getEscapString($this->getMatListTypeId())),'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $MatrixListCondition = "DataName='$MatrixListName'";
        $Exists = $this->SelectSingleRow($MatrixListTable, $MatrixListCondition, '', 0);
        if(count($Exists['DataName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($MatrixListTable, $MatrixListData, 0);
            return 1;
        }   
    }
}

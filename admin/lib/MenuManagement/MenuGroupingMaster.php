<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuManagement
 *
 * @author PHP Developers
 */
class MenuGroupingMaster extends DBOperation{
    
    private $GroupingName;
    
    public function __construct() {
        parent::__construct();
    }
    function getGroupingName() {
        return $this->GroupingName;
    }

    function setGroupingName($GroupingName) {
        $this->GroupingName = $GroupingName;
    }

    function getGroupings(){
        $this->setJsonEncode($this->SelectTable("MenuGroupingMaster", "", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteGrouping(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->GroupingMenuFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("MenuGroupingMaster", "GroupingId='$id'");
    }
    
    public function addGrouping(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->GroupingFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setGroupingName($request->GroupingName);
        $GroupingName = $this->getEscapString($this->getGroupingName());
        
        $GroupingTable = "MenuGroupingMaster";
        $GroupingData = array('GroupingName'=>$GroupingName,'IsActive'=>$this->getEscapString($this->getIsActive()),'IsFixed'=>$this->getEscapString($this->getIsFixed()));
        
        $GroupingCondition = "GroupingName='$GroupingName'";
        $Exists = $this->SelectSingleRow($GroupingTable, $GroupingCondition, '', 0);
        if(count($Exists['GroupingName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($GroupingTable, $GroupingData, 0);
            return 1;
        }   
    }
}

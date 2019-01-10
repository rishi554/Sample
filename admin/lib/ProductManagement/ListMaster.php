<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListMaster
 *
 * @author PHP Developers
 */
class ListMaster extends DBOperation{
    
    private $ListTypeName;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getListTypeName() {
        return $this->ListTypeName;
    }

    function setListTypeName($ListTypeName) {
        $this->ListTypeName = $ListTypeName;
    }
    function getLists(){
        $this->setJsonEncode($this->SelectTable("list_master", "IsFixed=0", "",0));
        return $this->getJsonEncode();
    }
    
    function deleteList(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ListFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("list_master", "ListTypeId='$id'");
        
    }
    
    public function addList(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ListFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(0);
        $this->setListTypeName($request->ListName);        
        $ListName = $this->getEscapString($this->getListTypeName());
        
        $ListTable = "list_master";
        $ListData = array('ListTypeName'=>$ListName,'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $ListCondition = "ListTypeName='$ListName'";
        $Exists = $this->SelectSingleRow($ListTable, $ListCondition, '', 0);
        if(count($Exists['ListTypeName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($ListTable, $ListData, 0);
            return 1;
        }   
    }
}

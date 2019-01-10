<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroupType
 *
 * @author PHP Developers
 */
class GroupType extends DBOperation{
     
    private $GroupTypeName; 
    private $data = array(); 

    public function __construct() {
        parent::__construct();
    }
    
    public function setGroupType($postdata){
        
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        if($this->ExistGroupType($request->GroupTypeName)){
            return false;
        }else{
            
            $this->GroupTypeName = $request->GroupTypeName;            
            return true;
        }          
    }
    
    public function getGroupType(){
        $this->data = array('group_typeName'=>$this->GroupTypeName);
        return $this->data;
    }
    
    public function AddGroupType(){

        $this->setPostdata();
        $postdata = $this->getPostdata();
        $group = $this->setGroupType($postdata);
        
        if($group){
            $this->data = $this->getGroupType();
            $this->InsertRecords("group_typemaster", $this->data, 0);
            return true;
        }else{
            return false;
        }
    }
    public function ExistGroupType($name){
        
        $Exists = $this->SelectSingleRow("group_typemaster", "group_typeName = '$name'", '', 0);
        if(count($Exists['group_typeName']) > 0){
            return true;
        }else{
            return false;
        }
    }
    public function getGroupTypes(){
        
        $result = $this->SelectTable("group_typemaster", "", "", 0);
        $this->setJsonEncode($result);
        return $this->getJsonEncode();
        
    }
}

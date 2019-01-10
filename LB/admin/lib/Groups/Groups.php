<?php
require __DIR__.'/../Config/DBOperation.php';

/**
 * Description of Groups
 *
 * @author PHP Developers
 */
class Groups extends DBOperation{
    
    private $GroupName; 
    private $ParentGroupId; 
    private $GroupTypeId; 
    private $data = array(); 

    public function __construct() {
        parent::__construct();
    }
    
    public function setGroup($postdata){
        
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        if($this->ExistGroup($request->GroupName)){
            
            return false;
            
        }else{
            
            $this->GroupName = $request->GroupName;
            $this->ParentGroupId = $request->GroupId;
            $this->GroupTypeId = $request->GroupType;
            $this->IsActive = 1;
            $this->IsFixed = 1;
            
            return true;
        }          
    }
    public function getGroup(){
        $this->data = array('GroupName'=>$this->GroupName,'ParentGroupId'=>$this->ParentGroupId,'GroupTypeId'=>$this->GroupTypeId,'IsActive'=>$this->IsActive,'IsFixed'=>$this->IsFixed);
        return $this->data;
    }
    public function AddGroup(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $group = $this->setGroup($postdata);
        
        if($group){
            $this->data = $this->getGroup();
            $this->InsertRecords("group_master", $this->data, 0);
            return true;
        }else{
            return false;
        }
    }
    public function ExistGroup($name){
        
        $Exists = $this->SelectSingleRow("group_master", "GroupName = '$name'", '', 0);
        if(count($Exists['GroupName']) > 0){
            return true;
        }else{
            return false;
        }
    }
    public function getGroups(){
        
        $result = $this->SelectTable("group_master", "", "", 0);
        $this->setJsonEncode($result);
        return $this->getJsonEncode();
        
    }
}

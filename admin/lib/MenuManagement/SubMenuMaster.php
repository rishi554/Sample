<?php
require __DIR__.'/../ProductManagement/MatrixListMaster.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubMenuMaster
 *
 * @author PHP Developers
 */
class SubMenuMaster extends MatrixListMaster{
    
    private $Submenuname;
    private $SubmenuId;
    private $id;
    
    public function __construct() {
        parent::__construct();
        $this->SubmenuId = $this->SelectSingleRow("list_master", "ListTypeName='Sub Menu' LIMIT 1", '', 0);
        $this->id = $this->SubmenuId['ListTypeId'];
    }
    function getSubmenuname() {
        return $this->Submenuname;
    }

    function setSubmenuname($Submenuname) {
        $this->Submenuname = $Submenuname;
    }
    function getSubmenus(){
        $this->setJsonEncode($this->SelectTable("matrix_list_master", "MatListTypeId='$this->id'", "",0));
        return $this->getJsonEncode();
    }
    function deleteSubmenu(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->SubMenuFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("matrix_list_master", "MatrixListMasterId='$id'");
    }
    
    function addSubmenu(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->SubMenuFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setSubmenuname($request->SubMenuName);        
        $SubMenuName = $this->getEscapString($this->getSubmenuname());
        
        $SubMenuTable = "matrix_list_master";
        $SubMenuData = array('DataName'=>$SubMenuName,'MatListTypeId'=>intval($this->id),'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $SubMenuCondition = "DataName='$SubMenuName'";
        $Exists = $this->SelectSingleRow($SubMenuTable, $SubMenuCondition, '', 0);
        if(count($Exists['DataName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($SubMenuTable, $SubMenuData, 0);
            return 1;
        } 
    }
}

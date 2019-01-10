<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuMasterChild
 *
 * @author PHP Developers
 */
class MenuMasterChild extends DBOperation{
    
    private $MenuId;
    private $ProductId;
    private $Rate;
    private $TaxAmount;
    private $ModifierId;
    private $AskPrice;
    private $MaxQty;
    private $TaxId;
    private $WarehouseId;
    private $SubGroupId;
    private $DisplayName;
    private $PreparationTime;
    private $ItemType;
    private $AskQty;
    private $CheckStock;
    private $ForcedQuestionId;
    private $SubMenu;
    private $FlavorsId;
    private $IsVeg;
    private $IsMultiLayered;
    private $LayerCount;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getMenuId() {
        return $this->MenuId;
    }

    function getProductId() {
        return $this->ProductId;
    }

    function getRate() {
        return $this->Rate;
    }

    function getModifierId() {
        return $this->ModifierId;
    }

    function getAskPrice() {
        return $this->AskPrice;
    }

    function getMaxQty() {
        return $this->MaxQty;
    }

    function getTaxId() {
        return $this->TaxId;
    }

    function getWarehouseId() {
        return $this->WarehouseId;
    }

    function getSubGroupId() {
        return $this->SubGroupId;
    }

    function getDisplayName() {
        return $this->DisplayName;
    }

    function getPreparationTime() {
        return $this->PreparationTime;
    }

    function getItemType() {
        return $this->ItemType;
    }

    function getAskQty() {
        return $this->AskQty;
    }

    function getCheckStock() {
        return $this->CheckStock;
    }

    function getForcedQuestionId() {
        return $this->ForcedQuestionId;
    }

    function getSubMenu() {
        return $this->SubMenu;
    }

    function getIsVeg() {
        return $this->IsVeg;
    }

    function getIsMultiLayered() {
        return $this->IsMultiLayered;
    }

    function getLayerCount() {
        return $this->LayerCount;
    }

    function setMenuId($MenuId) {
        $this->MenuId = $MenuId;
    }

    function setProductId($ProductId) {
        $this->ProductId = $ProductId;
    }

    function setRate($Rate) {
        $this->Rate = $Rate;
    }

    function setModifierId($ModifierId) {
        $this->ModifierId = $ModifierId;
    }

    function setAskPrice($AskPrice) {
        $this->AskPrice = $AskPrice;
    }

    function setMaxQty($MaxQty) {
        $this->MaxQty = $MaxQty;
    }

    function setTaxId($TaxId) {
        $this->TaxId = $TaxId;
    }

    function setWarehouseId($WarehouseId) {
        $this->WarehouseId = $WarehouseId;
    }

    function setSubGroupId($SubGroupId) {
        $this->SubGroupId = $SubGroupId;
    }

    function setDisplayName($DisplayName) {
        $this->DisplayName = $DisplayName;
    }

    function setPreparationTime($PreparationTime) {
        $this->PreparationTime = $PreparationTime;
    }

    function setItemType($ItemType) {
        $this->ItemType = $ItemType;
    }

    function setAskQty($AskQty) {
        $this->AskQty = $AskQty;
    }

    function setCheckStock($CheckStock) {
        $this->CheckStock = $CheckStock;
    }

    function setForcedQuestionId($ForcedQuestionId) {
        $this->ForcedQuestionId = $ForcedQuestionId;
    }

    function setSubMenu($SubMenu) {
        $this->SubMenu = $SubMenu;
    }

    function setIsVeg($IsVeg) {
        $this->IsVeg = $IsVeg;
    }

    function setIsMultiLayered($IsMultiLayered) {
        $this->IsMultiLayered = $IsMultiLayered;
    }

    function setLayerCount($LayerCount) {
        $this->LayerCount = $LayerCount;
    }
    function getFlavorsId() {
        return $this->FlavorsId;
    }

    function setFlavorsId($FlavorsId) {
        $this->FlavorsId = $FlavorsId;
    }    
    function getMenuMasterChilds(){
        $this->setJsonEncode($this->SelectTable("MenuChild", "", "",0));
        return $this->getJsonEncode();
    }
    function getTaxAmount() {
        return $this->TaxAmount;
    }

    function setTaxAmount($TaxAmount) {
        $this->TaxAmount = $TaxAmount;
    }
    
    function deleteMenuMasterChild(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->MenuMasterChildFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("MenuChild", "GroupingId='$id'");
    }
    
    public function addMenuMasterChild(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->MenuMasterChildFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setMenuId($request->MenuId);
        $this->setProductId($request->ProductId);
        $this->setRate($request->Rate);
        $this->setModifierId($request->ModifierId);
        $this->setAskPrice($request->AskPrice);
        $this->setMaxQty($request->MaxQty);
        $this->setTaxId($request->TaxId);
        $this->setWarehouseId($request->WarehouseId);
        $this->setSubMenuId($request->SubmenuId);
        $this->setDisplayName($request->DisplayName);
        $this->setPreparationTime($request->PreparationTime);
        $this->setItemType($request->ItemType);
        $this->setAskQty($request->AskQty);
        $this->setCheckStock($request->CheckStock);
        $this->setForcedQuestionId($request->ForcedQuestionId);
        $this->setSubMenu($request->Submenu);
        $this->setIsVeg($request->IsVeg);
        $this->setIsMultiLayered($request->IsMultiLayered);
        $this->setLayerCount($request->LayerCount);
        
        $MenuId = $this->getEscapString($this->getMenuId());
        $ProductId = $this->getEscapString($this->getProductId());
        
        $MenuMasterChildTable = "MenuChild";
        $GroupingData = array('MenuId'=>$MenuId,'ProductId'=>$ProductId,'Rate'=>$this->getEscapString($this->getRate()),'ModifierId'=>$this->getEscapString($this->getModifierId()),'AskPrice'=>$this->getEscapString($this->getAskPrice()),'MaxQty'=>$this->getEscapString($this->getMaxQty()),'TaxId'=>$this->getEscapString($this->getTaxId()),'WarehouseId'=>$this->getEscapString($this->getWarehouseId()),'SubMenuId'=>$this->getEscapString($this->getSubMenuId()),'DisplayName'=>$this->getEscapString($this->getDisplayName()),'PreparationTime'=>$this->getEscapString($this->getPreparationTime()),'ItemType'=>$this->getEscapString($this->getItemType()),'AskQty'=>$this->getEscapString($this->getAskQty()),'CheckStock'=>$this->getEscapString($this->getCheckStock()),'ForcedQuestionId'=>$this->getEscapString($this->getForcedQuestionId()),'SubMenu'=>$this->getEscapString($this->getSubMenu()),'IsVeg'=>$this->getEscapString($this->getIsVeg()),'IsMultiLayered'=>$this->getEscapString($this->getIsMultiLayered()),'LayerCount'=>$this->getEscapString($this->getLayerCount()));
        
        $MenuMasterChildCondition = "ProductId='$ProductId' AND MenuId='$MenuId'";
        $Exists = $this->SelectSingleRow($MenuMasterChildTable, $MenuMasterChildCondition, '', 0);
        if(count($Exists['SrNo']) > 0){
            return 0;
        }else{
            $this->InsertRecords($MenuMasterChildTable, $GroupingData, 0);
            return 1;
        }   
    }
}

<?php
require __DIR__ . '/../MenuManagement/MenuMasterChild.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuMaster
 *
 * @author PHP Developers
 */
class MenuMaster extends MenuMasterChild {

    private $MenuName;
    private $GroupOn;
    private $TeamId;
    private $LocationId;

    public function __construct() {
        parent::__construct();
    }

    function getMenuName() {
        return $this->MenuName;
    }

    function getGroupOn() {
        return $this->GroupOn;
    }

    function getTeamId() {
        return $this->TeamId;
    }

    function setMenuName($MenuName) {
        $this->MenuName = $MenuName;
    }

    function setGroupOn($GroupOn) {
        $this->GroupOn = $GroupOn;
    }

    function setTeamId($TeamId) {
        $this->TeamId = $TeamId;
    }
    function getLocationId() {
        return $this->LocationId;
    }

    function setLocationId($LocationId) {
        $this->LocationId = $LocationId;
    }

    function getMenuMasters() {
        $result = $this->SelectSingleRow("MenuMaster", "", '', 0);
        $this->setJsonEncode($result);
        return $this->getJsonEncode();
    }

    function deleteMenuMaster() {

        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->MenuMasterFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("MenuMaster", "MenuId='$id'");
    }

    public function addMenuMaster() {

        $this->setPostdata();
        $postdata = $this->getPostdata();

        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();

        $SubMenuIds = $postVariable->SubMenuId;
        $QuestionIds = $postVariable->QuestionId;
        $FlavorIds = $postVariable->FlavorId;
        $ModifierIds = $postVariable->ModifierId;
        $ProductData = $postVariable->ProductData;
        $Rate = $postVariable->Rate;
        $TaxAmount = $postVariable->TaxAmount;
        $IsMultiLayered = $postVariable->IsMultiLayered;
        $LayerCount = $postVariable->LayerCount;
        
        $this->setJsonEncode($postVariable->MenuFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setMenuName($request->MenuName);
        $this->setLocationId($request->LocationId);
        $this->setGroupOn($request->GroupingOnId);
        $this->setTeamId(implode(',', $request->MenuTeamId));
        $MenuName = $this->getEscapString($this->getMenuName());
        $MenuTable = "MenuMaster";
        $MenuData = array('MenuName'=> $MenuName, 'GroupOn'=>$this->getEscapString($this->getGroupOn()), 'IsActive' => intval($this->getEscapString($this->getIsActive())), 'IsFixed' => intval($this->getEscapString($this->getIsFixed())), 'TeamId' => $this->getEscapString($this->getTeamId()));
        $MenuCondition = "MenuName='$MenuName'";
        $Exists = $this->SelectSingleRow($MenuTable, $MenuCondition, '', 0);
        if (count($Exists['MenuName']) > 0) {
            $id = $Exists['MenuId'];
            $lid = $this->getLocationId();
            $MenuLocationData = array('MenuId'=>$id,'LocationId'=>$lid);
            $LocationExists = $this->SelectSingleRow("MenuLocation", "MenuId='$id' AND LocationId='$lid'", '', 0);
            if(count($LocationExists['SrNo']) <= 0){
                $this->InsertRecords("MenuLocation", $MenuLocationData, 0);
            }
            $this->UpdateRecords($MenuTable, "MenuId='$id'", $MenuData, 0);
            for ($i = 0; $i <= count($ProductData) - 1; $i++) {

                $this->setJsonEncode($ProductData[$i]);
                $this->setJsonDecode($this->getJsonEncode());
                $Product = $this->getJsonDecode();

                $this->setMenuId($id);
                $this->setProductId($Product->productId);
                $ProductId = $this->getEscapString($this->getProductId());
                $this->setRate(json_decode(json_encode($Rate[$i])));
                $this->setTaxAmount(json_decode(json_encode($TaxAmount[$i])));
                $this->setModifierId(json_decode(json_encode($ModifierIds[$i])));
                $this->setAskPrice($Product->AskRate);
                $this->setMaxQty($Product->QuantityOnHand);
                $this->setTaxId(0);
                $this->setWarehouseId(0);
                $this->setSubGroupId($Product->SubGroupId);
                $this->setDisplayName($Product->DisplayName);
                $this->setPreparationTime($Product->PreparationTime);
                $this->setItemType($Product->ItemType);
                $this->setAskQty($Product->AskQty);
                $this->setCheckStock($Product->CheckStock);
                $this->setForcedQuestionId(implode(',',json_decode(json_encode($QuestionIds[$i]))));
                $this->setSubMenu(implode(',',json_decode(json_encode($SubMenuIds[$i]))));
                $this->setFlavorsId(($FlavorIds[$i]));
                $this->setIsVeg(0);
                $this->setIsMultiLayered($IsMultiLayered[$i]);
                $this->setLayerCount($LayerCount[$i]);

                $Data = array('MenuId'=>$id, 'ProductId'=>$ProductId, 'Rate'=>$this->getEscapString($this->getRate()),'TaxAmount'=>$this->getEscapString($this->getTaxAmount()), 'ModifierId'=>$this->getEscapString($this->getModifierId()), 'AskPrice'=>$this->getEscapString($this->getAskPrice()), 'MaxQty'=>$this->getEscapString($this->getMaxQty()), 'TaxId'=>$this->getEscapString($this->getTaxId()), 'WarehouseId'=>$this->getEscapString($this->getWarehouseId()), 'SubGroupId'=>intval($this->getEscapString($this->getSubGroupId())), 'DisplayName'=>$this->getEscapString($this->getDisplayName()), 'PreparationTime'=>intval($this->getEscapString($this->getPreparationTime())), 'ItemType'=>$this->getEscapString($this->getItemType()), 'AskQty'=>intval($this->getEscapString($this->getAskQty())), 'CheckStock'=>intval($this->getEscapString($this->getCheckStock())), 'ForcedQuestionId'=>$this->getEscapString($this->getForcedQuestionId()), 'SubMenu'=>$this->getEscapString($this->getSubMenu()), 'FlavorsId'=>$this->getEscapString($this->getFlavorsId()), 'IsVeg'=>$this->getEscapString($this->getIsVeg()), 'IsMultiLayered'=>intval($this->getEscapString($this->getIsMultiLayered())), 'LayerCount'=>$this->getEscapString($this->getLayerCount()));
                $ExistsChild = $this->SelectSingleRow("MenuChild", "MenuId='$id' AND ProductId='$ProductId'", '', 0);
                if(count($ExistsChild['SrNo']) > 0){
                    $this->UpdateRecords("MenuChild", "MenuId='$id' AND ProductId='$ProductId'", $Data, 0);
                }else{
                    $this->InsertRecords("MenuChild", $Data, 0);
                }
            }
            return 1;
        } else {
            
            $this->InsertRecords($MenuTable, $MenuData, 0);
            $MenuId = $this->SelectSingleRow($MenuTable, $MenuCondition, '', 0);
            $id = $MenuId['MenuId'];
            $lid = $this->getLocationId();
            $MenuLocationData = array('MenuId'=>$id,'LocationId'=>$lid);
            $LocationExists = $this->SelectSingleRow("MenuLocation", "MenuId='$id' AND LocationId='$lid'", '', 0);
            if(count($LocationExists['SrNo']) <= 0){
                $this->InsertRecords("MenuLocation", $MenuLocationData, 0);
            }
            $this->InsertRecords("MenuLocation", $MenuLocationData, 0);
            for ($i = 0; $i <= count($ProductData) - 1; $i++) {
                $this->setJsonEncode($ProductData[$i]);
                $this->setJsonDecode($this->getJsonEncode());
                $Product = $this->getJsonDecode();
                
                $this->setMenuId($id);
                $this->setProductId($Product->productId);
                $ProductId = $this->getEscapString($this->getProductId());
                $this->setRate($Product->Rate);
                $this->setTaxAmount($Product->TaxAmount);
                $this->setModifierId(json_decode(json_encode($ModifierIds[$i])));
                $this->setAskPrice($Product->AskRate);
                $this->setMaxQty($Product->QuantityOnHand);
                $this->setTaxId(0);
                $this->setWarehouseId(0);
                $this->setSubGroupId($Product->SubGroupId);
                $this->setDisplayName($Product->DisplayName);
                $this->setPreparationTime($Product->PreparationTime);
                $this->setItemType($Product->ItemType);
                $this->setAskQty($Product->AskQty);
                $this->setCheckStock($Product->CheckStock);
                $this->setForcedQuestionId(implode(',',json_decode(json_encode($QuestionIds[$i]))));
                $this->setSubMenu(implode(',',json_decode(json_encode($SubMenuIds[$i]))));
                $this->setFlavorsId(($FlavorIds[$i]));
                $this->setIsVeg(0);
                $this->setIsMultiLayered($IsMultiLayered[$i]);                
                $this->setLayerCount($LayerCount[$i]);

                $Data = array('MenuId'=>$id, 'ProductId'=>$ProductId, 'Rate'=>$this->getEscapString($this->getRate()),'TaxAmount'=>$this->getEscapString($this->getTaxAmount()), 'ModifierId'=>$this->getEscapString($this->getModifierId()), 'AskPrice'=>$this->getEscapString($this->getAskPrice()), 'MaxQty'=>$this->getEscapString($this->getMaxQty()), 'TaxId'=>$this->getEscapString($this->getTaxId()), 'WarehouseId'=>$this->getEscapString($this->getWarehouseId()), 'SubGroupId'=>intval($this->getEscapString($this->getSubGroupId())), 'DisplayName'=>$this->getEscapString($this->getDisplayName()), 'PreparationTime'=>intval($this->getEscapString($this->getPreparationTime())), 'ItemType'=>$this->getEscapString($this->getItemType()), 'AskQty'=>intval($this->getEscapString($this->getAskQty())), 'CheckStock'=>intval($this->getEscapString($this->getCheckStock())), 'ForcedQuestionId'=>$this->getEscapString($this->getForcedQuestionId()), 'SubMenu'=>$this->getEscapString($this->getSubMenu()), 'FlavorsId'=>$this->getEscapString($this->getFlavorsId()), 'IsVeg'=>$this->getEscapString($this->getIsVeg()), 'IsMultiLayered'=>intval($this->getEscapString($this->getIsMultiLayered())), 'LayerCount'=>$this->getEscapString($this->getLayerCount()));
                $ExistsChild = $this->SelectSingleRow("MenuChild", "MenuId='$id' AND ProductId='$ProductId'", '', 0);
                if(count($ExistsChild['SrNo']) > 0){
                    $this->UpdateRecords("MenuChild", "MenuId='$id' AND ProductId='$ProductId'", $Data, 0);
                }else{
                    $this->InsertRecords("MenuChild", $Data, 0);
                }
            }
            return 1;
        }
    }

}

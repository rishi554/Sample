<?php

require __DIR__ . '/../MenuManagement/ModifierMaster.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModifierMasterChild
 *
 * @author PHP Developers
 */
class ModifierMasterChild extends ModifierMaster {

    private $ModifierId;
    private $ProductId;
    private $Rate;
    private $StationId;
    private $Type;
    private $SubModifierId;
    private $DisplayName;
    private $SubModifier;

    public function __construct() {
        parent::__construct();
    }

    function getModifierId() {
        return $this->ModifierId;
    }

    function getProductId() {
        return $this->ProductId;
    }

    function getRate() {
        return $this->Rate;
    }

    function getStationId() {
        return $this->StationId;
    }

    function getType() {
        return $this->Type;
    }

    function getSubModifierId() {
        return $this->SubModifierId;
    }

    function getDisplayName() {
        return $this->DisplayName;
    }

    function getSubModifier() {
        return $this->SubModifier;
    }

    function setModifierId($ModifierId) {
        $this->ModifierId = $ModifierId;
    }

    function setProductId($ProductId) {
        $this->ProductId = $ProductId;
    }

    function setRate($Rate) {
        $this->Rate = $Rate;
    }

    function setStationId($StationId) {
        $this->StationId = $StationId;
    }

    function setType($Type) {
        $this->Type = $Type;
    }

    function setSubModifierId($SubModifierId) {
        $this->SubModifierId = $SubModifierId;
    }

    function setDisplayName($DisplayName) {
        $this->DisplayName = $DisplayName;
    }

    function setSubModifier($SubModifier) {
        $this->SubModifier = $SubModifier;
    }

    function getChildModifiers() {
        $this->setJsonEncode($this->SelectTable("ModifierChild", "", "", 0));
        return $this->getJsonEncode();
    }

    function deleteChildModifier() {

        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ModifierChildFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("ModifierChild", "ModifierChildId='$id'");
    }

    function addChildModifier() {

        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ModifierChildFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();

        $this->setModifierId($request->ModifierId);
        $this->setProductId($request->ProductId);
        $this->setRate($request->Rate);
        $this->setType($request->Type);
        $this->setStationId(0);
        $this->setSubModifierId(0);
        $this->setDisplayName($request->DisplayName);
        $this->setSubModifier("None");
        $ModifierId = $this->getEscapString($this->getModifierId());
        $ProductId = $this->getEscapString($this->getProductId());
        $Rate = $this->getEscapString($this->getRate());

        $Tax = $this->SelectSingleRow("product_master JOIN tax_master ON product_master.TaxIdSale=tax_master.TaxId", "product_master.productId='$ProductId'", 'product_master.productId,product_master.TaxIdSale,product_master.ProductName,product_master.ProductDIscount', 0);
        $TaxAmount = $this->getTaxAmount($Tax['ProductDIscount'], $Rate, $Tax['TaxIdSale']);

        $ModifierTable = "ModifierChild";
        $ModifierData = array('ModifierId' => $ModifierId, 'ProductId' => $ProductId, 'Rate' => $Rate, 'TaxAmount' => $TaxAmount, 'Type' => $this->getEscapString($this->getType()), 'StationId' => $this->getEscapString($this->getStationId()), 'SubModifierId' => $this->getEscapString($this->getSubModifierId()), 'DisplayName' => $this->getEscapString($this->getDisplayName()), 'SubModifier' => $this->getEscapString($this->getSubModifier()));

        $ModifierCondition = "ModifierId='$ModifierId' AND ProductId='$ProductId'";
        $Exists = $this->SelectSingleRow($ModifierTable, $ModifierCondition, '', 0);
        if (count($Exists['ModifierChildId']) > 0) {
            return 0;
        } else {
            $this->InsertRecords($ModifierTable, $ModifierData, 0);
            return 1;
        }
    }

    function ExclusiveTax($Rate, $taxValue) {
        $temp = ($Rate * 100) / ($taxValue + 100);
        $TaxAmount = $Rate - $temp;
        return $TaxAmount;
    }

    function InclusiveTax($Rate, $taxValue) {
        $TaxAmount = $Rate * $taxValue / 100;
        return $TaxAmount;
    }

    function getTaxAmount($disocunt, $rate, $taxId) {
        $Tax = $this->getTax($taxId);
        if ($Tax['IncludedInRate'] == 0) { // For Exclusive tax 
            if ($Tax['CalMethod	'] == 0) {
                $r = $rate - $disocunt;
                //Tax amount after discount
                $amount = $this->ExclusiveTax($r, $Tax['TaxValue']);
            } else {
                //Tax amount before discount
                $r = $this->ExclusiveTax($rate, $Tax['TaxValue']);
                $amount = $r - $disocunt;
            }
        } else { // For Inclusive tax 
            if ($Tax['CalMethod'] == 0) {
                $r = $rate - $disocunt;
                //Tax amount after discount
                $amount = $this->InclusiveTax($r, $Tax['TaxValue']);
            } else {
                //Tax amount before discount
                $r = $this->InclusiveTax($rate, $Tax['TaxValue']);
                $amount = $r - $disocunt;
            }
        }
        return $amount;
    }

    function getTax($id) {
        return $this->SelectSingleRow("tax_master", "TaxId='$id'", "", 0);
    }

}

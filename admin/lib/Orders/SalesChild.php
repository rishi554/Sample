<?php
require __DIR__ . '/../Orders/SalesMaster.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalesChild
 *
 * @author PHP Developers
 */
class SalesChild extends SalesMaster{
    
    private $ProductId;
    private $ProductName;
    private $ProductPrice;
    private $SalePrice;
    private $Discount;
    private $DiscountFlag;
    private $DiscountedAmount;
    private $TaxPer;
    private $TaxMethod;
    private $IsModifierFlag;
    private $Flavour;
    private $ExtraFlavourCharge;
    private $IsMultiLayered;
    private $LayerCount;
    
    public function __construct() {
        parent::__construct();
    }
    function getProductId() {
        return $this->ProductId;
    }

    function getProductName() {
        return $this->ProductName;
    }

    function getProductPrice() {
        return $this->ProductPrice;
    }

    function getSalePrice() {
        return $this->SalePrice;
    }

    function getDiscount() {
        return $this->Discount;
    }

    function getDiscountFlag() {
        return $this->DiscountFlag;
    }

    function getDiscountedAmount() {
        return $this->DiscountedAmount;
    }

    function getTaxPer() {
        return $this->TaxPer;
    }

    function getTaxMethod() {
        return $this->TaxMethod;
    }

    function getIsModifierFlag() {
        return $this->IsModifierFlag;
    }

    function getFlavour() {
        return $this->Flavour;
    }

    function getExtraFlavourCharge() {
        return $this->ExtraFlavourCharge;
    }

    function getIsMultiLayered() {
        return $this->IsMultiLayered;
    }

    function getLayerCount() {
        return $this->LayerCount;
    }

    function setProductId($ProductId) {
        $this->ProductId = $ProductId;
    }

    function setProductName($ProductName) {
        $this->ProductName = $ProductName;
    }

    function setProductPrice($ProductPrice) {
        $this->ProductPrice = $ProductPrice;
    }

    function setSalePrice($SalePrice) {
        $this->SalePrice = $SalePrice;
    }

    function setDiscount($Discount) {
        $this->Discount = $Discount;
    }

    function setDiscountFlag($DiscountFlag) {
        $this->DiscountFlag = $DiscountFlag;
    }

    function setDiscountedAmount($DiscountedAmount) {
        $this->DiscountedAmount = $DiscountedAmount;
    }

    function setTaxPer($TaxPer) {
        $this->TaxPer = $TaxPer;
    }

    function setTaxMethod($TaxMethod) {
        $this->TaxMethod = $TaxMethod;
    }

    function setIsModifierFlag($IsModifierFlag) {
        $this->IsModifierFlag = $IsModifierFlag;
    }

    function setFlavour($Flavour) {
        $this->Flavour = $Flavour;
    }

    function setExtraFlavourCharge($ExtraFlavourCharge) {
        $this->ExtraFlavourCharge = $ExtraFlavourCharge;
    }

    function setIsMultiLayered($IsMultiLayered) {
        $this->IsMultiLayered = $IsMultiLayered;
    }

    function setLayerCount($LayerCount) {
        $this->LayerCount = $LayerCount;
    }

}

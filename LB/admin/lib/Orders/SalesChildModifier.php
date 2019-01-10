<?php
require __DIR__ . '/../Orders/SalesChild.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalesChildModifier
 *
 * @author PHP Developers
 */
class SalesChildModifier extends SalesChild{
    
    private $childProductId;
    private $ModifierName;
    private $MSalePrice;
    private $MProductPrice;
    private $MQuantity;
    private $MGrandTotal;
    private $MTotalAmount;
    private $MDiscount;
    private $MDiscountFlag;
    private $MDiscountedAmount;
 
    public function __construct() {
        parent::__construct();
    }
    function getChildProductId() {
        return $this->childProductId;
    }

    function getModifierName() {
        return $this->ModifierName;
    }

    function getMSalePrice() {
        return $this->MSalePrice;
    }

    function getMProductPrice() {
        return $this->MProductPrice;
    }

    function getMQuantity() {
        return $this->MQuantity;
    }

    function getMGrandTotal() {
        return $this->MGrandTotal;
    }

    function getMTotalAmount() {
        return $this->MTotalAmount;
    }

    function getMDiscount() {
        return $this->MDiscount;
    }

    function getMDiscountFlag() {
        return $this->MDiscountFlag;
    }

    function getMDiscountedAmount() {
        return $this->MDiscountedAmount;
    }

    function setChildProductId($childProductId) {
        $this->childProductId = $childProductId;
    }

    function setModifierName($ModifierName) {
        $this->ModifierName = $ModifierName;
    }

    function setMSalePrice($MSalePrice) {
        $this->MSalePrice = $MSalePrice;
    }

    function setMProductPrice($MProductPrice) {
        $this->MProductPrice = $MProductPrice;
    }

    function setMQuantity($MQuantity) {
        $this->MQuantity = $MQuantity;
    }

    function setMGrandTotal($MGrandTotal) {
        $this->MGrandTotal = $MGrandTotal;
    }

    function setMTotalAmount($MTotalAmount) {
        $this->MTotalAmount = $MTotalAmount;
    }

    function setMDiscount($MDiscount) {
        $this->MDiscount = $MDiscount;
    }

    function setMDiscountFlag($MDiscountFlag) {
        $this->MDiscountFlag = $MDiscountFlag;
    }

    function setMDiscountedAmount($MDiscountedAmount) {
        $this->MDiscountedAmount = $MDiscountedAmount;
    }

}

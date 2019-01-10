<?php
require __DIR__ . '/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalesMaster
 *
 * @author PHP Developers
 */
class SalesMaster extends DBOperation{
    
    private $OrderId;
    private $OrderDate;
    private $OrderTime;
    private $CustomerId;
    private $CustomerName;
    private $Username;
    private $CustomerMobile;
    private $CustomerEmail;
    private $Address1;
    private $Address2;
    private $Address3;
    private $City;
    private $Area;
    private $DeliveryCharge;
    private $TotalDiscount;
    private $TotalDiscountAmt;
    private $TaxAmount;
    private $DeliveryTime;
    private $LocationType;
    private $CustomerMessage;
    private $ExtraCharges;
    private $OrderStatus;
    private $ModeOfPayment;
    private $PaymentStatus;
    private $TotalAmount;
    private $GrandTotal;
    private $ResellerId;
    private $ResellerLocation;
    private $ResellerName;
    private $DiffOrderFlag;
    private $CardMessage;
    private $CakeMessage;
    private $Quantity;
    private $deliveryDate;

    public function __construct() {
        parent::__construct();
    }
            
    function getOrderId() {
        return $this->OrderId;
    }

    function getOrderDate() {
        return $this->OrderDate;
    }

    function getOrderTime() {
        return $this->OrderTime;
    }

    function getCustomerId() {
        return $this->CustomerId;
    }

    function getCustomerName() {
        return $this->CustomerName;
    }

    function getAddress1() {
        return $this->Address1;
    }

    function getAddress2() {
        return $this->Address2;
    }

    function getAddress3() {
        return $this->Address3;
    }

    function getCity() {
        return $this->City;
    }

    function getArea() {
        return $this->Area;
    }

    function getDeliveryCharge() {
        return $this->DeliveryCharge;
    }

    function getTotalDiscount() {
        return $this->TotalDiscount;
    }

    function getTotalDiscountAmt() {
        return $this->TotalDiscountAmt;
    }

    function getTaxAmount() {
        return $this->TaxAmount;
    }

    function getDeliveryTime() {
        return $this->DeliveryTime;
    }

    function getLocationType() {
        return $this->LocationType;
    }

    function getCustomerMessage() {
        return $this->CustomerMessage;
    }

    function getExtraCharges() {
        return $this->ExtraCharges;
    }

    function getOrderStatus() {
        return $this->OrderStatus;
    }

    function getModeOfPayment() {
        return $this->ModeOfPayment;
    }

    function getPaymentStatus() {
        return $this->PaymentStatus;
    }

    function getTotalAmount() {
        return $this->TotalAmount;
    }

    function getGrandTotal() {
        return $this->GrandTotal;
    }

    function getResellerId() {
        return $this->ResellerId;
    }

    function getResellerLocation() {
        return $this->ResellerLocation;
    }

    function getResellerName() {
        return $this->ResellerName;
    }

    function getDiffOrderFlag() {
        return $this->DiffOrderFlag;
    }

    function setOrderId($OrderId) {
        $this->OrderId = $OrderId;
    }

    function setOrderDate($OrderDate) {
        $this->OrderDate = $OrderDate;
    }

    function setOrderTime($OrderTime) {
        $this->OrderTime = $OrderTime;
    }

    function setCustomerId($CustomerId) {
        $this->CustomerId = $CustomerId;
    }

    function setCustomerName($CustomerName) {
        $this->CustomerName = $CustomerName;
    }

    function setAddress1($Address1) {
        $this->Address1 = $Address1;
    }

    function setAddress2($Address2) {
        $this->Address2 = $Address2;
    }

    function setAddress3($Address3) {
        $this->Address3 = $Address3;
    }

    function setCity($City) {
        $this->City = $City;
    }

    function setArea($Area) {
        $this->Area = $Area;
    }

    function setDeliveryCharge($DeliveryCharge) {
        $this->DeliveryCharge = $DeliveryCharge;
    }

    function setTotalDiscount($TotalDiscount) {
        $this->TotalDiscount = $TotalDiscount;
    }

    function setTotalDiscountAmt($TotalDiscountAmt) {
        $this->TotalDiscountAmt = $TotalDiscountAmt;
    }

    function setTaxAmount($TaxAmount) {
        $this->TaxAmount = $TaxAmount;
    }

    function setDeliveryTime($DeliveryTime) {
        $this->DeliveryTime = $DeliveryTime;
    }

    function setLocationType($LocationType) {
        $this->LocationType = $LocationType;
    }

    function setCustomerMessage($CustomerMessage) {
        $this->CustomerMessage = $CustomerMessage;
    }

    function setExtraCharges($ExtraCharges) {
        $this->ExtraCharges = $ExtraCharges;
    }

    function setOrderStatus($OrderStatus) {
        $this->OrderStatus = $OrderStatus;
    }

    function setModeOfPayment($ModeOfPayment) {
        $this->ModeOfPayment = $ModeOfPayment;
    }

    function setPaymentStatus($PaymentStatus) {
        $this->PaymentStatus = $PaymentStatus;
    }

    function setTotalAmount($TotalAmount) {
        $this->TotalAmount = $TotalAmount;
    }

    function setGrandTotal($GrandTotal) {
        $this->GrandTotal = $GrandTotal;
    }

    function setResellerId($ResellerId) {
        $this->ResellerId = $ResellerId;
    }

    function setResellerLocation($ResellerLocation) {
        $this->ResellerLocation = $ResellerLocation;
    }

    function setResellerName($ResellerName) {
        $this->ResellerName = $ResellerName;
    }

    function setDiffOrderFlag($DiffOrderFlag) {
        $this->DiffOrderFlag = $DiffOrderFlag;
    }

    function getCardMessage() {
        return $this->CardMessage;
    }

    function getQuantity() {
        return $this->Quantity;
    }

    function setCardMessage($CardMessage) {
        $this->CardMessage = $CardMessage;
    }

    function setQuantity($Quantity) {
        $this->Quantity = $Quantity;
    }
    
    function getCustomerMobile() {
        return $this->CustomerMobile;
    }

    function getCustomerEmail() {
        return $this->CustomerEmail;
    }

    function setCustomerMobile($CustomerMobile) {
        $this->CustomerMobile = $CustomerMobile;
    }

    function setCustomerEmail($CustomerEmail) {
        $this->CustomerEmail = $CustomerEmail;
    }
    function getCakeMessage() {
        return $this->CakeMessage;
    }

    function setCakeMessage($CakeMessage) {
        $this->CakeMessage = $CakeMessage;
    }

    function getDeliveryDate() {
        return $this->deliveryDate;
    }

    function setDeliveryDate($DeliveryDate) {
        $this->deliveryDate = $DeliveryDate;
    }
    function getLandmark() {
        return $this->Landmark;
    }

    function setLandmark($Landmark) {
        $this->Landmark = $Landmark;
    }
    function getUsername() {
        return $this->Username;
    }

    function setUsername($Username) {
        $this->Username = $Username;
    }

}

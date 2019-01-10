<?php
require __DIR__.'/../Area/AreaMaster.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AreaChild
 *
 * @author PHP Developers
 */
class AreaChild extends AreaMaster{
    
    private $DAMasterId;
    private $DeliveryAreaId;
    private $AreaName;
    private $MinAmount;
    private $DeliveryCharges;
    private $Remark;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getDAMasterId() {
        return $this->DAMasterId;
    }

    function getDeliveryAreaId() {
        return $this->DeliveryAreaId;
    }

    function getAreaName() {
        return $this->AreaName;
    }

    function getMinAmount() {
        return $this->MinAmount;
    }

    function getDeliveryCharges() {
        return $this->DeliveryCharges;
    }

    function getRemark() {
        return $this->Remark;
    }

    function setDAMasterId($DAMasterId) {
        $this->DAMasterId = $DAMasterId;
    }

    function setDeliveryAreaId($DeliveryAreaId) {
        $this->DeliveryAreaId = $DeliveryAreaId;
    }

    function setAreaName($AreaName) {
        $this->AreaName = $AreaName;
    }

    function setMinAmount($MinAmount) {
        $this->MinAmount = $MinAmount;
    }

    function setDeliveryCharges($DeliveryCharges) {
        $this->DeliveryCharges = $DeliveryCharges;
    }

    function setRemark($Remark) {
        $this->Remark = $Remark;
    }

    public function getAreas(){
        $LocationId = $_SESSION['LocationId'];
        $result = $this->SelectTable("ConfDeliveryAreaChild JOIN ConfDeliveryAreaMaster ON ConfDeliveryAreaMaster.ConfDeliveryAreaId=ConfDeliveryAreaChild.DAMasterId", "ConfDeliveryAreaMaster.LocationId='$LocationId'", "ConfDeliveryAreaChild.AreaName,ConfDeliveryAreaChild.MinAmount,ConfDeliveryAreaChild.DeliveryCharges,ConfDeliveryAreaChild.Remark", 0);
        $this->setJsonEncode($result);
        return $this->getJsonEncode();
    }
}

<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Area
 *
 * @author PHP Developers
 */
class AreaMaster extends DBOperation{
    
    private $ConfDeliveryAreaId;
    private $AreaConfName;
    private $LocationName;
    private $LocationId;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getConfDeliveryAreaId() {
        return $this->ConfDeliveryAreaId;
    }

    function getAreaConfName() {
        return $this->AreaConfName;
    }

    function getLocationName() {
        return $this->LocationName;
    }

    function getLocationId() {
        return $this->LocationId;
    }

    function setConfDeliveryAreaId($ConfDeliveryAreaId) {
        $this->ConfDeliveryAreaId = $ConfDeliveryAreaId;
    }

    function setAreaConfName($AreaConfName) {
        $this->AreaConfName = $AreaConfName;
    }

    function setLocationName($LocationName) {
        $this->LocationName = $LocationName;
    }

    function setLocationId($LocationId) {
        $this->LocationId = $LocationId;
    }

}

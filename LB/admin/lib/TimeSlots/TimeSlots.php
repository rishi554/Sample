<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TimeSlots
 *
 * @author PHP Developers
 */
class TimeSlots extends DBOperation{
    
    private $FromTIme;
    private $ToTIme;
    private $LocationId;
    
    public function __construct() {
        parent::__construct();
    }
            
    function getFromTIme() {
        return $this->FromTIme;
    }

    function getToTIme() {
        return $this->ToTIme;
    }

    function getLocationId() {
        return $this->LocationId;
    }

    function setFromTIme($FromTIme) {
        $this->FromTIme = $FromTIme;
    }

    function setToTIme($ToTIme) {
        $this->ToTIme = $ToTIme;
    }

    function setLocationId($LocationId) {
        $this->LocationId = $LocationId;
    }
}

<?php
require 'Country.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of State
 *
 * @author PHP Developers
 */
class State extends Country {
    
    private $StateName;
    private $CountryId;
    
    function __construct() {
        parent::__construct();
    }
    
    function getStateName() {
        return $this->StateName;
    }

    function getCountryId() {
        return $this->CountryId;
    }

    function setStateName($StateName) {
        $this->StateName = $StateName;
    }

    function setCountryId($CountryId) {
        $this->CountryId = $CountryId;
    }
}

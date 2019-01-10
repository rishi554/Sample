<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Country
 *
 * @author PHP Developers
 */
class Country extends DBOperation{
    
    private $CountryName;
    
    public function __construct() {
        parent::__construct();
    }

    function getCountryName() {
        return $this->CountryName;
    }

    function setCountryName($CountryName) {
        $this->CountryName = $CountryName;
    }
    
}

<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Log
 *
 * @author PHP Developers
 */
class Log extends DBOperation {
    
    private $LogUser;
    private $LogLocation;
    private $LogSession;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getLogUser() {
        return $this->LogUser;
    }

    function getLogLocation() {
        return $this->LogLocation;
    }

    function getLogSession() {
        return $this->LogSession;
    }

    function setLogUser($LogUser) {
        $this->LogUser = $LogUser;
    }

    function setLogLocation($LogLocation) {
        $this->LogLocation = $LogLocation;
    }

    function setLogSession($LogSession) {
        $this->LogSession = $LogSession;
    }

        //put your code here
}

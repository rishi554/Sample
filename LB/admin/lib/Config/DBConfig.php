<?php
error_reporting(0);
session_start();
//date_default_timezone_set('Asia/Dubai');
date_default_timezone_set('Asia/Kolkata');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConfig
 *
 * @author PHP Developers
 */
class DBConfig {
    
    private $hostname;
    private $dbuser;
    private $dbpass;
    private $dbname;
    private $db;
    
    public function __construct(){
        $this->setConfiguration("localhost","root","","almaa");
    }
    public function getConfiguration(){
        return $this->db;
    }  
    function setConfiguration($hostname,$dbuser,$dbpass,$dbname){
        
        $this->hostname = $hostname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
        $this->db = mysqli_connect($this->hostname,$this->dbuser,$this->dbpass,$this->dbname);
        
        if(mysqli_errno($this->db)){
            return false;
        }else{
            return true;
        }
        
    }
}


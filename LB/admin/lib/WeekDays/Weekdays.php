<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weekdays
 *
 * @author PHP Developers
 */
class Weekdays extends DBOperation{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function GetWeekdays(){
              
        $WeekdaysTable = "weekdays_master";
        $WeekdaysCondition = "";
        $result = $this->SelectTable($WeekdaysTable, $WeekdaysCondition,'',0);
        
        if($result){
            
            $this->setJsonEncode($result); // setting data into json object
            $request = $this->getJsonEncode(); // getting data into json object
            return $request;
            
        }else{
            return false;
        }
    }
}

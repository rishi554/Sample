<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InterestRateCharge
 *
 * @author PHP Developers
 */
class InterestRateCharge extends DBOperation{
    
    public function __construct() {
        parent::__construct();
    }
    public function GetInterestRateCharge(){
              
        $InterestRateChargeTable = "interest_rate_type_master";
        $InterestRateChargeCondition = "";
        $result = $this->SelectTable($InterestRateChargeTable, $InterestRateChargeCondition,'',0);
        
        if($result){
            
            $this->setJsonEncode($result); // setting data into json object
            $request = $this->getJsonEncode(); // getting data into json object
            return $request;
            
        }else{
            return false;
        }
    }
}

<?php
require 'State.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of City
 *
 * @author PHP Developers
 */
class City extends State{
    
    private $CityName;
    private $StateId;
    private $data;
    private $Locations;
    
    function __construct() {
        parent::__construct();
    }
    
    function getCityName() {
        return $this->CityName;
    }

    function getStateId() {
        return $this->StateId;
    }

    function setCityName($CityName) {
        $this->CityName = $CityName;
    }

    function setStateId($StateId) {
        $this->StateId = $StateId;
    }
    
    function AddLocation(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->IsActive = mysqli_real_escape_string($this->db,$this->getIsActive());
        $this->setIsFixed(1);
        $this->IsFixed = mysqli_real_escape_string($this->db,$this->getIsFixed());
        $this->setCountryName($request->CountryName);
        $this->CountryName = $this->getCountryName();
        $this->setStateName($request->StateName);
        $this->StateName = $this->getStateName();
        $this->setCityName($request->CityName);
        $this->CityName = $this->getCityName();        
        
        if($this->CountryExists($this->CountryName)){
            if($this->StateExists($this->StateName)){
                if($this->CityExists($this->CityName)){
                    return false;
                }else{
                    $this->setStateId($this->StateExists($request->StateName));
                    $this->StateId = $this->getStateId();
                    $this->data = array('CityName'=>$this->CityName,'StateId'=>$this->StateId,'IsActive'=>$this->IsActive,'IsFixed'=>$this->IsFixed);
                    $this->InsertRecords("city_master", $this->data, 0);
                    return true;
                } 
            }else{
                $this->setCountryId($this->CountryExists($request->CountryName));
                $this->CountryId = $this->getCountryId();
                $this->data = array('StateName'=>$request->StateName,'CountryId'=>$this->CountryId,'IsActive'=>$this->IsActive,'IsFixed'=>$this->IsFixed);
                if($this->InsertRecords("state_master", $this->data, 0)){
                    $this->data = array('CityName'=>$this->CityName,'StateId'=>$this->StateId,'IsActive'=>$this->IsActive,'IsFixed'=>$this->IsFixed);
                    $this->InsertRecords("city_master", $this->data, 0);
                    return true;
                }
            }
        }else{
            $this->data = array('CountryName'=>$request->CountryName,'IsActive'=>$this->IsActive,'IsFixed'=>$this->IsFixed);
            if($this->InsertRecords("country_master", $this->data, 0)){
                $this->setCountryId($this->CountryExists($request->CountryName));
                $this->CountryId = $this->getCountryId();
                $this->data = array('StateName'=>$request->StateName,'CountryId'=>$this->CountryId,'IsActive'=>$this->IsActive,'IsFixed'=>$this->IsFixed);
                if($this->InsertRecords("state_master", $this->data, 0)){
                    $this->setStateId($this->StateExists($request->StateName));
                    $this->StateId = $this->getStateId();
                    $this->data = array('CityName'=>$this->CityName,'StateId'=>$this->StateId,'IsActive'=>$this->IsActive,'IsFixed'=>$this->IsFixed);
                    $this->InsertRecords("city_master", $this->data, 0);
                    return true;
                }
            }
        }        
    }
    function CountryExists($CountryName){
        $Exists = $this->SelectSingleRow("country_master", "CountryName = '$CountryName'", '', 0);
        if(count($Exists['CountryName']) > 0){
            return $Exists['CountryId'];
        }else{
            return false;
        }
    }
    function StateExists($StateName){
        $Exists = $this->SelectSingleRow("state_master", "StateName = '$StateName'", '', 0);
        if(count($Exists['StateName']) > 0){
            return $Exists['StateId'];
        }else{
            return false;
        }
    }
    function CityExists($CityName){
        $Exists = $this->SelectSingleRow("city_master", "CityName = '$CityName'", '', 0);
        if(count($Exists['CityName']) > 0){
            return true;
        }else{
            return false;
        }
    }
    function getLocations(){
        $this->Locations = $this->SelectTable("country_master JOIN state_master ON country_master.CountryId=state_master.CountryId JOIN city_master ON state_master.StateId=city_master.StateId", "", "", 0);
        $this->setJsonEncode($this->Locations);
        return $this->getJsonEncode();
    }
    //put your code here
}

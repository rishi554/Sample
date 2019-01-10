<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Teams
 *
 * @author PHP Developers
 */
class Teams extends DBOperation{
    
    private $TeamName;
    private $data;

    public function __construct() {
        parent::__construct();
    }
    
    function getTeamName() {
        return $this->TeamName;
    }

    function setTeamName($TeamName) {
        $this->TeamName = $TeamName;
    }

    public function GetTeams(){
              
        $TeamTable = "team_master";
        $TeamCondition = "";
        $result = $this->SelectTable($TeamTable, $TeamCondition,'',0);
        
        if($result){
            
            $this->setJsonEncode($result); // setting data into json object
            $request = $this->getJsonEncode(); // getting data into json object
            return $request;
            
        }else{
            return false;
        }
    }
    
    public function AddTeam(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->IsActive = $this->getEscapString($this->getIsActive());
        $this->setIsFixed(1);
        $this->IsFixed = $this->getEscapString($this->getIsFixed());
        $this->setTeamName($request->TeamName);
        $this->TeamName = $this->getEscapString($this->getTeamName());
        
        if($this->TeamExists($this->TeamName)){
            return false;
        }else{
            $this->data = array('TeamName' => $this->TeamName, 'IsActive' => $this->IsActive, 'IsFixed' => $this->IsFixed);
            $this->InsertRecords("team_master", $this->data, 0);
            return true;
        }
        
    }
    function TeamExists($TeamName){
        $Exists = $this->SelectSingleRow("team_master", "TeamName = '$TeamName'", '', 0);
        if(count($Exists['TeamName']) > 0){
            return true;
        }else{
            return false;
        }
    }
}

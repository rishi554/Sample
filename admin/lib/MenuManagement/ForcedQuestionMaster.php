<?php
require_once __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ForcedQuestionMaster
 *
 * @author PHP Developers
 */
class ForcedQuestionMaster extends DBOperation{
    
    Private $ForcedQueName;
    Private $EnforceAnswer;
    Private $NoOfChoice;
    
    public function __construct() {
        parent::__construct();
    }
    function getForcedQueName() {
        return $this->ForcedQueName;
    }

    function getEnforceAnswer() {
        return $this->EnforceAnswer;
    }

    function getNoOfChoice() {
        return $this->NoOfChoice;
    }

    function setForcedQueName($ForcedQueName) {
        $this->ForcedQueName = $ForcedQueName;
    }

    function setEnforceAnswer($EnforceAnswer) {
        $this->EnforceAnswer = $EnforceAnswer;
    }

    function setNoOfChoice($NoOfChoice) {
        $this->NoOfChoice = $NoOfChoice;
    }
    
    function getForcedQuestions(){
        $this->setJsonEncode($this->SelectTable("ForcedQuestionMaster", "", "",0));
        return $this->getJsonEncode();
    }
    function deleteForcedQuestion(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->QuestionFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("ForcedQuestionMaster", "ForcedQueId='$id'");
    }
    
    function addForcedQuestion(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->QuestionFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setEnforceAnswer($request->EnforceAnswer);
        $this->setNoOfChoice($request->NoOfChoice);
        $this->setForcedQueName($request->QuestionName);        
        $ForcedQuestionName = $this->getEscapString($this->getForcedQueName());
        
        $ForcedQuestionTable = "ForcedQuestionMaster";
        $ForcedQuestionData = array('ForcedQueName'=>$ForcedQuestionName,'EnforceAnswer'=>$this->getEscapString($this->getEnforceAnswer()),'NoOfChoice'=>$this->getEscapString($this->getNoOfChoice()),'IsActive'=>intval($this->getEscapString($this->getIsActive())),'IsFixed'=>intval($this->getEscapString($this->getIsFixed())));
        
        $ForcedQuestionCondition = "ForcedQueName='$ForcedQuestionName'";
        $Exists = $this->SelectSingleRow($ForcedQuestionTable, $ForcedQuestionCondition, '', 0);
        if(count($Exists['ForcedQueName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($ForcedQuestionTable, $ForcedQuestionData, 0);
            return 1;
        } 
    }
}

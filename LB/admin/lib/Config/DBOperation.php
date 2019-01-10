<?php
require 'DBConfig.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBOperation
 *
 * @author PHP Developers
 */

class DBOperation extends DBConfig{

    private $json_encode;
    private $json_decode;
    private $postdata;
    private $IsFixed;
    private $IsActive;

    public function __construct() {
        parent::__construct();
        $this->db = $this->getConfiguration();
    }

    public function setJsonEncode($JsonResponse) {
        $this->json_encode = json_encode($JsonResponse);
    }

    public function getJsonEncode() {
        return $this->json_encode;
    }

    public function setJsonDecode($JsonResponse) {
        $this->json_decode = json_decode($JsonResponse);
    }

    public function getJsonDecode() {
        return $this->json_decode;
    }
    
    public function setPostdata() {
        $this->postdata = file_get_contents("php://input");
    }

    public function getPostdata() {
        return $this->postdata;
    }
    public function getEscapString($String) {
        return mysqli_real_escape_string($this->db,$String);
    }
    function setIsFixed($IsFixed) {
        $this->IsFixed = $IsFixed;
    }

    function setIsActive($IsActive) {
        $this->IsActive = $IsActive;
    }
    function getIsFixed() {
        return $this->IsFixed;
    }

    function getIsActive() {
        return $this->IsActive;
    }
    
    function SelectSingleRow($table, $condition, $fieldarray = "", $debug = "") {

        if ($fieldarray == "") {
            $f_list = "*";
        } else {
            $f_list = $fieldarray;
        }
        if ($condition == "") {
            $query = "SELECT $f_list FROM $table";
        } else {
            $query = "SELECT $f_list FROM $table WHERE $condition";
        }
        
        if ($debug == 1) {
            echo $query;
            exit();
        }
        $result = mysqli_query($this->db, $query);
        if (!$result)
            return 0;
        $record = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $record;
    }

    function SelectTable($table, $condition = "", $fieldarray = "", $debug = "") {
        
        $record = array();
        
        if ($fieldarray == "") {
            $f_list = "*";
        } else {
            $f_list = $fieldarray;
        }
        $query = "SELECT $f_list FROM $table";
        if (!empty($condition))
            $query .= " WHERE  $condition";
        //echo $query;
        if ($debug == 1) {
            echo $query;
        }
        $result = mysqli_query($this->db, $query);
        
        print mysqli_error($this->db);
        while ($result_row = mysqli_fetch_assoc($result)) {
            $record[] = $result_row;
        }
        mysqli_free_result($result);
        return $record;
    }

    function DeleteRecords($table, $condition) {


        $query = "DELETE FROM $table WHERE $condition";
        $result = mysqli_query($this->db, $query);
        if (is_null($result)) {
            return false;
        } else {
            return true;
        }
    }

    function InsertRecords($table, $data, $debug = "") {

        foreach ($data as $key => $value) {
            $field[] = $key;
            
            if (gettype($value) != "integer")
                $values[] = "'$value'";
            else
                $values[] = "$value";
        }
        $f_list = trim(implode(", ", $field));
        $v_list = trim(implode(", ", $values));
        $query = "INSERT INTO $table ( " . "$f_list" . " ) VALUES ( " . "$v_list" . " )";

        if ($debug == 1) {
            echo $query;
        }
        $result = mysqli_query($this->db, $query);
        if (!$result) {
            echo mysqli_error($this->db);
            return 0;
        }else{
            return true;
        }
    }

    function UpdateRecords($table, $condition, $updata, $debug = "") {

        foreach ($updata as $key => $value) {
            if ($value != "now()") {
                $fv[] = "$key = \"" . "$value" . "\"";
            } else {
                $fv[] = "$key = " . "$value" . "";
            }
        }

        $fv_list = trim(implode(", ", $fv));
        $query = "UPDATE $table SET " . "$fv_list" . " WHERE $condition";
        if ($debug == 1) {
            echo $query;
            exit();
        }
        $result = mysqli_query($this->db, $query);

        if (!mysqli_affected_rows($this->db)) {
            return 0;
        } else {
            return 1;
        }
    }
}

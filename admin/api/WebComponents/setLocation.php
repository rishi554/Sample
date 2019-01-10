<?php
require $_SERVER['DOCUMENT_ROOT'] . "/admin/lib/Config/DBOperation.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$obj = new DBOperation();
$obj->setPostdata();
$postdata = $obj->getPostdata();
if(isset($postdata) && !empty($postdata)){
    $obj->setJsonDecode($postdata);
    $request = $obj->getJsonDecode();
    $id = $request->LocationId;
    if(!isset($_SESSION['LocationId'])){
        $_SESSION['LocationId'] = LocationId(); // setting default location.
    }else if(empty($id)){
        $_SESSION['LocationId'] = LocationId(); 
    }else{
        $_SESSION['LocationId'] = $id;
    }
}
function LocationId(){
    $obj = new DBOperation();
    $DefaultLocation = $obj->SelectSingleRow("location_master ORDER BY LocationId ASC", "", '',0);
    return $DefaultLocation['LocationId'];
}


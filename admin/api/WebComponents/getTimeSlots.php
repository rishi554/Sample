<?php
require $_SERVER['DOCUMENT_ROOT'] . "/admin/lib/TimeSlots/TimeSlots.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$obj = new TimeSlots();
$obj->setPostdata();
$postdata = $obj->getPostdata();
if(isset($postdata) && !empty($postdata)){
    
    $obj->setJsonDecode($postdata);
    $request = $obj->getJsonDecode();
    $date = $request->date;
    $Today = date('m/d/Y');
    
    if($date > $Today){
        $response = $obj->SelectTable("DeliverySlots", "isActive=1", "",0);        
    }else{
        $Time = date('G:i:s');
        $response = $obj->SelectTable("DeliverySlots", "FromTIme > '$Time' AND isActive=1", "",0); 
    }
}else{
    $response['status'] = "Failed";
    $response['code'] = 401;
    $response['status'] = "Unautherised access to file.";
}
$obj->setJsonEncode($response);
echo $obj->getJsonEncode();
exit();


<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require $_SERVER['DOCUMENT_ROOT']."/admin/lib/CustomerManagement/CustomerType.php";

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
    $obj = new CustomerType();
    $result = $obj->RemoveCustType();
    return $result;
}else{
    echo "Direct access not allowed.";
}
exit();







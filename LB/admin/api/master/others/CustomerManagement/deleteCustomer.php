<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require $_SERVER['DOCUMENT_ROOT']."/admin/lib/CustomerManagement/CustomerManagement.php";

$obj = new CustomerManagement();
$result = $obj->deleteCustomer();
if(isset($result) && !empty($result)){
    echo true;
}else{
    echo false;
}
exit();
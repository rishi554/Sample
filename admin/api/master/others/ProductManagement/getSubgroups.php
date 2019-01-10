<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require $_SERVER['DOCUMENT_ROOT']."/admin/lib/ProductManagement/ProductSubgroup.php";

$obj = new ProductSubgroup();
$result = $obj->getSubgroups();
if(isset($result) && !empty($result)){
    echo $result;
}else{
    echo false;
}
exit();
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require $_SERVER['DOCUMENT_ROOT']."/admin/lib/ProductManagement/ProductTax.php";

$obj = new ProductTax();
$result = $obj->getTaxes();
if(isset($result) && !empty($result)){
    echo $result;
}else{
    echo false;
}
exit();
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require $_SERVER['DOCUMENT_ROOT']."/admin/lib/ProductManagement/ProductTax.php";

$obj = new ProductTax();
$obj->setPostdata();
$postdata = $obj->getPostdata();

if(isset($postdata) && !empty($postdata)){
    $obj->setJsonDecode($postdata);
    $request = $obj->getJsonDecode();
    $disocunt = $request->discount;
    $rate = $request->rate;
    $taxId = $request->TaxId;
    $result = $obj->getTaxAmount($disocunt,$rate,$taxId);
    echo $result;
}else{
    echo false;
}
exit();
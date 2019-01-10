<?php
require $_SERVER['DOCUMENT_ROOT'] . "/admin/lib/ProductManagement/ProductManagement.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$obj = new ProductManagement();
$obj->setPostdata();
$postdata = $obj->getPostdata();

if(isset($postdata) && !empty($postdata)){
    $obj->setJsonDecode($postdata);
    $request = $obj->getJsonDecode();
    $id = $request->mid;

    $response = $obj->SelectTable("ModifierMaster JOIN ModifierChild ON ModifierMaster.ModifierId=ModifierChild.ModifierId JOIN product_master ON product_master.productId=ModifierChild.productId LEFT JOIN tax_master ON product_master.TaxIdSale=tax_master.TaxId", "ModifierMaster.ModifierId='$id' GROUP BY product_master.productId", "product_master.productId,product_master.ProductName,product_master.MRP,product_master.BrandId,product_master.SubgroupId,product_master.UnitId,product_master.ProductDIscount,product_master.Picture1,product_master.Picture2,product_master.ProductMsg,ModifierMaster.ModifierId,ModifierMaster.ModifierName,ModifierMaster.GroupOn,ModifierMaster.IsActive,ModifierMaster.IsFixed,ModifierChild.ModifierChildId,ModifierChild.Rate,ModifierChild.Type,ModifierChild.DisplayName,ModifierChild.TaxAmount,tax_master.TaxName,tax_master.IncludedInRate,tax_master.TaxValue", 0);
    
}else{
    $response['status'] = "Failed";
    $response['code'] = "401";
    $response['message'] = "Direct access to script not allowed.";
}
$obj->setJsonEncode($response);
echo $obj->getJsonEncode();


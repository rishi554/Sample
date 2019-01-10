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
    $id = $request->pid;
    $LocationId = $_SESSION['LocationId'];
    if($id){
        $response = $obj->SelectTable("MenuChild JOIN MenuLocation ON MenuLocation.MenuId=MenuChild.MenuId JOIN product_master ON product_master.productId=MenuChild.ProductId", "product_master.SubgroupId='$id' AND MenuLocation.LocationId='$LocationId' AND product_master.IsActive=1 GROUP BY product_master.productId", "product_master.productId,product_master.ProductName,product_master.MRP,product_master.BrandId,product_master.SubgroupId,product_master.UnitId,product_master.ProductDIscount,product_master.Picture1,product_master.Picture2,product_master.ProductMsg,MenuLocation.LocationId,MenuChild.Rate,MenuChild.TaxAmount,MenuChild.ModifierId,MenuChild.DisplayName,MenuChild.ForcedQuestionId,MenuChild.FlavorsId,MenuChild.IsMultiLayered", 0);
    }else{
        $response = $obj->SelectTable("MenuChild JOIN MenuLocation ON MenuLocation.MenuId=MenuChild.MenuId JOIN product_master ON product_master.productId=MenuChild.ProductId", "MenuLocation.LocationId='$LocationId' AND product_master.IsActive=1  GROUP BY product_master.productId", "product_master.productId,product_master.ProductName,product_master.MRP,product_master.BrandId,product_master.SubgroupId,product_master.UnitId,product_master.ProductDIscount,product_master.Picture1,product_master.Picture2,product_master.ProductMsg,MenuLocation.LocationId,MenuChild.Rate,MenuChild.TaxAmount,MenuChild.ModifierId,MenuChild.DisplayName,MenuChild.ForcedQuestionId,MenuChild.FlavorsId,MenuChild.IsMultiLayered", 0);
    }
}else{
    $response['status'] = "Failed";
    $response['code'] = "401";
    $response['message'] = "Direct access to script not allowed.";
}
$obj->setJsonEncode($response);
echo $obj->getJsonEncode();





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

if (isset($postdata) && !empty($postdata)) {
    $obj->setJsonDecode($postdata);
    $request = $obj->getJsonDecode();
    $id = $request->id;
    //$id = $_POST['id'];
    $response = $obj->SelectSingleRow("MenuChild JOIN product_master ON product_master.productId=MenuChild.ProductId LEFT JOIN tax_master ON product_master.TaxIdSale=tax_master.TaxId", "product_master.productId='$id'", "product_master.productId,product_master.ProductName,product_master.MRP,product_master.BrandId,product_master.SubgroupId,product_master.UnitId,product_master.ProductDIscount,product_master.Picture1,product_master.Picture2,product_master.ProductMsg,MenuChild.Rate,MenuChild.TaxAmount,MenuChild.ModifierId,MenuChild.DisplayName,MenuChild.ForcedQuestionId,MenuChild.FlavorsId,MenuChild.IsMultiLayered,MenuChild.LayerCount,tax_master.IncludedInRate,tax_master.TaxValue", 0);
    if (count($response['productId']) > 0) {

        
        $UnitId = $response['UnitId'];
        $ForcedQuestionId = explode(',', $response['ForcedQuestionId']);
        $FlavorId = $response['FlavorsId'];
        $temp = array(); 
        foreach ($ForcedQuestionId as $fid) {
            $temp2 =$obj->SelectSingleRow("ForcedQuestionMaster", "ForcedQueId='$fid'", "", 0);
            $temp2['ChildQuestions'] = $obj->SelectTable("ForcedQuestionMaster JOIN ForcedQuestionChild ON ForcedQuestionMaster.ForcedQueId=ForcedQuestionChild.ForcedQuestionId JOIN product_master ON product_master.productId=ForcedQuestionChild.ProductId LEFT JOIN tax_master ON product_master.TaxIdSale=tax_master.TaxId", "ForcedQuestionChild.ForcedQuestionId='$fid'", "product_master.productId,product_master.ProductName,product_master.MRP,product_master.BrandId,product_master.SubgroupId,product_master.UnitId,product_master.ProductDIscount,product_master.Picture1,product_master.Picture2,product_master.ProductMsg,ForcedQuestionChild.Rate,ForcedQuestionChild.Quantity,tax_master.IncludedInRate,tax_master.TaxValue", 0);
            array_push($temp, $temp2);
        }
        $response['Questions'] = $temp;
        $response['Flavors'] = $obj->SelectSingleRow("FlavorMaster", "FlavorMasterId='$FlavorId'", "", 0);
        $response['Flavors']['ChildFlavors'] = $obj->SelectTable("FlavorMaster JOIN FlavorChild ON FlavorMaster.FlavorMasterId=FlavorChild.FlavorMasterId JOIN product_master ON product_master.productId=FlavorChild.productId LEFT JOIN tax_master ON product_master.TaxIdSale=tax_master.TaxId", "FlavorChild.FlavorMasterId='$FlavorId'", "product_master.productId,product_master.ProductName,product_master.MRP,product_master.BrandId,product_master.SubgroupId,product_master.UnitId,product_master.ProductDIscount,product_master.Picture1,product_master.Picture2,product_master.ProductMsg,FlavorChild.Rate,FlavorChild.Discription,tax_master.IncludedInRate,tax_master.TaxValue", 0);
        $response['Unit'] = $obj->SelectSingleRow("unit_master", "UnitId='$UnitId'", "", 0);
    } else {
        $response['status'] = "Failed";
        $response['code'] = 404;
        $response['message'] = "Product not found.";
    }
} else {
    $response['status'] = "Failed";
    $response['code'] = 401;
    $response['message'] = "Direct access to script not allowed.";
}
$obj->setJsonEncode($response);
echo $obj->getJsonEncode();


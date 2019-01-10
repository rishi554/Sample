<?php

require $_SERVER['DOCUMENT_ROOT'] . "/admin/lib/Orders/SalesChildModifier.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$obj = new SalesChildModifier();
$obj->setPostdata();
$postdata = $obj->getPostdata();
if (isset($postdata) && !empty($postdata)) {

    $obj->setJsonDecode($postdata);
    $request = $obj->getJsonDecode();
    $Username = $request->Username;
    //$Username = $_POST['Username'];
    $response = $obj->SelectTable("salesMaster", "Username='$Username'", "", 0);
    if (count($response) > 0) {
        $temp = array();
        foreach ($response as $main_row) {
            $main_row['ChildProduct'] = array();
            $ChildProductId = $main_row['OrderId'];
            $ChildProduct = $obj->SelectTable("salesChild", "OrderId='$ChildProductId'", '', 0);
            foreach ($ChildProduct as $child_row) {
                $ModifierId = $child_row['Id'];
                if ($child_row['IsMultiLayered'] == 1) {
                    $Layers = $obj->SelectTable("salesCustomizedCake", "OrderId='$ModifierId'", '', 0);
                    $child_row['Layers'] = $Layers;
                }
                $ModifierProduct = $obj->SelectTable("salesChildModifier", "childProductId='$ModifierId'", '', 0);
                $child_row['ModifierProduct'] = $ModifierProduct;
                array_push($main_row['ChildProduct'], $child_row);
            }
            array_push($temp, $main_row);
        }
        $response = $temp;
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
exit();



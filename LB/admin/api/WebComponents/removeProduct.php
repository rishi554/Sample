<?php
require $_SERVER['DOCUMENT_ROOT'] . "/admin/lib/Cart/Cart.php";
$obj = new Cart();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$obj->setPostdata();
$postdata = $obj->getPostdata();
if(isset($postdata) && isset($_SESSION['cart'])){
    
    $obj->setJsonDecode($postdata);
    $request = $obj->getJsonDecode();
    $id = $request->pid;
    
    foreach($_SESSION['cart'] as $key => $value){
        if($_SESSION['cart'][$key]->productId == $id){
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    echo true;
}else{
    echo false;
}


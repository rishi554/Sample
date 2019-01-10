<?php
require $_SERVER['DOCUMENT_ROOT'] . "/admin/lib/Cart/Cart.php";
$obj = new Cart();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if($_SERVER['REQUEST_METHOD'] == "GET"){
    echo $obj->getCartItems();
}


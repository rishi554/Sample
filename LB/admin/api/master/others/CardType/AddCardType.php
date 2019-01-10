<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require $_SERVER['DOCUMENT_ROOT']."/admin/lib/CardType/CardType.php";

$obj = new CardType();
$result = $obj->AddCardType();
if(isset($result) && !empty($result)){
    echo true;
}else{
    echo false;
}
exit();





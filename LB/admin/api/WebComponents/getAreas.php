<?php
require $_SERVER['DOCUMENT_ROOT'] . "/admin/lib/Area/AreaChild.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$obj = new AreaChild();
if($_SERVER['REQUEST_METHOD'] == "GET"){
    echo $obj->getAreas();
}
exit();


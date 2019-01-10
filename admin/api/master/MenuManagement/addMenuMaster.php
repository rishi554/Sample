<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require $_SERVER['DOCUMENT_ROOT']."/admin/lib/MenuManagement/MenuMaster.php";

$obj = new MenuMaster();
$result = $obj->addMenuMaster();
echo $result;
exit();





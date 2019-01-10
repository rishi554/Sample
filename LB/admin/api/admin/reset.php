<?php
require $_SERVER['DOCUMENT_ROOT']."/admin/lib/Admin/ResetAdmin.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$obj = new ResetAdmin();
$result = $obj->reset();
echo $result;
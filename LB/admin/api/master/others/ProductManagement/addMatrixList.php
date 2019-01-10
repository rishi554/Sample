<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require $_SERVER['DOCUMENT_ROOT']."/admin/lib/ProductManagement/MatrixListMaster.php";
$obj = new MatrixListMaster();
$result = $obj->addMatrixList();
echo $result;
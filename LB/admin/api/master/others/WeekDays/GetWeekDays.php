<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require $_SERVER['DOCUMENT_ROOT']."/admin/lib/WeekDays/WeekDays.php";

if(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "GET"){
    
    $obj = new WeekDays();
    $result = $obj->GetWeekDays();
    echo $result;
    
}else{
    echo false;
}
exit();





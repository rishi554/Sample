<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require $_SERVER['DOCUMENT_ROOT'] . "/admin/lib/ProductManagement/ProductGroup.php";

$obj = new ProductGroup();
$menu = "<li><a style='background-color:#84C639;color:white;cursor:pointer'>Categories</a></li><li><a ng-click='LoadProduct(0)'>All</a></li>";
$Group = $obj->SelectTable("product_group_master", "", "", 0);
$i = 1;
foreach($Group as $GroupRow){
    $id = $GroupRow['PGroupMId'];
    $result = $obj->SelectSingleRow("product_group_master JOIN product_subgroup_master ON product_group_master.PGroupMId=product_subgroup_master.PGroupId", "product_subgroup_master.PGroupId = '$id'", "", 0);
    if(count($result['PGroupMId']) <= 0){
        $RightArrow = "";
        $Method = "ng-click='LoadProduct(".$GroupRow['PGroupMId'].")'";
    }else{
        $RightArrow = "&nbsp;<span class='caret'></span>";
        $Method = "";
    }
    $menu .= "<li><a ".$Method." tabindex='-1' class='collapse' data-toggle='collapse' data-target='#".$i."'>" . $GroupRow['PGroupMName'] . "".$RightArrow."</a>"
            . "<div class='collapse' id='".$i."'>";
    $menu .= "<ul class='nav navbar-nav nav_1'>" . get_menu_tree(0,$GroupRow['PGroupMId']) . "</ul>"; //call  recursively
    $menu .= "</div></li>";
    $i++;
}
echo $menu;

function get_menu_tree($parent_id,$GroupId) {
    $obj1 = new ProductGroup();
    $result = $obj1->SelectTable("product_subgroup_master", "PGroupId='$GroupId' AND ParentId='$parent_id' ", "", 0);
    foreach ($result as $row) {
        $id = $row['PSubGroupId'];
        $result = $obj1->SelectSingleRow("product_subgroup_master", "ParentId='$id' ", "", 0);
        if(count($result['PSubGroupId']) > 0){
            $RightA= "&nbsp;<span class='caret'></span>";
            $Method ="";
        }else{
            $RightA= "";
            $Method = "ng-click='LoadProduct(".$row['PSubGroupId'].")'";
        }
        $k = rand();
        $menu .= "<li ".$Method."><a tabindex='-1' class='collapse' data-toggle='collapse' data-target='#".$k."'>" . $row['ProductSubGroupName'] . "".$RightA."</a>"
                . "<div class='collapse' id='".$k."'>";
        $menu .= "<ul class='nav navbar-nav nav_1'>" . get_menu_tree($row['PSubGroupId'],$GroupId) . "</ul>"; //call  recursively
        $menu .= "</div></li>";
    }
    return $menu;
}

<?php
require __DIR__ . '/../MenuManagement/FlavorMaster.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlavorChild
 *
 * @author PHP Developers
 */
class FlavorChild extends FlavorMaster {

    private $FlavorMasterId;
    private $productId;
    private $Rate;
    private $Discription;

    public function __construct() {
        parent::__construct();
    }

    function getFlavorMasterId() {
        return $this->FlavorMasterId;
    }

    function getProductId() {
        return $this->productId;
    }

    function getRate() {
        return $this->Rate;
    }

    function getDiscription() {
        return $this->Discription;
    }

    function setFlavorMasterId($FlavorMasterId) {
        $this->FlavorMasterId = $FlavorMasterId;
    }

    function setProductId($productId) {
        $this->productId = $productId;
    }

    function setRate($Rate) {
        $this->Rate = $Rate;
    }

    function setDiscription($Discription) {
        $this->Discription = $Discription;
    }

    function getFlavorsChild() {
        $this->setJsonEncode($this->SelectTable("FlavorChild", "", "", 0));
        return $this->getJsonEncode();
    }

    function deleteFlavorChild() {

        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FlavorChildFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("FlavorChild", "FlavorChildId='$id'");
    }

    function addFlavorChild() {

        $obj = new Tax();
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FlavorChildFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();

        $this->setProductId($request->ProductId);
        $this->setRate($request->Rate);
        $this->setFlavorMasterId($request->FlavorId);
        $this->setDiscription($request->Description);

        $FlavorId = $this->getEscapString($this->getFlavorMasterId());
        $ProductId = $this->getEscapString($this->getProductId());
        $Rate = $this->getEscapString($this->getRate());

        $Tax = $this->SelectSingleRow("product_master JOIN tax_master ON product_master.TaxIdSale=tax_master.TaxId", "product_master.productId='$ProductId'", 'product_master.productId,product_master.TaxIdSale,product_master.ProductName,product_master.ProductDIscount', 0);
        $TaxAmount = $this->getTaxAmount($Tax['ProductDIscount'], $Rate, $Tax['TaxIdSale']);
        $FlavorChildTable = "FlavorChild";
        $FlavorChildData = array('FlavorMasterId' => $FlavorId, 'productId' => $ProductId, 'Rate' => $Rate, 'TaxAmount' => $TaxAmount, 'Discription' => $this->getEscapString($this->getDiscription()));

        $FlavorChildCondition = "FlavorMasterId='$FlavorId' AND productId='$ProductId'";
        $Exists = $this->SelectSingleRow($FlavorChildTable, $FlavorChildCondition, '', 0);
        if (count($Exists['FlavorChildId']) > 0) {
            return 0;
        } else {
            $this->InsertRecords($FlavorChildTable, $FlavorChildData, 0);
            return 1;
        }
    }

    function ExclusiveTax($Rate, $taxValue) {
        $temp = ($Rate * 100) / ($taxValue + 100);
        $TaxAmount = $Rate - $temp;
        return $TaxAmount;
    }

    function InclusiveTax($Rate, $taxValue) {
        $TaxAmount = $Rate * $taxValue / 100;
        return $TaxAmount;
    }

    function getTaxAmount($disocunt, $rate, $taxId) {
        $Tax = $this->getTax($taxId);
        if ($Tax['IncludedInRate'] == 0) { // For Exclusive tax 
            if ($Tax['CalMethod	'] == 0) {
                $r = $rate - $disocunt;
                //Tax amount after discount
                $amount = $this->ExclusiveTax($r, $Tax['TaxValue']);
            } else {
                //Tax amount before discount
                $r = $this->ExclusiveTax($rate, $Tax['TaxValue']);
                $amount = $r - $disocunt;
            }
        } else { // For Inclusive tax 
            if ($Tax['CalMethod'] == 0) {
                $r = $rate - $disocunt;
                //Tax amount after discount
                $amount = $this->InclusiveTax($r, $Tax['TaxValue']);
            } else {
                //Tax amount before discount
                $r = $this->InclusiveTax($rate, $Tax['TaxValue']);
                $amount = $r - $disocunt;
            }
        }
        return $amount;
    }

    function getTax($id) {
        return $this->SelectSingleRow("tax_master", "TaxId='$id'", "", 0);
    }

}

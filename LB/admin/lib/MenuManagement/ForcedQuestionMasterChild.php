<?php

require __DIR__ . '/../MenuManagement/ForcedQuestionMaster.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ForcedQuestionMasterChild
 *
 * @author PHP Developers
 */
class ForcedQuestionMasterChild extends ForcedQuestionMaster {

    private $ForcedQuestionId;
    private $ProductId;
    private $Rate;
    private $Quantity;

    public function __construct() {
        parent::__construct();
    }

    function getForcedQuestionId() {
        return $this->ForcedQuestionId;
    }

    function getProductId() {
        return $this->ProductId;
    }

    function getRate() {
        return $this->Rate;
    }

    function getQuantity() {
        return $this->Quantity;
    }

    function setForcedQuestionId($ForcedQuestionId) {
        $this->ForcedQuestionId = $ForcedQuestionId;
    }

    function setProductId($ProductId) {
        $this->ProductId = $ProductId;
    }

    function setRate($Rate) {
        $this->Rate = $Rate;
    }

    function setQuantity($Quantity) {
        $this->Quantity = $Quantity;
    }

    function getForcedQuestionsChild() {
        $this->setJsonEncode($this->SelectTable("ForcedQuestionChild", "", "", 0));
        return $this->getJsonEncode();
    }

    function deleteForcedQuestionsChild() {

        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ForcedQuestionChildFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("ForcedQuestionChild", "ForcedQueChildId='$id'");
    }

    function addForcedQuestionChild() {


        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ForcedQuestionChildFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();

        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setProductId($request->ProductId);
        $this->setRate($request->Rate);
        $this->setQuantity($request->Quantity);
        $this->setForcedQuestionId($request->ForcedQuestionId);

        $ForcedQuestionId = $this->getEscapString($this->getForcedQuestionId());
        $ProductId = $this->getEscapString($this->getProductId());
        $Rate = $this->getEscapString($this->getRate());
        $Quantity = $this->getEscapString($this->getQuantity());

        $Tax = $this->SelectSingleRow("product_master JOIN tax_master ON product_master.TaxIdSale=tax_master.TaxId", "product_master.productId='$ProductId'", 'product_master.productId,product_master.TaxIdSale,product_master.ProductName,product_master.ProductDIscount', 0);
        $TaxAmount = $this->getTaxAmount($Tax['ProductDIscount'], $Rate, $Tax['TaxIdSale']);

        $ForcedQuestionTable = "ForcedQuestionChild";
        $ForcedQuestionData = array('ForcedQuestionId' => $ForcedQuestionId, 'ProductId' => $ProductId, 'Rate' => $Rate, 'TaxAmount' => $TaxAmount, 'Quantity' => $Quantity);

        $ForcedQuestionCondition = "ForcedQuestionId='$ForcedQuestionId' AND ProductId='$ProductId'";
        $Exists = $this->SelectSingleRow($ForcedQuestionTable, $ForcedQuestionCondition, '', 0);
        if (count($Exists['ForcedQueChildId']) > 0) {
            return 0;
        } else {
            $this->InsertRecords($ForcedQuestionTable, $ForcedQuestionData, 0);
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

<?php

require __DIR__ . '/../ProductManagement/ProductSubgroup.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductTax
 *
 * @author PHP Developers
 */
class ProductTax extends ProductSubgroup {

    private $TaxName;
    private $IncludedInRate;
    private $TaxValue;
    private $CalMethod;

    public function __construct() {
        parent::__construct();
    }

    function getTaxName() {
        return $this->TaxName;
    }

    function getIncludedInRate() {
        return $this->IncludedInRate;
    }

    function getTaxValue() {
        return $this->TaxValue;
    }

    function getCalMethod() {
        return $this->CalMethod;
    }

    function setTaxName($TaxName) {
        $this->TaxName = $TaxName;
    }

    function setIncludedInRate($IncludedInRate) {
        $this->IncludedInRate = $IncludedInRate;
    }

    function setTaxValue($TaxValue) {
        $this->TaxValue = $TaxValue;
    }

    function setCalMethod($CalMethod) {
        $this->CalMethod = $CalMethod;
    }

    function getTaxes() {
        $this->setJsonEncode($this->SelectTable("tax_master", "", "", 0));
        return $this->getJsonEncode();
    }

    function deleteTax() {

        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->TaxFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("tax_master", "TaxId='$id'");
    }

    public function existTax($name) {

        $Exists = $this->SelectSingleRow("tax_master", "TaxName = '$name'", '', 0);
        if (count($Exists['TaxName']) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addTax() {

        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->TaxFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();

        $this->setIsActive(1);
        $this->setIsFixed(1);
        $this->setCalMethod($request->CalMethod);
        $this->setTaxValue($request->TaxValue);
        $this->setIncludedInRate($request->IncludedInRate);
        $TaxName = $this->getTaxName($this->getEscapString($this->setTaxName($request->TaxName)));

        $TaxTable = "tax_master";
        $TaxData = array('TaxName' => $TaxName, 'IncludedInRate' => intval($this->getEscapString($this->getCalMethod())), 'TaxValue' => $this->getEscapString($this->getTaxValue()), 'CalMethod' => $this->getEscapString($this->getIncludedInRate()), 'IsActive' => intval($this->getEscapString($this->getIsActive())), 'IsFixed' => intval($this->getEscapString($this->getIsFixed())));
        $Exists = $this->SelectSingleRow($TaxTable, "TaxName = '$TaxName'", '', 0);
        if (count($Exists['TaxName']) > 0) {
            return 0;
        } else {
            $this->InsertRecords($TaxTable, $TaxData, 0);
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

<?php

require 'City.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocationMaster
 *
 * @author PHP Developers
 */
class LocationMaster extends City {

    private $LocationName;
    private $ComapnyName;
    private $LocationCode;
    private $CurrencyId;
    private $RegionId;
    private $FinancialYear;
    private $BookBegin;
    private $Address1;
    private $Address2;
    private $Address3;
    private $Region;
    private $Pincode;
    private $Phone;
    private $Email;
    private $Website;
    private $Remark;
    private $PanNo;
    private $CstNo;
    private $VatNo;
    private $ServiceTaxNo;
    private $SetLinkInfo;
    private $MethodOfLink;
    private $TimeInterval;
    private $EmailAddress;
    private $EmailPassword;
    private $ExportFolder;
    private $ImportFolder;
    private $Target;
    private $Area;
    private $Staff;
    private $Team;
    private $CityId;

    public function __construct() {
        parent::__construct();
    }

    function getLocationName() {
        return $this->LocationName;
    }

    function getComapnyName() {
        return $this->ComapnyName;
    }

    function getLocationCode() {
        return $this->LocationCode;
    }

    function getCurrencyId() {
        return $this->CurrencyId;
    }

    function getRegionId() {
        return $this->RegionId;
    }

    function getFinancialYear() {
        return $this->FinancialYear;
    }

    function getBookBegin() {
        return $this->BookBegin;
    }

    function getAddress1() {
        return $this->Address1;
    }

    function getAddress2() {
        return $this->Address2;
    }

    function getAddress3() {
        return $this->Address3;
    }

    function getRegion() {
        return $this->Region;
    }

    function getPincode() {
        return $this->Pincode;
    }

    function getPhone() {
        return $this->Phone;
    }

    function getEmail() {
        return $this->Email;
    }

    function getWebsite() {
        return $this->Website;
    }

    function getRemark() {
        return $this->Remark;
    }

    function getPanNo() {
        return $this->PanNo;
    }

    function getCstNo() {
        return $this->CstNo;
    }

    function getVatNo() {
        return $this->VatNo;
    }

    function getServiceTaxNo() {
        return $this->ServiceTaxNo;
    }

    function getSetLinkInfo() {
        return $this->SetLinkInfo;
    }

    function getMethodOfLink() {
        return $this->MethodOfLink;
    }

    function getTimeInterval() {
        return $this->TimeInterval;
    }

    function getEmailAddress() {
        return $this->EmailAddress;
    }

    function getEmailPassword() {
        return $this->EmailPassword;
    }

    function getExportFolder() {
        return $this->ExportFolder;
    }

    function getImportFolder() {
        return $this->ImportFolder;
    }

    function getTarget() {
        return $this->Target;
    }

    function getArea() {
        return $this->Area;
    }

    function getStaff() {
        return $this->Staff;
    }

    function getTeam() {
        return $this->Team;
    }

    function setLocationName($LocationName) {
        $this->LocationName = $LocationName;
    }

    function setComapnyName($ComapnyName) {
        $this->ComapnyName = $ComapnyName;
    }

    function setLocationCode($LocationCode) {
        $this->LocationCode = $LocationCode;
    }

    function setCurrencyId($CurrencyId) {
        $this->CurrencyId = $CurrencyId;
    }

    function setRegionId($RegionId) {
        $this->RegionId = $RegionId;
    }

    function setFinancialYear($FinancialYear) {
        $this->FinancialYear = $FinancialYear;
    }

    function setBookBegin($BookBegin) {
        $this->BookBegin = $BookBegin;
    }

    function setAddress1($Address1) {
        $this->Address1 = $Address1;
    }

    function setAddress2($Address2) {
        $this->Address2 = $Address2;
    }

    function setAddress3($Address3) {
        $this->Address3 = $Address3;
    }

    function setRegion($Region) {
        $this->Region = $Region;
    }

    function setPincode($Pincode) {
        $this->Pincode = $Pincode;
    }

    function setPhone($Phone) {
        $this->Phone = $Phone;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setWebsite($Website) {
        $this->Website = $Website;
    }

    function setRemark($Remark) {
        $this->Remark = $Remark;
    }

    function setPanNo($PanNo) {
        $this->PanNo = $PanNo;
    }

    function setCstNo($CstNo) {
        $this->CstNo = $CstNo;
    }

    function setVatNo($VatNo) {
        $this->VatNo = $VatNo;
    }

    function setServiceTaxNo($ServiceTaxNo) {
        $this->ServiceTaxNo = $ServiceTaxNo;
    }

    function setSetLinkInfo($SetLinkInfo) {
        $this->SetLinkInfo = $SetLinkInfo;
    }

    function setMethodOfLink($MethodOfLink) {
        $this->MethodOfLink = $MethodOfLink;
    }

    function setTimeInterval($TimeInterval) {
        $this->TimeInterval = $TimeInterval;
    }

    function setEmailAddress($EmailAddress) {
        $this->EmailAddress = $EmailAddress;
    }

    function setEmailPassword($EmailPassword) {
        $this->EmailPassword = $EmailPassword;
    }

    function setExportFolder($ExportFolder) {
        $this->ExportFolder = $ExportFolder;
    }

    function setImportFolder($ImportFolder) {
        $this->ImportFolder = $ImportFolder;
    }

    function setTarget($Target) {
        $this->Target = $Target;
    }

    function setArea($Area) {
        $this->Area = $Area;
    }

    function setStaff($Staff) {
        $this->Staff = $Staff;
    }

    function setTeam($Team) {
        $this->Team = $Team;
    }

    function getCityId() {
        return $this->CityId;
    }

    function setCityId($CityId) {
        $this->CityId = $CityId;
    }

    function AddLocationMaster() {

        $this->setPostdata();
        $postdata = $this->getPostdata();

        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();

        $this->setLocationName($this->getEscapString($request->LocationName));
        $this->setComapnyName($this->getEscapString($request->ComapnyName));
        $this->setLocationCode($this->getEscapString($request->LocationCode));
        $this->setCurrencyId($this->getEscapString($request->CurrencyId));
        $this->setRegionId($this->getEscapString($request->RegionId));
        $this->setFinancialYear($this->getEscapString($request->FinancialYear));
        $this->setBookBegin($this->getEscapString($request->BookBegin));
        $this->setAddress1($this->getEscapString($request->Address1));
        $this->setAddress2($this->getEscapString($request->Address2));
        $this->setAddress3($this->getEscapString($request->Address3));
        $this->setCityId($this->getEscapString($request->LocCityId));
        $this->setStateId($this->getEscapString($request->LocStateId));
        $this->setCountryId($this->getEscapString($request->LocCountryId));
        $this->setPincode($this->getEscapString($request->Pincode));
        $this->setPhone($this->getEscapString($request->Phone));
        $this->setEmail($this->getEscapString($request->Email));
        $this->setWebsite($this->getEscapString($request->Website));
        $this->setRemark($this->getEscapString($request->Remark));
        $this->setPanNo($this->getEscapString($request->PanNo));
        $this->setCstNo($this->getEscapString($request->CstNo));
        $this->setVatNo($this->getEscapString($request->VatNo));
        $this->setServiceTaxNo($this->getEscapString($request->ServiceTaxNo));
        $this->setSetLinkInfo($this->getEscapString($request->SetLinkInfo));
        $this->setMethodOfLink($this->getEscapString($request->MethodOfLink));
        $this->setEmailAddress($this->getEscapString($request->EmailAddress));
        $this->setEmailPassword($this->getEscapString($request->EmailPassword));
        $this->setExportFolder($this->getEscapString($request->ExportFolder));
        $this->setImportFolder($this->getEscapString($request->ImportFolder));
        $this->setTarget($this->getEscapString($request->Target));
        $this->setArea($this->getEscapString($request->Area));
        $this->setStaff($this->getEscapString($request->Staff));
        $this->setTeam($this->getEscapString(implode(',', $request->MenuTeamId)));
        $this->setIsActive($this->getEscapString(1));
        $this->setIsFixed($this->getEscapString(1));

        $LocationName = $this->getLocationName();
        $LocationMasterData = array('LocationName' => $LocationName, 'ComapnyName' => $this->getComapnyName(), 'LocationCode' => $this->getLocationCode(), 'CurrencyId' => $this->getCurrencyId(), 'RegionId' => $this->getRegionId(), 'FinancialYear' => $this->getFinancialYear(), 'BookBegin' => $this->getBookBegin(), 'Address1' => $this->getAddress1(), 'Address2' => $this->getAddress2(), 'Address3' => $this->getAddress1(), 'CityId' => $this->getCityId(), 'StateId' => $this->getStateId(), 'Region' => $this->getRegion(), 'CountryId' => $this->getCountryId(), 'Pincode' => $this->getPincode(), 'Phone' => $this->getPhone(), 'Email' => $this->getEmail(), 'Website' => $this->getWebsite(), 'Remark' => $this->getRemark(), 'PanNo' => $this->getPanNo(), 'CstNo' => $this->getCstNo(), 'VatNo' => $this->getVatNo(), 'ServiceTaxNo' => $this->getServiceTaxNo(), 'IsActive' => $this->getIsActive(), 'SetLinkInfo' => $this->getSetLinkInfo(), 'MethodOfLink' => $this->getMethodOfLink(), 'EmailAddress' => $this->getEmailAddress(), 'EmailPassword' => $this->getEmailPassword(), 'ExportFolder' => $this->getExportFolder(), 'ImportFolder' => $this->getImportFolder(), 'IsFixed' => $this->getIsFixed(), 'Target' => $this->getTarget(), 'Area' => $this->getArea(), 'Staff' => $this->getStaff(), 'Team' => $this->getTeam());
        $LocationMasterTable = "location_master";
        $LocationMasterCondition = "LocationName='$LocationName'";
        $LocationMasterArray = "";

        $result = $this->SelectSingleRow($LocationMasterTable, $LocationMasterCondition, $LocationMasterArray, 0);
        if (count($result['LocationId']) > 0) {
            return 0;
        } else {
            $this->InsertRecords($LocationMasterTable, $LocationMasterData, 0);
            return 1;
        }
    }
    function getMainLocations() {
        $this->setJsonEncode($this->SelectTable("location_master", "", "LocationId,LocationName",0));
        return $this->getJsonEncode();
    }

}

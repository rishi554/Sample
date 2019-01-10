<?php
require __DIR__.'/../ProductManagement/ProductItemType.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductManagement
 *
 * @author PHP Developers
 */
class ProductManagement extends ProductItemType{
    
    private $ProductName;
    private $PrintName;
    private $UPCEAN;
    private $UserDefinedCode;
    private $MRP;
    private $BrandId;
    private $SubgroupId;
    private $ProductGroupId;
    private $DepartmentId;
    private $UnitId;
    private $BinLocation;
    private $MatrixId;
    private $EvalCount;
    private $TaxIdPurchase;
    private $TaxIdSale;
    private $PrintBarcode;
    private $AskRate;
    private $UseFifo;
    private $ProductMsg;
    private $QuantityOnHand;
    private $ReorderInfo;
    private $ReorderLevel;
    private $SafetyLevel;
    private $ReorderQty;
    private $MinimumOrderQty;
    private $StandardSalePrice;
    private $StandardCostPrice;
    private $ProductDIscount;
    private $AllowOperatorDiscount;
    private $ProductRemark;
    private $Picture1;
    private $Picture2;
    private $RecipeComponents;
    private $RecordDateTime;
    private $CompanyId;
    private $SessionId;
    private $AlternateUnitId;
    private $ChangeConversion;
    private $ItemType;
    private $WeighingScaleExport;
    private $WeighingScaleConversion;
    private $GenerateProduction;
    private $PrintNameOther;
    private $GenerateProductChild;
    private $CoupanFile;
    private $SpCommPercent;
    private $SpCommAmt;
    private $SchemeIds;
    private $PMField1;
    private $PMField2;
    private $PMField3;
    private $PMField4;
    private $PMField5;
    private $CalNetWeight;
    private $BarcodeRatio;
    private $Link;
    private $AskQuantity;
    private $AskContainer;
    private $ServiceItem;
    private $Rate;
    private $Prediocity;
    private $UPCEAN1;
    private $UPCEAN2;
    private $UPCEAN3;
    private $TeamId;
    private $ChangeContainerWeight;
    private $SaleActId;
    private $SaleReturnActId;
    private $PurchaseActId;
    private $PurchaseReturnActId;
    private $TaxableValue;
    private $LogUser;
    private $LogLocation;
    private $LogSession;
    private $WebGroupId;
    private $WebSubGroupId;
    private $WebItemName;
    private $IsRecommended;
    private $FoodType;
    private $Spicelevel;
    private $WebProductName;
    private $COnvertProductId;
    private $COnvertQty;
    private $layerCount;
    
    public function __construct() {
        parent::__construct();
    }
    
    function getProductName() {
        return $this->ProductName;
    }

    function getPrintName() {
        return $this->PrintName;
    }

    function getUPCEAN() {
        return $this->UPCEAN;
    }

    function getUserDefinedCode() {
        return $this->UserDefinedCode;
    }

    function getMRP() {
        return $this->MRP;
    }

    function getBrandId() {
        return $this->BrandId;
    }

    function getSubgroupId() {
        return $this->SubgroupId;
    }

    function getProductGroupId() {
        return $this->ProductGroupId;
    }

    function getUnitId() {
        return $this->UnitId;
    }

    function getBinLocation() {
        return $this->BinLocation;
    }

    function getMatrixId() {
        return $this->MatrixId;
    }

    function getEvalCount() {
        return $this->EvalCount;
    }

    function getTaxIdPurchase() {
        return $this->TaxIdPurchase;
    }

    function getTaxIdSale() {
        return $this->TaxIdSale;
    }

    function getPrintBarcode() {
        return $this->PrintBarcode;
    }

    function getAskRate() {
        return $this->AskRate;
    }

    function getUseFifo() {
        return $this->UseFifo;
    }

    function getProductMsg() {
        return $this->ProductMsg;
    }

    function getQuantityOnHand() {
        return $this->QuantityOnHand;
    }

    function getReorderInfo() {
        return $this->ReorderInfo;
    }

    function getReorderLevel() {
        return $this->ReorderLevel;
    }

    function getSafetyLevel() {
        return $this->SafetyLevel;
    }

    function getReorderQty() {
        return $this->ReorderQty;
    }

    function getMinimumOrderQty() {
        return $this->MinimumOrderQty;
    }

    function getStandardSalePrice() {
        return $this->StandardSalePrice;
    }

    function getStandardCostPrice() {
        return $this->StandardCostPrice;
    }

    function getProductDIscount() {
        return $this->ProductDIscount;
    }

    function getAllowOperatorDiscount() {
        return $this->AllowOperatorDiscount;
    }

    function getProductRemark() {
        return $this->ProductRemark;
    }

    function getPicture1() {
        return $this->Picture1;
    }

    function getPicture2() {
        return $this->Picture2;
    }

    function getRecipeComponents() {
        return $this->RecipeComponents;
    }

    function getRecordDateTime() {
        return $this->RecordDateTime;
    }

    function getCompanyId() {
        return $this->CompanyId;
    }

    function getSessionId() {
        return $this->SessionId;
    }

    function getAlternateUnitId() {
        return $this->AlternateUnitId;
    }

    function getChangeConversion() {
        return $this->ChangeConversion;
    }

    function getItemType() {
        return $this->ItemType;
    }

    function getWeighingScaleExport() {
        return $this->WeighingScaleExport;
    }

    function getWeighingScaleConversion() {
        return $this->WeighingScaleConversion;
    }

    function getGenerateProduction() {
        return $this->GenerateProduction;
    }

    function getPrintNameOther() {
        return $this->PrintNameOther;
    }

    function getGenerateProductChild() {
        return $this->GenerateProductChild;
    }

    function getCoupanFile() {
        return $this->CoupanFile;
    }

    function getSpCommPercent() {
        return $this->SpCommPercent;
    }

    function getSpCommAmt() {
        return $this->SpCommAmt;
    }

    function getSchemeIds() {
        return $this->SchemeIds;
    }

    function getPMField1() {
        return $this->PMField1;
    }

    function getPMField2() {
        return $this->PMField2;
    }

    function getPMField3() {
        return $this->PMField3;
    }

    function getPMField4() {
        return $this->PMField4;
    }

    function getPMField5() {
        return $this->PMField5;
    }

    function getCalNetWeight() {
        return $this->CalNetWeight;
    }

    function getBarcodeRatio() {
        return $this->BarcodeRatio;
    }

    function getLink() {
        return $this->Link;
    }

    function getAskQuantity() {
        return $this->AskQuantity;
    }

    function getAskContainer() {
        return $this->AskContainer;
    }

    function getServiceItem() {
        return $this->ServiceItem;
    }

    function getRate() {
        return $this->Rate;
    }

    function getPrediocity() {
        return $this->Prediocity;
    }

    function getUPCEAN1() {
        return $this->UPCEAN1;
    }

    function getUPCEAN2() {
        return $this->UPCEAN2;
    }

    function getUPCEAN3() {
        return $this->UPCEAN3;
    }

    function getTeamId() {
        return $this->TeamId;
    }

    function getChangeContainerWeight() {
        return $this->ChangeContainerWeight;
    }

    function getSaleActId() {
        return $this->SaleActId;
    }

    function getSaleReturnActId() {
        return $this->SaleReturnActId;
    }

    function getPurchaseActId() {
        return $this->PurchaseActId;
    }

    function getPurchaseReturnActId() {
        return $this->PurchaseReturnActId;
    }

    function getTaxableValue() {
        return $this->TaxableValue;
    }

    function getLogUser() {
        return $this->LogUser;
    }

    function getLogLocation() {
        return $this->LogLocation;
    }

    function getLogSession() {
        return $this->LogSession;
    }

    function getWebGroupId() {
        return $this->WebGroupId;
    }

    function getWebSubGroupId() {
        return $this->WebSubGroupId;
    }

    function getWebItemName() {
        return $this->WebItemName;
    }

    function getIsRecommended() {
        return $this->IsRecommended;
    }

    function getFoodType() {
        return $this->FoodType;
    }

    function getSpicelevel() {
        return $this->Spicelevel;
    }

    function getWebProductName() {
        return $this->WebProductName;
    }

    function getCOnvertProductId() {
        return $this->COnvertProductId;
    }

    function getCOnvertQty() {
        return $this->COnvertQty;
    }

    function setProductName($ProductName) {
        $this->ProductName = $ProductName;
    }

    function setPrintName($PrintName) {
        $this->PrintName = $PrintName;
    }

    function setUPCEAN($UPCEAN) {
        $this->UPCEAN = $UPCEAN;
    }

    function setUserDefinedCode($UserDefinedCode) {
        $this->UserDefinedCode = $UserDefinedCode;
    }

    function setMRP($MRP) {
        $this->MRP = $MRP;
    }

    function setBrandId($BrandId) {
        $this->BrandId = $BrandId;
    }

    function setSubgroupId($SubgroupId) {
        $this->SubgroupId = $SubgroupId;
    }

    function setProductGroupId($ProductGroupId) {
        $this->ProductGroupId = $ProductGroupId;
    }

    function setUnitId($UnitId) {
        $this->UnitId = $UnitId;
    }

    function setBinLocation($BinLocation) {
        $this->BinLocation = $BinLocation;
    }

    function setMatrixId($MatrixId) {
        $this->MatrixId = $MatrixId;
    }

    function setEvalCount($EvalCount) {
        $this->EvalCount = $EvalCount;
    }

    function setTaxIdPurchase($TaxIdPurchase) {
        $this->TaxIdPurchase = $TaxIdPurchase;
    }

    function setTaxIdSale($TaxIdSale) {
        $this->TaxIdSale = $TaxIdSale;
    }

    function setPrintBarcode($PrintBarcode) {
        $this->PrintBarcode = $PrintBarcode;
    }

    function setAskRate($AskRate) {
        $this->AskRate = $AskRate;
    }

    function setUseFifo($UseFifo) {
        $this->UseFifo = $UseFifo;
    }

    function setProductMsg($ProductMsg) {
        $this->ProductMsg = $ProductMsg;
    }

    function setQuantityOnHand($QuantityOnHand) {
        $this->QuantityOnHand = $QuantityOnHand;
    }

    function setReorderInfo($ReorderInfo) {
        $this->ReorderInfo = $ReorderInfo;
    }

    function setReorderLevel($ReorderLevel) {
        $this->ReorderLevel = $ReorderLevel;
    }

    function setSafetyLevel($SafetyLevel) {
        $this->SafetyLevel = $SafetyLevel;
    }

    function setReorderQty($ReorderQty) {
        $this->ReorderQty = $ReorderQty;
    }

    function setMinimumOrderQty($MinimumOrderQty) {
        $this->MinimumOrderQty = $MinimumOrderQty;
    }

    function setStandardSalePrice($StandardSalePrice) {
        $this->StandardSalePrice = $StandardSalePrice;
    }

    function setStandardCostPrice($StandardCostPrice) {
        $this->StandardCostPrice = $StandardCostPrice;
    }

    function setProductDIscount($ProductDIscount) {
        $this->ProductDIscount = $ProductDIscount;
    }

    function setAllowOperatorDiscount($AllowOperatorDiscount) {
        $this->AllowOperatorDiscount = $AllowOperatorDiscount;
    }

    function setProductRemark($ProductRemark) {
        $this->ProductRemark = $ProductRemark;
    }

    function setPicture1($Picture1) {
        $this->Picture1 = $Picture1;
    }

    function setPicture2($Picture2) {
        $this->Picture2 = $Picture2;
    }

    function setRecipeComponents($RecipeComponents) {
        $this->RecipeComponents = $RecipeComponents;
    }

    function setRecordDateTime($RecordDateTime) {
        $this->RecordDateTime = $RecordDateTime;
    }

    function setCompanyId($CompanyId) {
        $this->CompanyId = $CompanyId;
    }

    function setSessionId($SessionId) {
        $this->SessionId = $SessionId;
    }

    function setAlternateUnitId($AlternateUnitId) {
        $this->AlternateUnitId = $AlternateUnitId;
    }

    function setChangeConversion($ChangeConversion) {
        $this->ChangeConversion = $ChangeConversion;
    }

    function setItemType($ItemType) {
        $this->ItemType = $ItemType;
    }

    function setWeighingScaleExport($WeighingScaleExport) {
        $this->WeighingScaleExport = $WeighingScaleExport;
    }

    function setWeighingScaleConversion($WeighingScaleConversion) {
        $this->WeighingScaleConversion = $WeighingScaleConversion;
    }

    function setGenerateProduction($GenerateProduction) {
        $this->GenerateProduction = $GenerateProduction;
    }

    function setPrintNameOther($PrintNameOther) {
        $this->PrintNameOther = $PrintNameOther;
    }

    function setGenerateProductChild($GenerateProductChild) {
        $this->GenerateProductChild = $GenerateProductChild;
    }

    function setCoupanFile($CoupanFile) {
        $this->CoupanFile = $CoupanFile;
    }

    function setSpCommPercent($SpCommPercent) {
        $this->SpCommPercent = $SpCommPercent;
    }

    function setSpCommAmt($SpCommAmt) {
        $this->SpCommAmt = $SpCommAmt;
    }

    function setSchemeIds($SchemeIds) {
        $this->SchemeIds = $SchemeIds;
    }

    function setPMField1($PMField1) {
        $this->PMField1 = $PMField1;
    }

    function setPMField2($PMField2) {
        $this->PMField2 = $PMField2;
    }

    function setPMField3($PMField3) {
        $this->PMField3 = $PMField3;
    }

    function setPMField4($PMField4) {
        $this->PMField4 = $PMField4;
    }

    function setPMField5($PMField5) {
        $this->PMField5 = $PMField5;
    }

    function setCalNetWeight($CalNetWeight) {
        $this->CalNetWeight = $CalNetWeight;
    }

    function setBarcodeRatio($BarcodeRatio) {
        $this->BarcodeRatio = $BarcodeRatio;
    }

    function setLink($Link) {
        $this->Link = $Link;
    }

    function setAskQuantity($AskQuantity) {
        $this->AskQuantity = $AskQuantity;
    }

    function setAskContainer($AskContainer) {
        $this->AskContainer = $AskContainer;
    }

    function setServiceItem($ServiceItem) {
        $this->ServiceItem = $ServiceItem;
    }

    function setRate($Rate) {
        $this->Rate = $Rate;
    }

    function setPrediocity($Prediocity) {
        $this->Prediocity = $Prediocity;
    }

    function setUPCEAN1($UPCEAN1) {
        $this->UPCEAN1 = $UPCEAN1;
    }

    function setUPCEAN2($UPCEAN2) {
        $this->UPCEAN2 = $UPCEAN2;
    }

    function setUPCEAN3($UPCEAN3) {
        $this->UPCEAN3 = $UPCEAN3;
    }

    function setTeamId($TeamId) {
        $this->TeamId = $TeamId;
    }

    function setChangeContainerWeight($ChangeContainerWeight) {
        $this->ChangeContainerWeight = $ChangeContainerWeight;
    }

    function setSaleActId($SaleActId) {
        $this->SaleActId = $SaleActId;
    }

    function setSaleReturnActId($SaleReturnActId) {
        $this->SaleReturnActId = $SaleReturnActId;
    }

    function setPurchaseActId($PurchaseActId) {
        $this->PurchaseActId = $PurchaseActId;
    }

    function setPurchaseReturnActId($PurchaseReturnActId) {
        $this->PurchaseReturnActId = $PurchaseReturnActId;
    }

    function setTaxableValue($TaxableValue) {
        $this->TaxableValue = $TaxableValue;
    }

    function setLogUser($LogUser) {
        $this->LogUser = $LogUser;
    }

    function setLogLocation($LogLocation) {
        $this->LogLocation = $LogLocation;
    }

    function setLogSession($LogSession) {
        $this->LogSession = $LogSession;
    }

    function setWebGroupId($WebGroupId) {
        $this->WebGroupId = $WebGroupId;
    }

    function setWebSubGroupId($WebSubGroupId) {
        $this->WebSubGroupId = $WebSubGroupId;
    }

    function setWebItemName($WebItemName) {
        $this->WebItemName = $WebItemName;
    }

    function setIsRecommended($IsRecommended) {
        $this->IsRecommended = $IsRecommended;
    }

    function setFoodType($FoodType) {
        $this->FoodType = $FoodType;
    }

    function setSpicelevel($Spicelevel) {
        $this->Spicelevel = $Spicelevel;
    }

    function setWebProductName($WebProductName) {
        $this->WebProductName = $WebProductName;
    }

    function setCOnvertProductId($COnvertProductId) {
        $this->COnvertProductId = $COnvertProductId;
    }

    function setCOnvertQty($COnvertQty) {
        $this->COnvertQty = $COnvertQty;
    }
    function getDepartmentId() {
        return $this->DepartmentId;
    }

    function getLayerCount() {
        return $this->layerCount;
    }

    function setDepartmentId($DepartmentId) {
        $this->DepartmentId = $DepartmentId;
    }

    function setLayerCount($layerCount) {
        $this->layerCount = $layerCount;
    }
    
    function getProducts(){
        $this->setJsonEncode($this->SelectTable("product_master LEFT JOIN brand_master ON brand_master.BrandId=product_master.BrandId LEFT JOIN product_subgroup_master ON product_subgroup_master.PSubGroupId=product_master.SubgroupId", "", "",0));
        return $this->getJsonEncode();
    }
    function getRawProducts(){
        $this->setJsonEncode($this->SelectTable("product_master", "IsActive=0", "",0));
        return $this->getJsonEncode();
    }
    function deleteProduct(){
        
        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->ProductFormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $id = $this->getEscapString($request->id);
        return $this->DeleteRecords("product_master", "productId='$id'");
        
    }
    public function existProduct($name){
        
        $Exists = $this->SelectSingleRow("product_master", "ProductName = '$name'", '', 0);
        if(count($Exists['ProductName']) > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function addProduct(){
                
        $this->setProductName($_POST['ProductName']);
        $this->setPrintName($_POST['PrintName']);
        $this->setUPCEAN($_POST['UPCEAN']);
        $this->setUPCEAN1($_POST['UPCEAN1']);
        $this->setUPCEAN2($_POST['UPCEAN2']);
        $this->setUPCEAN3($_POST['UPCEAN3']);
        $this->setUserDefinedCode($_POST['UserDefinedCode']);
        $this->setPCompanyName($_POST['PCompanyId']);
        $this->setBrandId($_POST['BrandId']);
        $this->setDepartmentId($_POST['DepartmentId']);
        $this->setProductGroupId($_POST['GroupNameId']);
        $this->setSubgroupId($_POST['SubGroupId']);
        $this->setBinLocation($_POST['BinLocation']);
        $this->setTaxIdPurchase($_POST['PurchaseTaxId']);
        $this->setTaxIdSale($_POST['SaleTaxId']);
        $this->setUnitId($_POST['UnitId']);
        $this->setAlternateUnitId($_POST['AltUnitId']);
        $this->setChangeConversion($_POST['ChangeConversionFlag']);
        $this->setMatrixId($_POST['MatrixId']);
        $this->setGenerateProductChild($_POST['GenerateProductChildFlag']);
        $this->setPrintBarcode($_POST['PrintCodeFlag']);
        $this->setBarcodeRatio($_POST['BarcodeRation']);
        $this->setAskQuantity($_POST['AskQuantityFlag']);
        $this->setAskRate($_POST['AskRateFlag']);
        $this->setAskContainer($_POST['AskContainerFlag']);
        $this->setUseFifo($_POST['AskFIFOFlag']);
        $this->setProductMsg($_POST['POSMessage']);
        $this->setProductRemark($_POST['POSRemark']);
        $this->setItemType($_POST['ItemTypeId']);
        $this->setSessionId('None');
        $this->setLayerCount(0);
        $this->setMRP(0);
        $this->setEvalCount(0);
        $this->setQuantityOnHand(0);
        $this->setReorderInfo(0);
        $this->setReorderLevel(0);
        $this->setSafetyLevel(0);
        $this->setReorderQty(0);
        $this->setMinimumOrderQty(0);
        $this->setStandardSalePrice(0);
        $this->setStandardCostPrice(0);
        $this->setProductDIscount(0);
        $this->setAllowOperatorDiscount(0);
        $this->setRecipeComponents(0);
        $this->setRecordDateTime('0000-00-00');
        $this->setSpCommPercent(0);
        $this->setSpCommAmt(0);
        $this->setCalNetWeight(0);
        $this->setRate(0);
        $this->setPrediocity(0);
        $this->setChangeContainerWeight(0);
        $this->setSaleActId(0);
        $this->setSaleReturnActId(0);
        $this->setPurchaseActId(0);
        $this->setPurchaseReturnActId(0);
        $this->setTaxableValue(0);
        $this->setLogUser(0);
        $this->setLogLocation(0);
        $this->setWebGroupId(0);
        $this->setWebSubGroupId(0);
        $this->setIsRecommended(0);
        $this->setFoodType(0);
        $this->setSpicelevel(0);
        $this->setCOnvertQty(0);
        $this->setGenerateProduction($_POST['ProductionFromSaleFlag']);
        $this->setWeighingScaleExport($_POST['WeighingSaleFlag']);
        $this->setWeighingScaleConversion($_POST['WeighingSaleConversionFlag']);
        $this->setTeamId(implode(',', $_POST['ProductTeamId']));
        $ItemTypeId = $this->getEscapString($this->getItemType());
        
        if($ItemTypeId == 2){
            $this->setIsActive(0);
        }else{
            $this->setIsActive(1);
        }
        $this->setIsFixed(1);
        
        $ProductImage1 = $_FILES['ProductImage1']['name'];
        $path1 = $_SERVER['DOCUMENT_ROOT'].'admin/lib/ProductManagement/Picture1/'.$ProductImage1;
        move_uploaded_file($_FILES['ProductImage1']['tmp_name'],$path1);
        
        $ProductImage2 = $_FILES['ProductImage2']['name'];
        $path2 = $_SERVER['DOCUMENT_ROOT'].'admin/lib/ProductManagement/Picture2/'.$ProductImage2;
        move_uploaded_file($_FILES['ProductImage2']['tmp_name'],$path2);
        
        $ProductName = $this->getEscapString($this->getProductName());
        $ProductTable = "product_master";
        $ProductData = array('ProductName'=>$ProductName, 'PrintName'=>$this->getEscapString($this->getPrintName()), 'UPCEAN'=>$this->getEscapString($this->getUPCEAN()), 'UserDefinedCode'=>$this->getEscapString($this->getUserDefinedCode()), 'MRP'=>$this->getEscapString($this->getMRP()), 'BrandId'=>$this->getEscapString($this->getBrandId()), 'SubgroupId'=>$this->getEscapString($this->getSubgroupId()), 'ProductGroupId'=>$this->getEscapString($this->getProductGroupId()), 'DepartmentId'=>$this->getEscapString($this->getDepartmentId()), 'UnitId'=>$this->getEscapString($this->getUnitId()), 'BinLocation'=>$this->getEscapString($this->getBinLocation()), 'MatrixId'=>$this->getEscapString($this->getMatrixId()), 'EvalCount'=>$this->getEscapString($this->getEvalCount()), 'TaxIdPurchase'=>$this->getEscapString($this->getTaxIdPurchase()), 'TaxIdSale'=>$this->getEscapString($this->getTaxIdSale()), 'PrintBarcode'=>$this->getEscapString($this->getPrintBarcode()), 'AskRate'=>$this->getEscapString($this->getAskRate()), 'UseFifo'=>$this->getEscapString($this->getUseFifo()), 'ProductMsg'=>$this->getEscapString($this->getProductMsg()), 'QuantityOnHand'=>$this->getEscapString($this->getQuantityOnHand()), 'ReorderInfo'=>$this->getEscapString($this->getReorderInfo()), 'ReorderLevel'=>$this->getEscapString($this->getReorderLevel()), 'SafetyLevel'=>$this->getEscapString($this->getSafetyLevel()), 'ReorderQty'=>$this->getEscapString($this->getReorderQty()), 'MinimumOrderQty'=>$this->getEscapString($this->getMinimumOrderQty()), 'StandardSalePrice'=>$this->getEscapString($this->getStandardSalePrice()), 'StandardCostPrice'=>$this->getEscapString($this->getStandardCostPrice()), 'ProductDIscount'=>$this->getEscapString($this->getProductDIscount()), 'AllowOperatorDiscount'=>$this->getEscapString($this->getAllowOperatorDiscount()), 'ProductRemark'=>$this->getEscapString($this->getProductRemark()), 'Picture1'=>$ProductImage1, 'Picture2'=>$ProductImage2, 'RecipeComponents'=>$this->getEscapString($this->getRecipeComponents()), 'RecordDateTime'=>$this->getEscapString($this->getRecordDateTime()), 'CompanyId'=>intval($this->getEscapString($this->getCompanyId())),'SessionId'=>$this->getEscapString($this->getSessionId()), 'AlternateUnitId'=>$this->getEscapString($this->getAlternateUnitId()), 'ChangeConversion'=>$this->getEscapString($this->getChangeConversion()), 'ItemType'=>$ItemTypeId, 'WeighingScaleExport'=>$this->getEscapString($this->getWeighingScaleExport()), 'WeighingScaleConversion'=>$this->getEscapString($this->getWeighingScaleConversion()), 'GenerateProduction'=>$this->getEscapString($this->getGenerateProduction()), 'PrintNameOther'=>$this->getEscapString($this->getPrintNameOther()), 'GenerateProductChild'=>$this->getEscapString($this->getGenerateProductChild()), 'CoupanFile'=>$this->getEscapString($this->getCoupanFile()), 'SpCommPercent'=>$this->getEscapString($this->SpCommPercent), 'SpCommAmt'=>$this->getEscapString($this->getSpCommAmt()), 'SchemeIds'=>$this->getEscapString($this->getSchemeIds()), 'PMField1'=>$this->getEscapString($this->getPMField1()), 'PMField2'=>$this->getEscapString($this->getPMField2()), 'PMField3'=>$this->getEscapString($this->getPMField3()), 'PMField4'=>$this->getEscapString($this->getPMField4()), 'PMField5'=>$this->getEscapString($this->getPMField5()), 'CalNetWeight'=>$this->getEscapString($this->getCalNetWeight()), 'BarcodeRatio'=>$this->getEscapString($this->getBarcodeRatio()), 'Link'=>$this->getEscapString($this->getLink()), 'AskQuantity'=>$this->getEscapString($this->getAskQuantity()), 'AskContainer'=>$this->getEscapString($this->getAskContainer()), 'ServiceItem'=>$this->getEscapString($this->getServiceItem()), 'Rate'=>$this->getEscapString($this->getRate()), 'Prediocity'=>$this->getEscapString($this->getPrediocity()), 'UPCEAN1'=>$this->getEscapString($this->getUPCEAN1()), 'UPCEAN2'=>$this->getEscapString($this->getUPCEAN2()), 'UPCEAN3'=>$this->getEscapString($this->getUPCEAN3()), 'TeamId'=>$this->getEscapString($this->getTeamId()), 'ChangeContainerWeight'=>$this->getEscapString($this->getChangeContainerWeight()), 'SaleActId'=>$this->getEscapString($this->getSaleActId()), 'SaleReturnActId'=>$this->getEscapString($this->getSaleReturnActId()), 'PurchaseActId'=>$this->getEscapString($this->getPurchaseActId()), 'PurchaseReturnActId'=>$this->getEscapString($this->getPurchaseReturnActId()), 'TaxableValue'=>$this->getEscapString($this->getTaxableValue()), 'LogUser'=>$this->getEscapString($this->getLogUser()), 'LogLocation'=>$this->getEscapString($this->getLogLocation()), 'LogSession'=>$this->getEscapString($this->getLogSession()), 'WebGroupId'=>$this->getEscapString($this->getWebGroupId()), 'WebSubGroupId'=>$this->getEscapString($this->getWebSubGroupId()), 'WebItemName'=>$this->getEscapString($this->getWebItemName()), 'IsRecommended'=>$this->getEscapString($this->getIsRecommended()), 'FoodType'=>$this->getEscapString($this->getFoodType()), 'Spicelevel'=>$this->getEscapString($this->getSpicelevel()), 'WebProductName'=>$this->getEscapString($this->getWebProductName()), 'COnvertProductId'=>$this->getEscapString($this->getCOnvertProductId()), 'COnvertQty'=>$this->getEscapString($this->getCOnvertQty()), 'IsMultiLayered'=>0,'IsActive'=>$this->getEscapString($this->getIsActive()),'IsFixed'=>$this->getEscapString($this->getIsFixed()),'LayerCount'=>$this->getEscapString($this->getLayerCount()));
        
        $ProductCondition = "ProductName='$ProductName'";
        $Exists = $this->SelectSingleRow($ProductTable, $ProductCondition, '', 0);
        if(count($Exists['ProductName']) > 0){
            return 0;
        }else{
            $this->InsertRecords($ProductTable, $ProductData, 0);
            return 1;
        }   
    }
}

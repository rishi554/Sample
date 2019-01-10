<?php
require __DIR__.'/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CardType
 *
 * @author PHP Developers
 */
class CardType extends DBOperation{
    
    public function __construct() {
        parent::__construct();
    }

    public function AddCardType(){
        
        $this->setJsonDecode();
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->FormData);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        
        $Name = $request->CardTypeName;
        
        $currentDate = date("Y-m-d");
        $From = date($currentDate.' H:i:s',strtotime($request->FromTime));
        $To = date($currentDate.' H:i:s',strtotime($request->ToTime));
        
        $CardTypeTable = "card_typemaster";
        $CardTypeData = array('CardTypeName'=>$request->CardTypeName, 'OnSaleValue'=>$request->OnSaleValue, 'PointAwarded'=>$request->PointAwarded, 
            'RoundOffId'=>$request->RoundOffId, 'RoundingLimit'=>$request->RoundingLimit, 'ExtraPointsOnBirthday'=>$request->ExtraPointsOnBirthday, 
            'PointToLinkedCustomer'=>$request->PointToLinkedCustomer, 'PointToConvert'=>$request->PointToConvert, 'EquivalentCurrency'=>$request->EquivalentCurrency, 'IsActive'=>1,
            'IsFixed'=>1, 'MarginDays'=>$request->MarginDays, 'DiscountPer'=>$request->DiscountPer, 'CalExtraPointMethod'=>$request->CalExtraPointMethod, 
            'MultiplyPointBy'=>$request->MultiplyPointBy, 'WeekDays'=>implode(',', $request->WeekDays), 'FromTime'=>$From, 'ToTime'=>$To, 'RestrictedSG'=>$request->RestrictedSG,
            'SubscriptionDetail'=>$request->SubscriptionDetail, 'AllowDiscountOnSG'=>$request->AllowDiscountOnSG, 'ExcludeTaxInPoint'=>$request->ExcludeTaxInPoint, 
            'PointAwardedOnProduct'=>$request->PointAwardedOnProduct);
        
        $CardTypeCondition = "CardTypeName='$Name'";
        $Exists = $this->SelectSingleRow($CardTypeTable, $CardTypeCondition, '', 0);
        
        if(count($Exists['CardTypeName']) > 0){
            return false;
        }else{
            $this->InsertRecords($CardTypeTable, $CardTypeData, 0);
            return true;
        }
        
    }
    public function UpdateCardType(){
        
        $this->setPostdata();
        $request = $this->getPostdata();
        $id = $request->id;
        
        $CardTypeTable = "card_typemaster";
        $CardTypeCondition = "cardTypeID = '$id'";
        $CardTypeData = array('CusTypeName'=>$request->CustTypeName);
        $result = $this->UpdateRecords($CardTypeTable, $CardTypeCondition, $CardTypeData, 0);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function RemoveCardType(){
        
        $this->setPostdata();
        $request = $this->getPostdata();
        $id = $request->id;
        
        $CardTypeTable = "card_typemaster";
        $CardTypeCondition = "cardTypeID = '$id'";
        $result = $this->DeleteRecords($CardTypeTable, $CardTypeCondition);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function GetCardType(){
              
        $CardTypeTable = "card_typemaster";
        $CardTypeCondition = "";
        $result = $this->SelectTable($CardTypeTable, $CardTypeCondition,'',0);
        
        if($result){
            
            $this->setJsonEncode($result); // setting data into json object
            $request = $this->getJsonEncode(); // getting data into json object
            return $request;
            
        }else{
            return false;
        }
    }
}

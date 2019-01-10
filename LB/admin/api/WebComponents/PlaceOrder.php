<?php

require $_SERVER['DOCUMENT_ROOT'] . "/admin/lib/Orders/SalesCustomizedOrder.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$obj = new SalesCustomizedOrder();
$obj->setPostdata();
$postdata = $obj->getPostdata();
if (isset($postdata) && !empty($postdata)) {

    $obj->setJsonDecode($postdata);
    $postVariable = $obj->getJsonDecode();
    $obj->setJsonEncode($postVariable->CartFormData);
    $obj->setJsonDecode($obj->getJsonEncode());
    $request = $obj->getJsonDecode();
    $CartRequest = $postVariable->CartItems;
    $obj->setOrderId(rand(111111111, 999999999));
    $obj->setOrderDate(date('Y-m-d'));
    $obj->setOrderTime(date('H:m:s'));
    $obj->setCustomerName($obj->getEscapString($request->CustomerName));
    $obj->setUsername($obj->getEscapString($request->Username));
    $obj->setAddress1($obj->getEscapString($request->Address));
    $obj->setAddress2($obj->getEscapString($request->Address2));
    $obj->setAddress3($obj->getEscapString($request->Address3));
    $obj->setLocationType($obj->getEscapString($request->AddressType));
    $obj->setArea($obj->getEscapString($request->AreaName));
    $obj->setDeliveryTime($obj->getEscapString($request->TimeSlot));
    $obj->setCardMessage($obj->getEscapString($request->CardMessage));
    $obj->setCustomerMessage($obj->getEscapString($request->CustomerMessage));
    $obj->setDeliveryCharge($obj->getEscapString($request->DeliveryCharge));
    $obj->setGrandTotal($obj->getEscapString($request->GrandTotal));
    $obj->setTaxAmount($obj->getEscapString($request->GrandTaxTotal));
    $obj->setQuantity($obj->getEscapString($request->Quantity));
    $obj->setOrderStatus(1);
    $obj->setPaymentStatus(1);
    $obj->setModeOfPayment($obj->getEscapString($request->ModeOfPayment));
    $obj->setTotalAmount($obj->getEscapString($request->TotalAmount));
    $obj->setTotalDiscountAmt($obj->getEscapString($request->TotalDiscount));
    $obj->setCustomerMobile($obj->getEscapString($request->Mobile));
    $obj->setCustomerEmail($obj->getEscapString($request->Email));
    $obj->setCustomerId(0);
    $obj->setCity("None");
    $obj->setResellerId(0);
    $obj->setDiffOrderFlag(1);
    $obj->setResellerLocation("None");
    $obj->setResellerName("None");
    $obj->setCakeMessage("None");
    $obj->setTotalDiscount(0);
    $obj->setExtraCharges(0);
    $obj->setDeliveryDate(date('Y-m-d', strtotime($request->DeliveryDate . "+1 days")));

    $data = array(
        'OrderId' => $obj->getOrderId(),
        'OrderDate' => $obj->getOrderDate(),
        'OrderTime' => $obj->getOrderTime(),
        'CustomerId' => $obj->getCustomerId(),
        'CustomerName' => $obj->getCustomerName(),
        'Username' => $obj->getUsername(),
        'CustomerMobile' => $obj->getCustomerMobile(),
        'CustomerEmail' => $obj->getCustomerEmail(),
        'Address1' => $obj->getAddress1(),
        'Address2' => $obj->getAddress2(),
        'Address3' => $obj->getAddress3(),
        'City' => $obj->getCity(),
        'Area' => $obj->getArea(),
        'Landmark' => $obj->getAddress2(),
        'DeliveryCharge' => $obj->getDeliveryCharge(),
        'TotalDiscount' => $obj->getTotalDiscount(),
        'TotalDiscountAmt' => $obj->getTotalDiscountAmt(),
        'TaxAmount' => $obj->getTaxAmount(),
        'DeliveryTime' => $obj->getDeliveryTime(),
        'LocationType' => $obj->getLocationType(),
        'CustomerMessage' => $obj->getCustomerMessage(),
        'ExtraCharges' => $obj->getExtraCharges(),
        'OrderStatus' => $obj->getOrderStatus(),
        'ModeOfPayment' => $obj->getEscapString($obj->getModeOfPayment()),
        'PaymentStatus' => $obj->getPaymentStatus(),
        'TotalAmount' => $obj->getTotalAmount(),
        'GrandTotal' => $obj->getGrandTotal(),
        'ResellerId' => $obj->getResellerId(),
        'ResellerLocation' => $obj->getResellerLocation(),
        'ResellerName' => $obj->getResellerName(),
        'DiffOrderFlag' => $obj->getDiffOrderFlag(),
        'CardMessage' => $obj->getCardMessage(),
        'CakeMessage' => $obj->getCakeMessage(),
        'quantity' => $obj->getQuantity(),
        'DeliveryDate' => $obj->getDeliveryDate()
    );

    if ($obj->InsertRecords("salesMaster", $data, 0)) {
        
        for ($i = 0; $i <= count($CartRequest) - 1; $i++) {

            $obj->setJsonEncode($CartRequest[$i]);
            $obj->setJsonDecode($obj->getJsonEncode());
            $Cart = $obj->getJsonDecode();
            $ModifierId = $Cart->ModifierFlagId;
            $obj->setProductId($Cart->productId);
            $obj->setProductName($Cart->ProductName);
            $obj->setProductPrice($Cart->MRP);
            $obj->setSalePrice($Cart->Rate);
            $obj->setQuantity($Cart->Quantity);
            $obj->setGrandTotal(($Cart->Rate * $Cart->Quantity) + ($Cart->Quantity * $Cart->TaxAmount) - $Cart->ProductDIscount);
            $obj->setTotalAmount($Cart->Rate * $Cart->Quantity);
            $obj->setDiscount($Cart->ProductDIscount);
            $obj->setDiscountFlag(0);
            $obj->setDiscountedAmount($Cart->DiscountedAmount);
            $obj->setTaxPer($Cart->TaxValue);
            $obj->setTaxMethod(intval($Cart->IncludedInRate));
            $obj->setTaxAmount($Cart->Quantity * $Cart->TaxAmount);
            $obj->setIsModifierFlag(0);
            $obj->setFlavour($Cart->FlavorMasterName);
            $obj->setExtraFlavourCharge(0);
            $obj->setIsMultiLayered($Cart->IsMultiLayered);
            $obj->setLayerCount($Cart->LayerCount);
            $obj->setModifierName($Cart->ModifierName);
            
            
            if (!empty($CartRequest[$i]->OutsideChildFlavor) && !empty($CartRequest[$i]->InsideChildFlavor)) {
                
                for($j = 0;$j <= count($CartRequest[$i]);$j++){
                    
                    $count = $j+1;
                    
                    $color = $obj->setTextColorLayer1($CartRequest[$i]->ChildFlavorColor[$j]);
                    $font = $obj->setTextFontLayer1($CartRequest[$i]->ChildFlavorFont[$j]);
                    $text = $obj->setTextOnLayer1($CartRequest[$i]->ChildFlavorText[$j]);
                    $InsideFlavor = $obj->setInSideLayer1($CartRequest[$i]->InsideChildFlavor[$j]->ProductName);
                    $OutsideFlavor = $obj->setOutSideLayer1($CartRequest[$i]->OutsideChildFlavor[$j]->ProductName);
                    
                    $result = $obj->SelectSingleRow("salesCustomizedCake", "OrderId='$ModifierId'", "*", 0);
                    
                    if(count($result['Id']) > 0){
                        $CustomizedOrderData = array('InSideLayer'.$count=>$obj->getInSideLayer1(), 'OutSideLayer'.$count=>$obj->getOutSideLayer1(), 'TextOnLayer'.$count=>$obj->getTextOnLayer1(), 'TextColorLayer'.$count=>$obj->getTextColorLayer1(), 'TextFontLayer'.$count=>$obj->getTextFontLayer1());
                        $obj->UpdateRecords("salesCustomizedCake", "OrderId='$ModifierId'", $CustomizedOrderData,0);
                    }else{
                        $CustomizedOrderData = array('OrderId'=>$ModifierId, 'InSideLayer1'=>$obj->getInSideLayer1(), 'OutSideLayer1'=>$obj->getOutSideLayer1(), 'TextOnLayer1'=>$obj->getTextOnLayer1(), 'TextColorLayer1'=>$obj->getTextColorLayer1(), 'TextFontLayer1'=>$obj->getTextFontLayer1());
                        $obj->InsertRecords("salesCustomizedCake", $CustomizedOrderData,0);
                    }   
                }
            }

            if (!empty($obj->getModifierName()) && $obj->getModifierName() !== NULL) {
                $ChildModifierData = array('childProductId' => $ModifierId,'ProductId'=>$obj->getProductId(), 'ModifierName' => $obj->getProductName(), 'MProductPrice' => $obj->getProductPrice(), 'MSalePrice' => $obj->getSalePrice(), 'MQuantity' => $obj->getQuantity(), 'MGrandTotal' => $obj->getGrandTotal(), 'MTotalAmount' => $obj->getTotalAmount(), 'MDiscount' => $obj->getDiscount(), 'MDiscountFlag' => $obj->getDiscountFlag(), 'MDiscountedAmount' => $obj->getDiscountedAmount(), 'TaxPer' => Floatval($obj->getTaxPer()), 'TaxMethod' => $obj->getTaxMethod(), 'TaxAmount' => $obj->getTaxAmount());
                $obj->InsertRecords("salesChildModifier", $ChildModifierData, 0);
            } else {
                $ChildData = array('Id' => $ModifierId, 'OrderId' => $obj->getOrderId(), 'ProductId' => $obj->getProductId(), 'ProductName' => $obj->getProductName(), 'ProductPrice' => $obj->getProductPrice(), 'SalePrice' => $obj->getSalePrice(), 'Quantity' => $obj->getQuantity(), 'GrandTotal' => $obj->getGrandTotal(), 'TotalAmount' => $obj->getTotalAmount(), 'Discount' => $obj->getDiscount(), 'DiscountFlag' => $obj->getDiscountFlag(), 'DiscountedAmount' => $obj->getDiscountedAmount(), 'TaxPer' => $obj->getTaxPer(), 'TaxMethod' => $obj->getTaxMethod(), 'TaxAmount' => $obj->getTaxAmount(), 'IsModifierFlag' => $obj->getIsModifierFlag(), 'Flavour' => $obj->getFlavour(), 'ExtraFlavourCharge' => $obj->getExtraFlavourCharge(), 'IsMultiLayered' => $obj->getIsMultiLayered(), 'LayerCount' => $obj->getLayerCount());
                $obj->InsertRecords("salesChild", $ChildData, 0);
            }
        }
        echo 1;
    } else {
        echo 0;
    }
}
exit();



<?php
require __DIR__ . '/../Orders/SalesChildModifier.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SalesCustomizedOrder
 *
 * @author PHP Developers
 */
class SalesCustomizedOrder extends SalesChildModifier{
    
    private $InSideLayer1;
    private $OutSideLayer1;
    private $TextOnLayer1;
    private $TextColorLayer1;
    private $TextFontLayer1;
    private $InSideLayer2;
    private $OutSideLayer2;
    private $TextOnLayer2;
    private $TextColorLayer2;
    private $TextFontLayer2;
    private $InSideLayer3;
    private $OutSideLayer3;
    private $TextOnLayer3;
    private $TextColorLayer3;
    private $TextFontLayer3;
    private $InSideLayer4;
    private $OutSideLayer4;
    private $TextOnLayer4;
    private $TextColorLayer4;
    private $TextFontLayer4;
    private $InSideLayer5;
    private $OutSideLayer5;
    private $TextOnLayer5;
    private $TextColorLayer5;
    private $TextFontLayer5;
    private $InSideLayer6;
    private $OutSideLayer6;
    private $TextOnLayer6;
    private $TextColorLayer6;
    private $TextFontLayer6;
    private $ReasonForAdmin;
    
    function __construct() {
        parent::__construct();
    }
            
    function getInSideLayer1() {
        return $this->InSideLayer1;
    }

    function getOutSideLayer1() {
        return $this->OutSideLayer1;
    }

    function getTextOnLayer1() {
        return $this->TextOnLayer1;
    }

    function getTextColorLayer1() {
        return $this->TextColorLayer1;
    }

    function getTextFontLayer1() {
        return $this->TextFontLayer1;
    }

    function getInSideLayer2() {
        return $this->InSideLayer2;
    }

    function getOutSideLayer2() {
        return $this->OutSideLayer2;
    }

    function getTextOnLayer2() {
        return $this->TextOnLayer2;
    }

    function getTextColorLayer2() {
        return $this->TextColorLayer2;
    }

    function getTextFontLayer2() {
        return $this->TextFontLayer2;
    }

    function getInSideLayer3() {
        return $this->InSideLayer3;
    }

    function getOutSideLayer3() {
        return $this->OutSideLayer3;
    }

    function getTextOnLayer3() {
        return $this->TextOnLayer3;
    }

    function getTextColorLayer3() {
        return $this->TextColorLayer3;
    }

    function getTextFontLayer3() {
        return $this->TextFontLayer3;
    }

    function getInSideLayer4() {
        return $this->InSideLayer4;
    }

    function getOutSideLayer4() {
        return $this->OutSideLayer4;
    }

    function getTextOnLayer4() {
        return $this->TextOnLayer4;
    }

    function getTextColorLayer4() {
        return $this->TextColorLayer4;
    }

    function getTextFontLayer4() {
        return $this->TextFontLayer4;
    }

    function getInSideLayer5() {
        return $this->InSideLayer5;
    }

    function getOutSideLayer5() {
        return $this->OutSideLayer5;
    }

    function getTextOnLayer5() {
        return $this->TextOnLayer5;
    }

    function getTextColorLayer5() {
        return $this->TextColorLayer5;
    }

    function getTextFontLayer5() {
        return $this->TextFontLayer5;
    }

    function getInSideLayer6() {
        return $this->InSideLayer6;
    }

    function getOutSideLayer6() {
        return $this->OutSideLayer6;
    }

    function getTextOnLayer6() {
        return $this->TextOnLayer6;
    }

    function getTextColorLayer6() {
        return $this->TextColorLayer6;
    }

    function getTextFontLayer6() {
        return $this->TextFontLayer6;
    }

    function getReasonForAdmin() {
        return $this->ReasonForAdmin;
    }

    function setInSideLayer1($InSideLayer1) {
        $this->InSideLayer1 = $InSideLayer1;
    }

    function setOutSideLayer1($OutSideLayer1) {
        $this->OutSideLayer1 = $OutSideLayer1;
    }

    function setTextOnLayer1($TextOnLayer1) {
        $this->TextOnLayer1 = $TextOnLayer1;
    }

    function setTextColorLayer1($TextColorLayer1) {
        $this->TextColorLayer1 = $TextColorLayer1;
    }

    function setTextFontLayer1($TextFontLayer1) {
        $this->TextFontLayer1 = $TextFontLayer1;
    }

    function setInSideLayer2($InSideLayer2) {
        $this->InSideLayer2 = $InSideLayer2;
    }

    function setOutSideLayer2($OutSideLayer2) {
        $this->OutSideLayer2 = $OutSideLayer2;
    }

    function setTextOnLayer2($TextOnLayer2) {
        $this->TextOnLayer2 = $TextOnLayer2;
    }

    function setTextColorLayer2($TextColorLayer2) {
        $this->TextColorLayer2 = $TextColorLayer2;
    }

    function setTextFontLayer2($TextFontLayer2) {
        $this->TextFontLayer2 = $TextFontLayer2;
    }

    function setInSideLayer3($InSideLayer3) {
        $this->InSideLayer3 = $InSideLayer3;
    }

    function setOutSideLayer3($OutSideLayer3) {
        $this->OutSideLayer3 = $OutSideLayer3;
    }

    function setTextOnLayer3($TextOnLayer3) {
        $this->TextOnLayer3 = $TextOnLayer3;
    }

    function setTextColorLayer3($TextColorLayer3) {
        $this->TextColorLayer3 = $TextColorLayer3;
    }

    function setTextFontLayer3($TextFontLayer3) {
        $this->TextFontLayer3 = $TextFontLayer3;
    }

    function setInSideLayer4($InSideLayer4) {
        $this->InSideLayer4 = $InSideLayer4;
    }

    function setOutSideLayer4($OutSideLayer4) {
        $this->OutSideLayer4 = $OutSideLayer4;
    }

    function setTextOnLayer4($TextOnLayer4) {
        $this->TextOnLayer4 = $TextOnLayer4;
    }

    function setTextColorLayer4($TextColorLayer4) {
        $this->TextColorLayer4 = $TextColorLayer4;
    }

    function setTextFontLayer4($TextFontLayer4) {
        $this->TextFontLayer4 = $TextFontLayer4;
    }

    function setInSideLayer5($InSideLayer5) {
        $this->InSideLayer5 = $InSideLayer5;
    }

    function setOutSideLayer5($OutSideLayer5) {
        $this->OutSideLayer5 = $OutSideLayer5;
    }

    function setTextOnLayer5($TextOnLayer5) {
        $this->TextOnLayer5 = $TextOnLayer5;
    }

    function setTextColorLayer5($TextColorLayer5) {
        $this->TextColorLayer5 = $TextColorLayer5;
    }

    function setTextFontLayer5($TextFontLayer5) {
        $this->TextFontLayer5 = $TextFontLayer5;
    }

    function setInSideLayer6($InSideLayer6) {
        $this->InSideLayer6 = $InSideLayer6;
    }

    function setOutSideLayer6($OutSideLayer6) {
        $this->OutSideLayer6 = $OutSideLayer6;
    }

    function setTextOnLayer6($TextOnLayer6) {
        $this->TextOnLayer6 = $TextOnLayer6;
    }

    function setTextColorLayer6($TextColorLayer6) {
        $this->TextColorLayer6 = $TextColorLayer6;
    }

    function setTextFontLayer6($TextFontLayer6) {
        $this->TextFontLayer6 = $TextFontLayer6;
    }

    function setReasonForAdmin($ReasonForAdmin) {
        $this->ReasonForAdmin = $ReasonForAdmin;
    }
}

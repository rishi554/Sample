<?php
require __DIR__ . '/../Config/DBOperation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author PHP Developers
 */
class Cart extends DBOperation {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    }

    public function AddToCart() {

        $this->setPostdata();
        $postdata = $this->getPostdata();
        $this->setJsonDecode($postdata);
        $postVariable = $this->getJsonDecode();
        $this->setJsonEncode($postVariable->CartItem);
        $this->setJsonDecode($this->getJsonEncode());
        $request = $this->getJsonDecode();
        $request->Quantity = 1;
        array_push($_SESSION['cart'], $request);
        //unset($_SESSION['cart']);
        return count($_SESSION['cart']);
    }

    public function getCartItems() {
        $this->setJsonEncode($_SESSION['cart']);
        return $this->getJsonEncode();
    }

    public function ClearCart() {
        unset($_SESSION['cart']);
        return true;
    }

    public function RemoveItem($id) {
        foreach ($_SESSION['cart'] as $k => $v) {
            if ($_SESSION['cart'][$k]['productId'] == $id) {
                unset($_SESSION['cart'][$k]);
            }
        }
        return true;
    }

}

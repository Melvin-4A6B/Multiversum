<?php

require_once('model/cartModel.php');

class cartController {

    public function __construct()
    {
        $this->cartModel = new cartModel();
    }

    public function makeCart()
    {
        $app = $this->cartModel->showCart();
        return $app;
    }

}
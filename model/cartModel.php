<?php 

require_once('controller/dataHandler.php');

class cartModel {

    public function __construct()
    {
        $this->dataHandler = new dataHandler();
    }

    private function manageCart()
    {
        
    }

    public function showCart()
    {
        $cart = $this->manageCart();
        return $cart;
    }

}
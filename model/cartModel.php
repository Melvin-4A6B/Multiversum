<?php 
require_once('controller/dataHandler.php');

class cartModel {

    public $html;

    public function __construct()
    {
        $this->dataHandler = new dataHandler();
    }

    private function makeCookie($value)
    {
        setcookie("cart", $value, time() + (86400 * 30), "/");//Set cookie for 1 month
    }

    public function showCart()
    {

        $this->html = '';

        $cart = isset($_COOKIE["cart"]) ? unserialize($_COOKIE["cart"]) : [];
        $cart = array_unique($cart);

        if(isset($_GET['pid']) && $_GET['pid'] != '')
        {
            $id = $_GET['pid'];
            array_push($cart, $id);

            $cartString = serialize($cart);
            $this->makeCookie($cartString);
        }

        $sql = "SELECT * FROM products WHERE product_id IN (". implode(",", $cart).")";
        $cartItems = $this->dataHandler->readData($sql);

        $total = 0;

        $this->html .= '
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">Prijs</th>
                        <th style="width:8%">Aantal</th>
                        <th style="width:22%" class="text-center">Subtotaal</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <tbody>
        ';

        $_SESSION['amountInCart'] = sizeof($cart);
        if(sizeof($cart) < 1) {
            die('leeg');

        }

        foreach($cartItems as $cartItem)
        {

            if(isset($_GET['a']) && $_GET['a'] != '')
            {
                if($_GET['a'] == 'delete')
                {
                    die($_GET['pid']);
                    unset($cart[$_GET['pid']]);
                }

                if($_GET['a'] == 'update')
                {
                    $quantity = $_GET['a'];
                }
                
            }
            else
            {
                $quantity = 1;
            }

            $subTotal = $cartItem->product_price * $quantity;

            if($_SESSION['amountInCart'] > 1)
            {
                $shipping = 'Gratis';    
            }
            else
            {
                $shipping = '&euro;' . 6.95;
            }

            $total = $total + ($subTotal);

            $this->html .='
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-10">
                                <h4 class="nomargin"><a href="/details?pid='.$cartItem->product_id.'">'.$cartItem->product_name.'</a></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">&euro;'.$cartItem->product_price.'</td>
                    <form method="get" action="">
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="'.$quantity.'">
                        </td>
                        <td data-th="Subtotal" class="text-center">&euro;'.$subTotal.'</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm"><a href="?a=update&pid='.$cartItem->product_id.'"><i class="fas fa-sync"></i></a></button>
                            <button class="btn btn-danger btn-sm"><a href="?a=delete&pid='.$cartItem->product_id.'"><i class="fas fa-trash-alt"></i></a></button>								
                        </td>
                    </form>  
                </tr>
            ';
        }

        $this->html .= '
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Verzendkosten: '.$shipping.'</strong></td>
                    </tr>
                    <tr>
                        <td><a href="/cat" class="btn btn-success btn-custom"><i class="fas fa-angle-left"></i> Verder winkelen</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Totaal &euro;'.$total.'</strong></td>
                        <td><a href="#" class="btn btn-success btn-block btn-custom">Betalen <i class="fas fa-angle-right"></i></a></td>
                    </tr>
                </tfoot>
            </table>
        ';

       return $this->html;
    }

}
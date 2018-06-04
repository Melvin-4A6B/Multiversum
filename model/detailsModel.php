<?php

require_once('controller/dataHandler.php');

class detailsModel {

    public $html;

    public function __construct()
    {
        $this->dataHandler = new dataHandler();
    }

    public function getDetails()
    {
        if(isset($_GET['pid']) && $_GET['pid'] != '')
        {
            $id = $_GET['pid'];
            $sql = "SELECT * FROM products WHERE product_id = $id";
            $details = $this->dataHandler->readData($sql);

            if($details)
            {
                foreach($details as $detail)
                {
                    $this->html = 'Product_id: ' . $detail->product_id . '<br>'; 
                    $this->html .= 'Ean_code: ' . $detail->ean_code . '<br>';
                    $this->html .= 'Product_name: ' . $detail->product_name . '<br>';
                    $this->html .= 'Product_description: ' . $detail->product_description . '<br>';
                    $this->html .= 'Product_price: ' . $detail->product_price . '<br>';
                    $this->html .= 'Product_brand: ' . $detail->product_brand . '<br>';
                    $this->html .= 'Product_color: ' . $detail->product_color . '<br>';
                    $this->html .= 'Product_platform: ' . $detail->product_platform . '<br>';
                    $this->html .= 'Product_image: ' . $detail->product_image . '<br>';
    
                    if($detail->sale == 0)
                    {
                        $sale = 'No';
                    }
                    else
                    {
                        $sale = 'Yes';
                    }
    
                    $this->html .= 'Sale: ' . $sale . '<br>';
                }
            }
            else
            {
                $this->html = 'Geen producten gevonden';
            }
        }
        return $this->html;
    }

}
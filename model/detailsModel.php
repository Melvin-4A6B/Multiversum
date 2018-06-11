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

                    if($detail->sale == 0)
                    {
                        $price = $detail->product_price;
                    }
                    else
                    {
                        $price = $detail->sale_price;
                    }

                    $this->html = '
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="'.$detail->product_image.'" alt="'.$detail->product_name.'" width="300px" height="200px">
                                    </div>
                                    <div class="col-md-8 offset-md-2">
                                        <h5 class="card-title">'.$detail->product_name.'</h5>
                                        <p class="card-text">&euro;'.$price.'</p>
                                        <p class="card-text">'.$detail->product_description.'</p>
                                        <h5 class="card-title">Productspecificaties</h5>
                                        <hr>
                                        <p class="card-text">EAN: '.$detail->ean_code.'</p>
                                        <p class="card-text">Merk: '.$detail->product_brand.'</p>
                                        <p class="card-text">Kleur: '.$detail->product_color.'</p>
                                        <p class="card-text">Platform: '.$detail->product_platform.'</p>
                                        <button class="btn btn-success" type="button"><a href="?p=cart&pid='.$detail->product_id.'">In winkelwagen</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
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
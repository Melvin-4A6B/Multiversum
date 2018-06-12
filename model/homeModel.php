<?php

require_once('controller/dataHandler.php');

class homeModel {

    public $html;

    public function __construct()
    {
        $this->dataHandler = new dataHandler();
    }

    public function showSales()
    {
        $sql = "SELECT * FROM products WHERE sale = '1' LIMIT 9";
		$sales = $this->dataHandler->readData($sql);

		foreach($sales as $sale)
		{
			$this->html = '<div class="col-md-4 mb-4">';
			$this->html .= '<div class="card" style="width: 18rem;">
								<a href="?p=details&pid='.$sale->product_id.'">
									<img class="card-img-top" src="assets/custom/img/'.$sale->product_image.'" alt="'.$sale->product_name.'">
								</a>	
								<div class="card-body">
                                    <h5 class="card-title"><a href="?p=details&pid='.$sale->product_id.'">'.$sale->product_name.'</a></h5>
									<h5 class="card-title price"><span class="sale">&euro;'.$sale->product_price.'</span> &euro;'.$sale->sale_price.'</h5>
									<button class="btn btn-success" type="button"><a href="?p=cart&pid='.$sale->product_id.'">In winkelwagen</a></button>
								</div>
		  					</div>';
			$this->html .= '</div>';
		}
		return $this->html;   
    }

}
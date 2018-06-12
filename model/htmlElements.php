<?php
// require_once('dataHandler.php');

require_once('controller/dataHandler.php');

class htmlElements {

	public $html;

	public function __construct() 
	{	
		$this->dataHandler = new dataHandler();
	}

	//Sanitize method om script en html tags weg te halen
	public function sanitize($content)
	{
		$dom = html_entity_decode($content);
		$dom = preg_replace('#<script(.?)>(.?)</script>#is', '', $dom);
		$dom = strip_tags($dom, '<script>');
		$dom = htmlentities($dom);
		$dom = htmlspecialchars($dom);

		return $dom;
	}

	//Haal alle producten op
	public function displayProducts()
	{
		$sql = "SELECT * FROM products";
		$products = $this->dataHandler->readAllData($sql);

		$this->html = '';

		foreach($products as $product)
		{
			if($product->sale == 0)
			{
				$price = $product->product_price;
			}
			else
			{
				$price = $product->sale_price;
			}

			$this->html .= '<div class="col-md-4 mb-4">';
			$this->html .= '<div class="card" style="width: 18rem;">
								<a href="?p=details&pid='.$product->product_id.'">
									<img class="card-img-top img-custom" src="assets/custom/img/'.$product->product_image.'" alt="'.$product->product_name.'">
								</a>	
								<div class="card-body">
									<h5 class="card-title"><a href="?p=details&pid='.$product->product_id.'">'.$product->product_name.'</a></h5>
									<h5 class="card-title price">&euro;'.$price.'</h5>
									<button class="btn btn-success" type="button"><a href="?p=cart&pid='.$product->product_id.'">In winkelwagen</a></button>
								</div>
		  					</div>';
			$this->html .= '</div>';
		}
		return $this->html;
	}

	//Maak een table
	public function createTable()
	{		
		$sql = "SHOW COLUMNS FROM products";
		$headers = $this->dataHandler->readData($sql);
		
		$sql = "SELECT * FROM products";
		$rows = $this->dataHandler->readData($sql);

        $this->html = "<div class='table-responsive'><table class='table table-bordered table-striped'>";
		$this->html .= "<thead class='thead-light'><tr>";

        foreach($headers as $header)
        { 
            $this->html .= "<th>" . $header->Field . "</th>";
        }

        $this->html .= "<th>Action</th>";

        $this->html .= "</tr></thead>";

        foreach($rows as $row)
        {
            $this->html .= "<tbodt><tr>";

            foreach($row as $key => $value)
            {
				if($key === 'product_image')
				{
					$this->html .= "<td><img src='".$value."' width='150px' height='100px'></td>";
				}
				else
				{
					$this->html .= "<td>" . $value . "</td>";
				}
            }

            $this->html .= "<td><button class='btn btn-primary' type='submit'><a href='?action=read&id=".$row->product_id."' style='color: white;'>Read</a></button><button class='btn btn-warning' type='submit'><a href='?action=update&id=".$row->product_id."' style='color: white;'>Update</a></button><button class='btn btn-danger' type='submit'><a href='?action=delete&id=".$row->product_id."' style='color: white;'>Delete</a></button></td>";

            $this->html .= "</tr></tbody>";
        }
        $this->html .= "</tr></table></div>";

        return $this->html;
	}

}
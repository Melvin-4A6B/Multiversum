<?php
// require_once('dataHandler.php');

require_once('controller/dataHandler.php');

class htmlElements {

	public $html;

	public function __construct() 
	{	
		$this->dataHandler = new dataHandler();
	}

	public function sanitize($content)
	{
		$dom = html_entity_decode($content);
		$dom = preg_replace('#<script(.?)>(.?)</script>#is', '', $dom);
		$dom = strip_tags($dom, '<script>');
		$dom = htmlentities($dom);
		$dom = htmlspecialchars($dom);

		return $dom;
	}

	public function displayProducts()
	{
		$sql = "SELECT * FROM products WHERE sale = '0'";
		$products = $this->dataHandler->readData($sql);

		foreach($products as $product)
		{
			$this->html = '<div class="col-md-4">';
			$this->html .= '<div class="card" style="width: 18rem;">
								<a href="?p=details&pid='.$product->product_id.'">
									<img class="card-img-top" src="'.$product->product_image.'" alt="'.$product->product_name.'">
								</a>	
								<div class="card-body">
									<h5 class="card-title"><a href="?p=details&pid='.$product->product_id.'">'.$product->product_name.'</a></h5>
									<h5 class="card-title price">&euro;'.$product->product_price.'</h5>
									<p class="card-text">'.$product->product_description.'</p>
									<button class="btn btn-primary">
										<a href="?p=cart&pid='.$product->product_id.'"><i class="fas fa-plus"></i> In winkelwagen</a>
									</button>
								</div>
		  					</div>';
			$this->html .= '</div>';
		}
		return $this->html;
	}

	public function createTable()
	{		
		$sql = "SHOW COLUMNS FROM products";
		$headers = $this->dataHandler->readData($sql);
		
		$sql = "SELECT * FROM products WHERE sale = 0";
		$rows = $this->dataHandler->readData($sql);

        $this->html = "<div class='table-responsive'><table class='table table-bordered table-striped'>";

        foreach($headers as $header)
        { 
            $this->html .= "<th>" . $header->Field . "</th>";
        }

        $this->html .= "<th>Action</th>";

        $this->html .= "</tr>";

        foreach($rows as $row)
        {
            $this->html .= "<tr>";

            foreach($row as $key => $value)
            {
                $this->html .= "<td>" . $value . "</td>";
            }

            $this->html .= "<td><button class='btn btn-primary' type='submit'><a href='?action=read&id=".$row->product_id."' style='color: white;'>Read</a></button><button class='btn btn-warning' type='submit'><a href='?action=update&id=".$row->product_id."' style='color: white;'>Update</a></button><button class='btn btn-danger' type='submit'><a href='?action=delete&id=".$row->product_id."' style='color: white;'>Delete</a></button></td>";

            $this->html .= "</tr>";
        }
        $this->html .= "</tr></table></div>";

        return $this->html;
	}

	public function createTable() 
	{
		$sql = "SHOW COLUMNS FROM products";
        $headers = $this->dataHandler->readAllData($sql);

        $rowSql = "SELECT * FROM products";
        $rows = $this->dataHandler->readAllData($rowSql);

       $html = "<table>";

        foreach($headers as $header)
        {   
            $html .= "<th>" . str_replace('_', ' ', $header["Field"]) . "</th>";
        }

        $html .= "<th>Read</th><th>Update</th><th>Delete</th>";

        $html .= "</tr>";

        foreach($rows as $row)
        {
            $html .= "<tr>";

            foreach($row as $key => $value)
            {
               $html .= "<td>" . $value . "</td>";
            }

            $html .= "<td><button class='editbutton' type='submit'><a href='?op=read&id=".$row['product_id']."'>Read</a></button></td><td><button class='editbutton' type='submit'><a href='?op=update&id=".$row['product_id']."'>Update</a></button></td><td><button class='editbutton' type='submit'><a href='?op=delete&id=".$row['product_id']."'>Delete</a></button></td>";

            $html .= "</tr>";
        }
       $html .= "</tr></table>";

        return $html;
	}
}
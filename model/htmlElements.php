<?php
// require_once('dataHandler.php');

class htmlElements {

	public function __construct() 
	{

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
<?php

require_once('model/catalogusModel.php');

class catalogusController {

    public function __construct()
    {   
        $this->catalogusModel = new catalogusModel();
    }   

    public function showCatalogus()
    {
        $app = $this->catalogusModel->collectCatalogus();  
        
        include_once('view/catalogus.php');
        exit();
    }

}
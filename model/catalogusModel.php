<?php

require_once('htmlElements.php');

class catalogusModel {

    public function __construct()
    {
        $this->htmlElements = new htmlElements();
    }

    //collect de catalogus via html elements
    public function collectCatalogus()
    {
        try
        {
            $result = $this->htmlElements->displayProducts();
        }
        catch(PDOException $e)
        {
            throw $e;
        }
        return $result;   
    }

}
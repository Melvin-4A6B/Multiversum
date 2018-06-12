<?php

require_once('controller/dataHandler.php');
require_once('model/htmlElements.php');

class searchModel {

    public $html;

    public function __construct()
    {
        $this->dataHandler = new dataHandler();
        $this->htmlElements = new htmlElements();
    }

    public function getSearch()
    {
            $result = $this->htmlElements->displaySearchProducts();

            return $result;
    }
}
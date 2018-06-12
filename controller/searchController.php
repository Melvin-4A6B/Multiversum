<?php

require_once('model/searchModel.php');

class searchController {

    public function __construct()
    {
        $this->searchModel = new searchModel();
    }

    public function showSearch()
    {
        $app = $this->searchModel->getSearch();
        include_once('view/search.php');
    }

}
<?php

require_once('model/detailsModel.php');

class detailsController {

    public function __construct()
    {
        $this->detailsModel = new detailsModel();
    }

    public function showDetails()
    {
        $app = $this->detailsModel->getDetails();
        return $app;
    }

}
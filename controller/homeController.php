<?php

require_once('model/homeModel.php');

class homeController {

    public function __construct()
    {
        $this->homeModel = new homeModel();
    }

    public function handleRequest()
    {
        switch($_GET['action'])
        {
            default:
                $this->start();
        }
    }

    public function start()
    {
        $home = $this->homeModel->displayHome();
        include_once('view/home.php');
        exit();
    }

}
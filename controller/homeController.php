<?php

require_once('model/homeModel.php');

class homeController {

    public function __construct()
    {
        $this->homeModel = new homeModel();
    }

    public function handleRequest()
    {
        //Router testing stuff
        $uri = explode('?', $_SERVER['REQUEST_URI'], 2);

        switch(isset($uri[1]) ? $uri[1] : $uri[0])
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
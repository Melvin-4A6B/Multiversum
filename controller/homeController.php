<?php

require_once('model/homeModel.php');
require_once('controller/contactController.php');

class homeController {

    public function __construct()
    {
        $this->homeModel = new homeModel();
        $this->contactController = new contactController();
        $this->router();
    }

    public function router()
    {
        $uri = $_GET['p'];

        if(!isset($uri))
        {
            $uri = '';

        }

        switch($uri)
        {
            case 'home':
                $this->home();

            case 'cat':
                $this->cat();

            case 'contact':
                $this->contact();

            default:
                $this->home();
        }
    }

    public function home() 
    {
        $app = $this->homeModel->displayHome();

        include_once('view/home.php');
        exit();
    }

    public function cat() 
    {
        $app = 'Catalogus';

        include_once('view/catalogus.php');
        exit();
    }

    public function contact() 
    {
        $app = $this->contactController->makeContactForm();

        include_once('view/contact.php');
        exit();
    }

}
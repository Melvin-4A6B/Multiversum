<?php

require_once('model/homeModel.php');
require_once('controller/contactController.php');
require_once('controller/catalogusController.php');
require_once('controller/detailsController.php');

class homeController {

    public function __construct()
    {
        $this->homeModel = new homeModel();
        $this->contactController = new contactController();
        $this->catalogusController = new catalogusController();
        $this->detailsController = new detailsController();
        $this->router();
    }

    public function router()
    {
        $uri = $_GET['p'];

        if(!isset($uri))
        {
            $uri = '';
            header('Location: ?p=home');
            exit();
        }

        switch($uri)
        {
            case 'home':
                $this->home();

            case 'cat':
                $this->cat();
            
            case 'details':
                $this->details();

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
        $app = $this->catalogusController->showCatalogus();

        include_once('view/catalogus.php');
        exit();
    }

    public function details()
    {
        $app = $this->detailsController->showDetails();

        include_once('view/details.php');
        exit();
    }

    public function contact() 
    {
        $app = $this->contactController->makeContactForm();

        include_once('view/contact.php');
        exit();
    }

}
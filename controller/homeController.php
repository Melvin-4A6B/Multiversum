<?php

require_once('model/homeModel.php');
require_once('controller/contactController.php');
require_once('controller/catalogusController.php');
require_once('controller/detailsController.php');
require_once('model/adminModel.php');

class homeController {

    public function __construct()
    {
        $this->homeModel = new homeModel();
        $this->contactController = new contactController();
        $this->catalogusController = new catalogusController();
        $this->detailsController = new detailsController();
        $this->adminModel = new adminModel();
        $this->router();
    }

    //simpel php router
    public function router()
    {
        $uri = $_GET['p'];

        if(!isset($uri))
        {
            $uri = '';
            header('Location: ?p=home');
            exit();
        }
        
        //switch tussen alle mogelijke cases (paginas)
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

            case 'admin':
                $this->adminPrivileges();

            default:
                $this->home();
        }
    }

    public function home() 
    {
        $app = $this->homeModel->showSales();

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

    public function adminPrivileges()
    {
        $app = $this->adminModel->displayAdmin();

        include_once('view/admin/admin.php');
        exit();
    }

}
<?php

require_once('model/homeModel.php');
require_once('controller/contactController.php');
require_once('controller/catalogusController.php');
require_once('controller/detailsController.php');
require_once('controller/searchController.php');
require_once('model/adminModel.php');
require_once('controller/adminController.php');

class homeController {

    public function __construct()
    {
        $this->homeModel = new homeModel();
        $this->contactController = new contactController();
        $this->catalogusController = new catalogusController();
        $this->detailsController = new detailsController();
        $this->searchController = new searchController();
        $this->adminModel = new adminModel();
        $this->adminController = new adminController();
        $this->router();
    }

    //simpel php router
    public function router()
    {
        $uri = $_GET['p'];
  
        //switch tussen alle mogelijke cases (paginas)
        switch($uri)
        {
            case 'home':
                $this->home();
                break;

            case 'cat':
                $this->cat();
                break;

            case 'details':
                $this->details();
                break;

            case 'contact':
                $this->contact();
                break;

            case 'search':
                $this->search();
                break;

            case 'admin':
                $this->adminPrivileges();
                break;

            case 'create':
                $this->create();
                break;

            case 'update':
                $this->update();
                break;

            case 'delete':
                $this->delete();
                break;
                
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

    public function search()
    {
        $app = $this->searchController->showSearch();

        include_once('view/search.php');
        exit();
    }

    public function adminPrivileges()
    {
        $app = $this->adminModel->displayAdmin();

        include_once('view/admin/admin.php');
        exit();
    }

    // public function create()
    // {

    //     $app = $this->adminController->collectUpdateProduct();

    //     include_once('view/admin/create.php');
    //     exit();
    // }


    public function update()
    {

        $app = $this->adminController->collectUpdateProduct();

        include_once('view/admin/update.php');
        exit();
    }


    public function delete()
    {

        $app = $this->adminController->collectDeleteProduct();

        include_once('view/admin/delete.php');
        exit();
    }

}
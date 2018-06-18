<?php

require_once('model/homeModel.php');
require_once('model/afmeldenModel.php');
require_once('model/adminModel.php');

require_once('controller/contactController.php');
require_once('controller/catalogusController.php');
require_once('controller/detailsController.php');
require_once('controller/searchController.php');
require_once('controller/loginController.php');
require_once('controller/cartController.php');


class homeController {

    public function __construct()
    {
        $this->homeModel = new homeModel();
        $this->contactController = new contactController();
        $this->catalogusController = new catalogusController();
        $this->detailsController = new detailsController();
        $this->searchController = new searchController();
        $this->loginController = new loginController();
        $this->afmeldenModel = new afmeldenModel();
        $this->cartController = new cartController();
        $this->adminModel = new adminModel();
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

            case 'login':
                $this->login();
                break;

            case 'afmelden':
                $this->afmelden();
                break;    

            case 'cart':
                $this->cart();
                break;    

            case 'admin':
                $this->adminPrivileges();
                break;
                
            default:
                $this->home();
        }
    }

    public function home() 
    {
        $app = $this->homeModel->showSales();

        
        $content = file_get_contents('view/home.php');
        // add check if template exists

        // render template and replace values with data given
        $render = str_replace('xxxTxxx', $app, $content);

        //these three line could/should be a sperate render function/method/thingy
        require_once('assets/custom/template/header.php');
        echo $render;
        require_once('assets/custom/template/footer.php');
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

    public function login()
    {
        $app = $this->loginController->validateLogin();

        include_once('view/admin/login.php');
        exit();
    }

    public function afmelden()
    {
        $app = $this->afmeldenModel->afmelden(); 

        include_once('view/admin/login.php');
        exit();
    }

    public function cart()
    {
        $app = $this->cartController->makeCart();

        include_once('view/cart.php');
        exit();
    }

    public function adminPrivileges()
    {
        $app = $this->adminModel->displayAdmin();

        include_once('view/admin/admin.php');
        exit();
    }

}
<?php

require_once('model/homeModel.php');
require_once('model/afmeldenModel.php');
require_once('controller/adminController.php');

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
        $this->adminController = new adminController();
        $this->router();
    }

    //simpel php router
    public function router()
    {
        $uri = explode('/', explode("?", trim($_SERVER['REQUEST_URI'], "/"))[0], 2);

        //switch tussen alle mogelijke cases (paginas)
        switch($uri[0])
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

    private function render($view, $app)
    {
        $content = file_get_contents($view);
        $render = str_replace('xxxTxxx', $app, $content);

        require_once('assets/custom/template/header.php');
        echo $render;
        require_once('assets/custom/template/footer.php');
    }

    public function home() 
    {
        $app = $this->homeModel->showSales();
        $this->render('view/home.php', $app);
    }

    public function cat() 
    {
        $app = $this->catalogusController->showCatalogus();
        $this->render('view/catalogus.php', $app);
    }

    public function details()
    {
        $app = $this->detailsController->showDetails();
        $this->render('view/details.php', $app);
    }

    public function contact() 
    {
        $app = $this->contactController->makeContactForm();
        $this->render('view/contact.php', $app);
    }

    public function search()
    {
        $app = $this->searchController->showSearch();
        $this->render('view/search.php', $app);
    }

    public function login()
    {
        $app = $this->loginController->validateLogin();
        $this->render('view/admin/login.php', $app);
    }

    public function afmelden()
    {
        $app = $this->afmeldenModel->afmelden(); 
        $this->render('view/admin/login.php', $app);
    }

    public function cart()
    {
        $app = $this->cartController->makeCart();
        $this->render('view/cart.php', $app);
    }

    public function adminPrivileges()
    {
        $app = $this->adminModel->displayAdmin();
        $this->render('view/admin/admin.php', $app);
    }

    public function create()
    {

        $app = $this->adminController->collectCreateProduct();

        include_once('view/admin/create.php');
        exit();
    }

    public function update()
    {
        $app = $this->adminController->collectUpdateProduct();
        $this->render('view/admin/update.php', $app);
    }


    public function delete()
    {
        $app = $this->adminController->collectDeleteProduct();
        $this->render('view/admin/delete.php', $app);
    }

}
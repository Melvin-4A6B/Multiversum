<?php

require_once('model/homeModel.php');

class homeController {

    public function __construct()
    {
        $this->homeModel = new homeModel();
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
        $app = 'Home';

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
        $app = 'Contact';

        include_once('view/contact.php');
        exit();
    }

}
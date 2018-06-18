<?php

require_once('model/loginModel.php');

class loginController {

    public function __construct()
    {
        $this->loginModel = new loginModel();
    }

    public function validateLogin()
    {
        $app = $this->loginModel->submitLogin();

        include_once('view/admin/login.php');
        exit();
    }

}
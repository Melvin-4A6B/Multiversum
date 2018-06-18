<?php

class afmeldenModel {

    public function afmelden()
    {
        session_start();
        session_destroy();
        header('Location: index.php?p=home');
        exit();
    }

}
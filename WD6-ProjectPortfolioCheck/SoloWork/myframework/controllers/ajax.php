<?php

class ajax extends AppController
{
    public function __construct()
    {
    }

    public function index()
    {
        // default method
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"ajax"));
        $this->getView('login');
        $this->getView('footer');
    }

    public function ajaxParams()
    {
        if (@$_REQUEST["username"]=="sean" && @$_REQUEST["password"]=="root") {
            echo "welcome";
            $_SESSION["loggedin"] = 1;
        } else {
            echo "invalid";
        }
    }

    public function userHome()
    {
        $this->getView('header');
        $this->getView('navigation');
        $this->getView('userHome');
        $this->getView('footer');
    }
}

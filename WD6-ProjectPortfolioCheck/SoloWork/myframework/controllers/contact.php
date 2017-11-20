<?php

class contact extends AppController
{
    public function __construct()
    {
    }

    public function index()
    {
        // default method
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"contact"));
        $random = substr(md5(rand()), 0, 7);
        $this->getView('contact', array("cap"=>$random));
        $this->getView('footer');
    }

    public function formRecv()
    {
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"contact"));
        if (@$_REQUEST["captcha"]==$_SESSION["captcha"]) {
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                header("Location:/contact?error=Invalid Email");
            } else {
                $this->getView('formRecv');
            }
        } else {
            header("Location:/contact?error=Bad Captcha");
        }
        $this->getView('footer');
    }
}

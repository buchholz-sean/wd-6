<?php

class welcome extends AppController
{
    public function __construct()
    {
    }

    public function index()
    {
        // default method
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"welcome"));
        $this->getView('welcome');
        $this->getView('modal');
        $this->getView('footer');
    }

    public function thanks()
    {
        $this->getView('header');
        $this->getView('navigation', array("pagename"=>"welcome"));
        $this->getView('thanks');
        $this->getView('footer');
    }
}

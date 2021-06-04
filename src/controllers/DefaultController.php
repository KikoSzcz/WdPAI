<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('mainSite');
    }

    public function login()
    {
        $this->render('login');
    }

    public function mainSite()
    {
        $this->render('mainSite');
    }

    public function projects()
    {
        $this->render('projects');
    }
}
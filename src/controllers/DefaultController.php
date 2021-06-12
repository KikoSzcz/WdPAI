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

    public function errorPage()
    {
        $this->render('errorPage');
    }

    public function editAccountPage()
    {
        $this->render('editAccountPage');
    }

    public function usersList()
    {
        $this->render('usersList');
    }

    public function creatNewMessage()
    {
        $this->render('creatNewMessage');
    }
}
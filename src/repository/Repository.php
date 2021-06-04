<?php

require_once __DIR__.'/../../Database.php';

class Repository
{
    protected $database;

    //TODO zastosować wzorzec projektowy np silgleton aby ta instancja tworzyła się
    //jako jeden obiekt istniejący w całym programie

    public function __construct()
    {
        $this->database = new Database();
    }
}
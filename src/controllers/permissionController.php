<?php
require_once __DIR__.'/../../Database.php';

class permissionController
{
    private $email;
    private $database;

    public function __construct(){
        $this->email = json_decode($_COOKIE['user'], true)['email'];
        $this->database = new Database();
    }

    public function isUserAdmin(){
        $stmt = $this->database->connect()->prepare(
          'SELECT "WebsitePremission" FROM public."UsersPremission" WHERE "Email"=:email'
        );
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);

        if($respond['WebsitePremission']===1){
            return true;
        }
        else{
            return false;
        }
    }
}
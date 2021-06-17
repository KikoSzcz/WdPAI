<?php
require_once __DIR__.'/../../Database.php';

class userGroup
{
    private $database;

    public function __construct(){
        $this->database = new Database();
    }
    public function getAllGroupName(){
        $stmt = $this->database->connect()->prepare(
            'SELECT "GroupName" FROM public."UsersGroup"'
        );
        $stmt->execute();
        $respond = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $respond;
    }

    public function getThisGroupUsers($groupName){
        $stmt = $this->database->connect()->prepare(
            'SELECT "EmailList" FROM public."UsersGroup" WHERE "GroupName"=:gropuName'
        );
        $stmt->bindParam(':gropuName', $groupName, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respond;
    }

    public function getAllUsers(){
        $stmt = $this->database->connect()->prepare(
            'SELECT "email" FROM public."users"'
        );
        $stmt->execute();
        $respond = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $respond;
    }

    public function deleteThisGroup($groupName){
        $stmt = $this->database->connect()->prepare(
            'DELETE FROM public."UsersGroup" WHERE "GroupName"=:gropuName'
        );
        $stmt->bindParam(':gropuName', $groupName, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function createNewGroup($groupName, $emailList){
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO public."UsersGroup"("GroupName", "EmailList") VALUES(:groupName, :emailList)'
        );
        $stmt->bindParam(':groupName', $groupName, PDO::PARAM_STR);
        $stmt->bindParam(':emailList', $emailList, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editThisGroup($groupName, $emailList){
        $stmt = $this->database->connect()->prepare(
            'UPDATE public."UsersGroup" SET "EmailList"=:emailList WHERE "GroupName"=:groupName'
        );
        $stmt->bindParam(':groupName', $groupName, PDO::PARAM_STR);
        $stmt->bindParam(':emailList', $emailList, PDO::PARAM_STR);
        $stmt->execute();
    }
}
<?php
require_once __DIR__.'/../../Database.php';

class deleteMessage
{
    static function deleteMessageByID($id, $typeOfMessage){
        $email = json_decode($_COOKIE['user'], true)['email'];
        $database = new Database();

        $stmt = $database->connect()->prepare('
        SELECT "'.$typeOfMessage.'" FROM public."UsersMessage" WHERE "Email"=:email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);
        $idString = $respond[$typeOfMessage];
        $idArray = explode(" ", $idString);
        $idString = "";
        echo $id.' ';
        for($i = 0; $i <= sizeof($idArray); $i++){
            if($i!=$id){
                $idString = $idString.$idArray[$i]." ";
            }
        }
        echo $idString;
        $idString = substr($idString, 0, -2);
        if(strlen($idString) === 0){
            $idString = null;
        }
        $stmt = $database->connect()->prepare('
        UPDATE public."UsersMessage" SET "'.$typeOfMessage.'"=:newMessageValue WHERE "Email"=:email
        ');
        $stmt->bindParam(':newMessageValue', $idString, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
    }
}
<?php
require_once __DIR__.'/../../Database.php';

class saveUserInformationInDatabase
{
    public function saveUserInformation($email, $name, $surname, $image){

        $database = new Database();
        $stmt = $database->connect()->prepare('
        UPDATE public.users SET name=:name, surname=:surname WHERE email=:email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = $database->connect()->prepare('
        UPDATE public.user_details SET image=:image WHERE email=:email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editCookie($email, $name, $surname, $code){
        $expired = time() + (86400 * 30);
        setcookie('user', json_encode(['email' => $email,'name' => $name, 'surname'=>$surname, 'code' => $code]), $expired, '/');
    }
}
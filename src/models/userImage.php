<?php

require_once __DIR__.'/../../Database.php';

class userImage
{
    public function getImageFromDatabase($email)
    {
        $database = new Database();

        $stmt = $database->connect()->prepare('
        SELECT image FROM public.user_details WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respond['image'];
    }

    public function getUserImage()
    {
        $email = json_decode($_COOKIE['user'], true)['email'];
        $image = userImage::getImageFromDatabase($email);


        //Jeśli użytkownik nie ma zdjęcia to dodajemy podstawowe zdjecie
        if(!strpos($image, 'image'))
        {
            $image = userImage::getImageFromDatabase('defaultUserPhoto');
        }
        print_r($image);
    }
}
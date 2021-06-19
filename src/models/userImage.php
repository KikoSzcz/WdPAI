<?php

require_once __DIR__.'/../../Database.php';

class userImage
{
    public function getImageFromDatabase($email)
    {
        $database = new Database();

        $stmt = $database->connect()->prepare('
        SELECT image FROM public.users JOIN user_details ud on users.id = ud.user_id WHERE email=:email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);

        //Jeśli użytkownik nie ma zdjęcia to dodajemy podstawowe zdjecie
        if(!strpos($respond['image'], 'image'))
        {
            $respond['image'] = userImage::getImageFromDatabase('defaultUser');
        }

        return $respond['image'];
    }

    public function getUserImage()
    {
        $email = json_decode($_COOKIE['user'], true)['email'];
        $image = userImage::getImageFromDatabase($email);

        print_r($image);
    }
}
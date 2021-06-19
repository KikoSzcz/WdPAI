<?php
require_once __DIR__.'/../../Database.php';

class registerUser
{
    public static function registerNewUser($email, $password, $name, $surname){
        $database = new Database();

        $password = md5($password);

        $stmt = $database->connect()->prepare('
        SELECT * FROM users WHERE "email"=:email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch();
        if($respond){
            echo 'User with this email exist!';
        }
        else
        {
            $stmt = $database->connect()->prepare('
            INSERT INTO users("email", "password") VALUES(:email, :password) RETURNING id;
            ');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $respond = $stmt->fetch(PDO::FETCH_ASSOC);
            $id = $respond['id'];

            $stmt = $database->connect()->prepare('
            INSERT INTO user_details("name", "surname", "user_id") VALUES(:name, :surname, :id);
            ');
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            echo 'Registration succesfull!';

        }
        echo md5('haslo');
    }
}


//INSERT INTO "UsersMessage"("SendID", "user_id") VALUES(:SendID, (SELECT id FROM users WHERE email=:email));

//INSERT INTO public."Messages"("Title", "ToWho", "FromWho", "MessageText", "Attachment", "AttachmentName") VALUES (:title, :towho, :fromwho, :messagestext, :attachment, :attachmentName) RETURNING id
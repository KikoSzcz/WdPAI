<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';


class UserRepository extends Repository
{
    public function getUser(string $email): ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user == false){
            //TODO zwrócić excepction zamiast null
            return null;
        }


        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users JOIN user_details ud on users.id = ud.user_id WHERE email=:email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        return new User(
            $user['email'],
            $user['password'],
            $userDetails['name'],
            $userDetails['surname']
        );
    }
}
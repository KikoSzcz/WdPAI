<?php
require_once __DIR__.'/../../Database.php';


class SessionController
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }


    public function setCookie(string $coockie_email){
        $expired = time() + (86400 * 30);
        $randomString = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil(250/strlen($x)) )),1,250);

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $coockie_email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);

        setcookie('user', json_encode(['email' => $coockie_email,'name' => $respond['name'], 'surname'=>$respond['surname'], 'code' => $randomString]), $expired, '/');

        $respond = $this->getSessionByEmail($coockie_email);
        $this->setSession($coockie_email, $randomString, $respond);
    }

    private function getSessionByEmail(string $email){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.session WHERE email=:email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function setSession(string $email, string $code, $respond){
        $query = 'UPDATE public.session SET code=:code WHERE email=:email';
        if(!$respond){
            $query = 'INSERT INTO public.session (email, code, created_at) VALUES (:email, :code, NOW())';
        }

        $stmt = $this->database->connect()->prepare($query);

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function checkCookieWithDatabase() : bool{
        $cookie = json_decode($_COOKIE['user'], true);

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.session WHERE email = :email AND code = :code
        ');
        $stmt->bindParam(':email', $cookie['email'], PDO::PARAM_STR);
        $stmt->bindParam(':code', $cookie['code'], PDO::PARAM_STR);
        $stmt->execute();

        $respond = $stmt->fetch(PDO::FETCH_ASSOC);
        if($respond){
            return True;
        }
        return False;

    }

    public function deleteCoockieInDatabase(){
        $cookie = json_decode($_COOKIE['user'], true);

        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.session WHERE email = :email AND code = :code
        ');
        $stmt->bindParam(':email', $cookie['email'], PDO::PARAM_STR);
        $stmt->bindParam(':code', $cookie['code'], PDO::PARAM_STR);
        $stmt->execute();
    }
}
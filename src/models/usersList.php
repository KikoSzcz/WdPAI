<?php
require_once __DIR__.'/../../Database.php';
require_once __DIR__.'/userImage.php';

class usersList
{
    protected $database;

    public function __construct()
    {
        $this->database = new Database();
    }


    public function getAllUsersData(){
        //get all users email

        $userInformation = $this->getUsersInfo();
        $imageArray = $this->getImageFormDatabase();
        $defaultPhoto = $this->getDefaultImage();
        $surnameArray = [];
        $usersEmails = [];
        $usersName = [];
        $usersSurname = [];
        $usersImage = [];

        for($i = 0; $i<sizeof($userInformation);$i++)
        {
            array_push($surnameArray, $userInformation[$i]['surname']);
        }
        sort($surnameArray);

        for($i = 0; $i<sizeof($userInformation);$i++)
        {
            for($j = 0; $j<sizeof($surnameArray);$j++)
            {
                if($userInformation[$j]['surname'] === $surnameArray[$i])
                {
                    array_push($usersEmails, $userInformation[$j]['email']);
                    array_push($usersName, $userInformation[$j]['name']);
                    array_push($usersSurname, $userInformation[$j]['surname']);

                    for($k = 0; $k<sizeof($imageArray);$k++)
                    {
                        if($imageArray[$k]['email'] === $userInformation[$j]['email'])
                        {
                            $image = $imageArray[$k]['image'];
                            if(!strpos($image, 'image'))
                            {
                                array_push($usersImage, $defaultPhoto);
                            }
                            else
                            {
                                array_push($usersImage, $image);
                            }
                            break;
                        }
                    }
                    break;
                }
            }
        }

        return array($usersEmails, $usersName, $usersSurname, $usersImage);
    }

    public function getUsersInfo(){
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.user_details');
        $stmt->execute();
        $respond = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $respond;
    }

    public function getFromDatabase($value){
        $stmt = $this->database->connect()->prepare('SELECT '.$value.' FROM public.users');
        $stmt->execute();

        $respond = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $respond;
    }

    public function getImageFormDatabase(){
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.user_details');
        $stmt->execute();

        $respond = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $respond;
    }

    public function getDefaultImage(){
        //get default photo
        $stmt = $this->database->connect()->prepare('SELECT image FROM public.user_details WHERE email=\'defaultUserPhoto\'');
        $stmt->execute();
        $defaultPhoto = $stmt->fetch(PDO::FETCH_ASSOC);
        $defaultPhoto = $defaultPhoto['image'];
        return $defaultPhoto;
    }
}
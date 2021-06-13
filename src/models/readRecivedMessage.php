<?php
require_once __DIR__.'/../../Database.php';

class readRecivedMessage
{
    private $id = [];
    public $titles = [];
    public $ToWho = [];
    public $fromWho = [];
    public $message = [];
    public $attachments = [];
    public $attachmentsName = [];
    private $email;
    private $database;


    public function __construct()
    {
        $this->email = json_decode($_COOKIE['user'], true)['email'];
        $this->database = new Database();
    }

    public function readInfromation()
    {
        $this->getIdList();

        if($this->id !== null)
        {
            $this->getMessageInformation();
        }
    }

    function getMessageInformation()
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public."Messages" WHERE "id"=:id
        ');
        for($i = 0; $i < sizeof($this->id); $i++)
        {
            $stmt->bindParam(':id', $this->id[$i], PDO::PARAM_STR);
            $stmt->execute();
            $respond = $stmt->fetch(PDO::FETCH_ASSOC);

            array_push($this->titles, $respond['Title']);
            array_push($this->ToWho, $respond['ToWho']);
            array_push($this->fromWho, $respond['FromWho']);
            array_push($this->message, $respond['MessageText']);
            array_push($this->attachments, $respond['Attachment']);
            array_push($this->attachmentsName, $respond['AttachmentName']);
        }

    }

    function getIdList()
    {
        $stmt = $this->database->connect()->prepare('
        SELECT "RecivedID" FROM public."UsersMessage" WHERE "Email"=:email
        ');
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$respond['RecivedID'])
        {
            $this->id = null;
        }
        else
        {
            $this->id = explode(" ", $respond['RecivedID']);
        }
    }
}
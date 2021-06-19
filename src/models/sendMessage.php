<?php
require_once __DIR__.'/../../Database.php';
require_once __DIR__.'/userGroup.php';

class sendMessage
{
    private $emails;
    private $title;
    private $message;
    private $attachments;
    private $attachmentsName;
    private $fromWho;
    private $database;

    public function __construct($emails, $fromWho, $title, $message, $attachments, $attachmentsName)
    {
        $this->emails = $emails;
        $this->fromWho = $fromWho;
        $this->title = $title;
        $this->message = $message;
        $this->attachments = $attachments;
        $this->attachmentsName = $attachmentsName;

        $this->database = new Database();
    }

    public function send(){
        $this->attachmentsEdit();
        $newMessageId = $this->addMessageToDatabase();
        $this->addMessageToSenderTable($newMessageId);
        $this->addMessageToRecivedTable($newMessageId);
    }

    function addMessageToRecivedTable(string $id){
        $emails = explode(" ", $this->emails);
        $emailsNumber = sizeof($emails);

        for($i = 0; $i<$emailsNumber; $i++) {
            if(strpos($emails[$i], '@')){
                $this->saveToDatabase($emails[$i], $id);
            }
            else
            {
                $dbOperation = new userGroup();
                $thisGroupUsers = $dbOperation->getThisGroupUsers($emails[$i]);
                $thisGroupUsers = explode(" ", $thisGroupUsers['EmailList']);

                for($j = 0; $j<sizeof($thisGroupUsers); $j++){
                    $this->saveToDatabase($thisGroupUsers[$j], $id);
                }
            }

        }
    }

    function saveToDatabase($email, $id){
        $stmt = $this->database->connect()->prepare('
        SELECT "RecivedID" FROM users JOIN "UsersMessage" UM on users.id = UM.user_id WHERE email=:email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$respond)
        {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO "UsersMessage"("RecivedID", "user_id") VALUES(:RecivedID, (SELECT id FROM users WHERE email=:email));
            ');
            $stmt->bindParam(':RecivedID', $id, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        }
        else
        {
            $respond['RecivedID'] = $respond['RecivedID'].' '.$id;
            if($respond['RecivedID'][0]==' '){
                $respond['RecivedID'] = substr($respond['RecivedID'], 1);
            }


            $stmt = $this->database->connect()->prepare('
            UPDATE "UsersMessage" SET "RecivedID"=:RecivedID FROM users WHERE user_id = users.id AND email=:email
            ');
            $stmt->bindParam(':RecivedID', $respond['RecivedID'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        }
    }

    function addMessageToSenderTable(string $id){
        $stmt = $this->database->connect()->prepare('
        SELECT "SendID" FROM users JOIN "UsersMessage" UM on users.id = UM.user_id WHERE email=:email
        ');
        $stmt->bindParam(':email', $this->fromWho, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$respond)
        {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO "UsersMessage"("SendID", "user_id") VALUES(:SendID, (SELECT id FROM users WHERE email=:email));
            ');
            $stmt->bindParam(':SendID', $id, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->fromWho, PDO::PARAM_STR);
            $stmt->execute();
        }
        else
        {
            $respond['SendID'] = $respond['SendID'].' '.$id;
            if($respond['SendID'][0]==' '){
                $respond['SendID'] = substr($respond['SendID'], 1);
            }


            $stmt = $this->database->connect()->prepare('
            UPDATE "UsersMessage" SET "SendID"=:SendID FROM users WHERE user_id = users.id AND email=:email
            ');
            $stmt->bindParam(':SendID', $respond['SendID'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->fromWho, PDO::PARAM_STR);
            $stmt->execute();
        }
    }

    function attachmentsEdit(){
        if($this->attachments!==null)
        {
            $attachmentsNumber = sizeof($this->attachments);
            $tempAttachments = '';
            for($i = 0; $i<$attachmentsNumber; $i++){
                $tempAttachments = $tempAttachments.$this->attachments[$i].' ';
            }
            $this->attachments = $tempAttachments;
        }

    }

    function addMessageToDatabase(){
        $stmt = $this->database->connect()->prepare('
        INSERT INTO public."Messages"("Title", "ToWho", "FromWho", "MessageText", "Attachment", "AttachmentName") VALUES (:title, :towho, :fromwho, :messagestext, :attachment, :attachmentName) RETURNING id
        ');

        $stmt->bindParam(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindParam(':towho', $this->emails, PDO::PARAM_STR);
        $stmt->bindParam(':fromwho', $this->fromWho, PDO::PARAM_STR);
        $stmt->bindParam(':messagestext', $this->message, PDO::PARAM_STR);
        $stmt->bindParam(':attachment', $this->attachments, PDO::PARAM_STR);
        $stmt->bindParam(':attachmentName', $this->attachmentsName, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);
        return $respond['id'];
    }
}
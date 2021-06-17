<?php
require_once 'userGroup.php';

class adminPanel
{
    public static function showAllusers(){
        $dbOperation = new userGroup();
        $users = $dbOperation->getAllUsers();
        for($i = 0;$i<sizeof($users);$i++)
        {
            echo '<option>'.$users[$i]['email'].'</option>';
        }
    }

    public static function showAllGroup(){
        $dbOperation = new userGroup();
        $users = $dbOperation->getAllGroupName();
        for($i = 0;$i<sizeof($users);$i++)
        {
            echo '<option>'.$users[$i]['GroupName'].'</option>';
        }

    }

    public static function showUserInGroup($groupName){
        $dbOperation = new userGroup();
        $allUsers = $dbOperation->getAllUsers();
        $thisGroupUsers = $dbOperation->getThisGroupUsers($groupName);
        $users = '';
        for($i = 0;$i<sizeof($allUsers);$i++)
        {
            if(strpos($thisGroupUsers['EmailList'], $allUsers[$i]['email']) !== false){
                $users = $users.'<option class="valueInList">'.$allUsers[$i]['email'].'</option>';
            }
            else
            {
                $users = $users.'<option>'.$allUsers[$i]['email'].'</option>';
            }
        }
        return $users;
    }

    public static function addNewGroup($groupName, $emailList){
        $dbOperation = new userGroup();
        $dbOperation->createNewGroup($groupName, $emailList);
    }

    public static function editGroup($groupName, $emailList){
        $dbOperation = new userGroup();
        $dbOperation->editThisGroup($groupName, $emailList);
    }

    public static function deleteGroup($groupName){
        $dbOperation = new userGroup();
        $dbOperation->deleteThisGroup($groupName);
    }
}
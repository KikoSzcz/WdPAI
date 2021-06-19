<?php
require_once __DIR__.'/../../src/models/adminPanel.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/awesome/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="public/js/adminPanel.js"></script>
    <title>Admin panel</title>
</head>
<body>
<?php require_once __DIR__.'/../../public/viewsModules/navBar.php'; ?>
<div class="container">
    <div class="addNewGroup">
        <p class="addNewGroupTitle">Add new group</p>
        <p class="addNewDesc">Group name:</p>
        <input name="addNewName"/>
        <p class="addNewDesc">Users:</p>
        <select name="addNewUsers" onchange="boldOrUnboldThis('addNewUsers')">
            <option>---</option>
            <?php adminPanel::showAllusers(); ?>
        </select>
        <input type="button" name="addNewButton" value="Add" onclick="addNewGroup()" />
    </div>
    <div class="editGroup">
        <p class="editGroupTitle">Edit group</p>
        <p class="editDesc">Group name:</p>
        <select name="editName" onchange="editGroupShowUsers()">
            <option>---</option>
            <?php adminPanel::showAllGroup(); ?>
        </select>
        <p class="editDesc">Users:</p>
        <select name="editUsers" onchange="boldOrUnboldThis('editUsers')">
            <option>---</option>
        </select>
        <input type="button" name="editGroupButton" value="Save" onclick="saveEditedGroup()"/>
    </div>
    <div class="deleteGroup">
        <p class="deleteGroupTitle">Delete group</p>
        <p class="deleteDesc">Group name:</p>
        <select name="deleteName">
            <option>---</option>
            <?php adminPanel::showAllGroup(); ?>
        </select>
        <input type="button" name="deleteGroupButton" value="Delete" onclick="deleteGroupInDatabase()"/>
    </div>
</div>
</br></br></br></br>
</body>
</html>
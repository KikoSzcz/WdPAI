function editGroupShowUsers(){
    selectedGroup = document.querySelector('select[name=editName]').value;

    jQuery.post('src/postScript/adminPanelShowUsers.php',{
        selectedGroup: selectedGroup
    },
    function (data)
    {
        htmlSelect = document.querySelector('select[name=editUsers]');
        htmlSelect.innerHTML = '<option>---</option>'+data;
        setBoldSelectedEarlier();
    });
}

function boldOrUnboldThis(selectName){
    selectHTML = document.querySelector('select[name='+selectName+']');
    indexClicked = selectHTML.selectedIndex;
    if(indexClicked!=0)
    {
        if(selectHTML.children[indexClicked].style.fontWeight == '700')
        {
            selectHTML.children[indexClicked].style.fontWeight = '400';
        }
        else
        {
            selectHTML.children[indexClicked].style.fontWeight = '700';
        }
    }
}

function setBoldSelectedEarlier()
{
    selectHTML = document.querySelector('select[name=editUsers]');
    optionArray = selectHTML.children;
    for(i = 0; i<optionArray.length; i++)
    {
        if(optionArray[i].classList.contains('valueInList'))
        {
            optionArray[i].style.fontWeight = '700';
        }
    }
}

function selectedUserToString(selectName)
{
    selectHTML = document.querySelector('select[name='+selectName+']');
    optionArray = selectHTML.children;
    stringToReturn = '';
    for(i = 0; i<optionArray.length; i++)
    {
        if(optionArray[i].style.fontWeight == '700')
        {
            stringToReturn += ' '+optionArray[i].text;
        }
    }

    stringToReturn = stringToReturn.substr(1);

    return stringToReturn;
}

function unBoldAll(selectName)
{
    selectHTML = document.querySelector('select[name='+selectName+']');
    optionArray = selectHTML.children;
    for(i = 0; i<optionArray.length; i++)
    {
        optionArray[i].style.fontWeight = '400';
    }
}

function addNewGroup()
{
    groupName = document.querySelector('input[name=addNewName]').value;
    userList = selectedUserToString('addNewUsers');

    jQuery.post('src/postScript/adminPanelAddNewGroup.php',{
            groupName: groupName,
            userList: userList
        },
        function (data)
        {
            window.location.reload(true);
        });
}

function saveEditedGroup()
{
    groupName = document.querySelector('select[name=editName]').value;
    userList = selectedUserToString('editUsers');

    jQuery.post('src/postScript/adminPanelEditGroup.php',{
        groupName: groupName,
        userList: userList
    },
    function (data)
    {
        window.location.reload(true);
    });
}

function deleteGroupInDatabase()
{
    groupName = document.querySelector('select[name=deleteName]').value;
    jQuery.post('src/postScript/adminPanelDeleteGroup.php',{
            groupName: groupName
        },
        function (data)
        {
            window.location.reload(true);
        });
}
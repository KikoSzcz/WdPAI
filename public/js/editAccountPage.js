var email, name, surname, image;

function editAccount(){
    userDetails = document.querySelectorAll('.right-account-details p');
    email = userDetails[0].innerText;
    name = userDetails[1].innerText;
    surname = userDetails[2].innerText;

    image = document.querySelector('.right-account-details img').src;


    userDetails[1].innerHTML = '<input type="text" value="'+name+'"/>';
    userDetails[2].innerHTML = '<input type="text" value="'+surname+'"/>';
    userDetails[3].innerHTML = '<img src="'+image+'"></br><input id="imageInput" type="file" accept="image/*" onchange="putNewImageIntoImgSrc()">';

    buttonDiv = document.querySelector('.edit-account-buttons');

    buttonDiv.innerHTML = '<input type="button" id="saveButton" value="Save changes" onclick="saveChanges()"/><input type="button" id="cancelEditButton" value="Cancel edit" onclick="cancelEdit()">';
}

function cancelEdit(){
    userDetails = document.querySelectorAll('.right-account-details p');
    userDetails[1].innerHTML = name;
    userDetails[2].innerHTML = surname;
    userDetails[3].innerHTML = '<img src="'+image+'">';
    buttonDiv = document.querySelector('.edit-account-buttons');
    buttonDiv.innerHTML = '<input type="button" id="editButton" value="Edit account" onClick="editAccount()"/>';
}

function saveChanges(){
    userDetails = document.querySelectorAll('.right-account-details p input');
    name = userDetails[0].value;
    surname = userDetails[1].value;
    image = document.querySelector('.right-account-details img').src;

    imgNavBar = document.querySelector('.user_information_nav_bar img');
    imgNavBar.src = image;
    document.querySelector('.user_information_nav_bar p').innerText = name+' '+surname;

    jQuery.post('src/postScript/userEdit.php', {
        newName: name,
        newSurname: surname,
        newImage: image
    });

    cancelEdit();
}

function putNewImageIntoImgSrc(){
    const preview = document.querySelector('.right-account-details img');
    const file = document.querySelector('#imageInput').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
        // convert image file to base64 string
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}
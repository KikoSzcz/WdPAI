async function sendMessage(){

    attachments = await attachmentsToBase64();
    attachmentsName = document.querySelector('input[name=attachments]').files;
    attachmentsNumber = attachmentsName.length;
    tempAttach = '';
    for(i = 0; i < attachmentsNumber; i++)
    {
        tempAttach += attachmentsName[i].name+'<!!>';
    }
    attachmentsName = tempAttach;
    await new Promise(r => setTimeout(r, 2000));
    emailsList = document.querySelector('input[name=emailsList]').value;
    messageText = document.querySelector('textarea[name=messageText]').value;
    title = document.querySelector('input[name=title]').value;

    jQuery.post('src/postScript/sendMessage.php', {
        emailsList: emailsList,
        messageText: messageText,
        attachments: attachments,
        attachmentsName: attachmentsName,
        title: title
    },
    function (data)
    {
        document.querySelector('input[name=emailsList]').value = '';
        document.querySelector('textarea[name=messageText]').value = '';
        document.querySelector('input[name=title]').value = '';
        document.querySelector('input[name=attachments]').value = '';
        document.querySelector('.message').innerHTML = 'Message send!';
    });
}

async function attachmentsToBase64(){

    files = document.querySelector('input[name=attachments]').files;
    attachmentsNumber = files.length;
    fileBase64 = [];

    for(var i =0; i<attachmentsNumber; i++)
    {
        const reader = new FileReader();
        file = files[i];

        reader.addEventListener("load", function () {
            // convert file file to base64 string
            fileBase64.push(reader.result);
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    return fileBase64;
}
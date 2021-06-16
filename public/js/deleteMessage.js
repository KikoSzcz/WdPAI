async function deleteMessage(id, typeOfMessage){
    jQuery.post('src/postScript/deleteMessage.php', {
            id: id,
            typeOfMessage: typeOfMessage
        },
        function (data)
        {
            console.log(data);
        });

    if(typeOfMessage == 'RecivedID'){
        smallMessageContainer = document.querySelector('.leftSideRecivedMessage #r'+id);
        MessageContainer = document.querySelector('.rightSideRecivedMessage');
        smallMessageContainer.remove();
        MessageContainer.innerHTML = "";

    }
    if(typeOfMessage == 'SendID'){
        smallMessageContainer = document.querySelector('.leftSideSendedMessage #r'+id);
        MessageContainer = document.querySelector('.rightSideSendedMessage');
        smallMessageContainer.remove();
        MessageContainer.innerHTML = "";
    }
}
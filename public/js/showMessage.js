function displayMessageRecived(id){
    recivedMessageSmall = document.querySelectorAll('.recivedMessageSmall');
    for(i = 0; i <= recivedMessageSmall.length - 1 ; i++)
    {
        if(i==id)
        {
            recivedMessageSmall[i].style = 'font-weight: bold';
        }
        else
        {
            recivedMessageSmall[i].style = 'font-weight: 100';
        }
    }

    title = document.querySelector('.leftSideRecivedMessage #r'+id+' .title').innerHTML;
    fromWho = document.querySelector('.leftSideRecivedMessage #r'+id+' .fromWho').innerHTML;
    toWho = document.querySelector('.leftSideRecivedMessage #r'+id+' .toWho').innerHTML;
    message = document.querySelector('.leftSideRecivedMessage #r'+id+' .message').innerHTML;
    attachment = document.querySelector('.leftSideRecivedMessage #r'+id+' .attachment').innerHTML;
    attachmentName = document.querySelector('.leftSideRecivedMessage #r'+id+' input').value;
    attachmentName = attachmentName.split('<!!>');
    attachment = attachment.split(' ');
    attach = '';
    for(i = 0; i < attachment.length - 1 ; i++)
    {
        attach += '<a download="'+attachmentName[i]+'" href="'+attachment[i]+'">'+attachmentName[i]+'</a></br>';
    }

    contentDiv = document.querySelector('.recivedMessageContainer .rightSideRecivedMessage');

    contentDiv.innerHTML = '<input type="button" value="Answer" onclick="answerMessage()"/><input type="button" value="Delete" onclick="deleteMessage('+id+',\'RecivedID\')"/><p class="title">Title:</p><p class="titleMessage">'+title+'</p><p class="toWho">Recipients:</p><p class="toWhoMessage">'+toWho+'</p><p class="fromWho">Sender:</p><p class="fromWhoMessage">'+fromWho+'</p><textarea class="message" disabled>'+message+'</textarea><div class="attachment"><p class="files">Attachments:</p><p class="filesMessage">'+attach+'</p></div>';
}

function displayMessageSended(id){
    sendedMessageSmall = document.querySelectorAll('.sendedMessageSmall');
    for(i = 0; i <= sendedMessageSmall.length - 1 ; i++)
    {
        if(i==id)
        {
            sendedMessageSmall[i].style = 'font-weight: bold';
        }
        else
        {
            sendedMessageSmall[i].style = 'font-weight: 100';
        }
    }

    title = document.querySelector('.leftSideSendedMessage #r'+id+' .title').innerHTML;
    fromWho = document.querySelector('.leftSideSendedMessage #r'+id+' .fromWho').innerHTML;
    toWho = document.querySelector('.leftSideSendedMessage #r'+id+' .toWho').innerHTML;
    message = document.querySelector('.leftSideSendedMessage #r'+id+' .message').innerHTML;
    attachment = document.querySelector('.leftSideSendedMessage #r'+id+' .attachment').innerHTML;
    attachmentName = document.querySelector('.leftSideSendedMessage #r'+id+' input').value;
    attachmentName = attachmentName.split('<!!>');
    attachment = attachment.split(' ');
    attach = '';
    for(i = 0; i < attachment.length - 1 ; i++)
    {
        attach += '<a download="'+attachmentName[i]+'" href="'+attachment[i]+'">'+attachmentName[i]+'</a></br>';
    }

    contentDiv = document.querySelector('.sendedMessageContainer .rightSideSendedMessage');

    contentDiv.innerHTML = '<input type="button" value="Delete" onclick="deleteMessage('+id+',\'RecivedID\')"/><p class="title">Title:</p><p class="titleMessage">'+title+'</p><p class="toWho">Recipients:</p><p class="toWhoMessage">'+toWho+'</p><p class="fromWho">Sender:</p><p class="fromWhoMessage">'+fromWho+'</p><textarea class="message" disabled>'+message+'</textarea><div class="attachment"><p class="files">Attachments:</p><p class="filesMessage">'+attach+'</p></div>';
}
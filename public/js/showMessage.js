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

    contentDiv.innerHTML = '<p class="title">Title: '+title+'</p><p class="toWho">Recipients: '+toWho+'</p><p class="fromWho">Sender: '+fromWho+'</p><textarea class="message" disabled>'+message+'</textarea><div class="attachment"><p class="files">Attachments:</p>'+attach+'</div>';
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

    contentDiv.innerHTML = '<p class="title">Title: '+title+'</p><p class="toWho">Recipients: '+toWho+'</p><p class="fromWho">Sender: '+fromWho+'</p><textarea class="message" disabled>'+message+'</textarea><div class="attachment"><p class="files">Attachments:</p>'+attach+'</div>';
}
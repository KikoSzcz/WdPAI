function answerMessage()
{
    title = document.querySelector('.rightSideRecivedMessage .titleMessage').innerHTML;
    toWho = document.querySelector('.rightSideRecivedMessage .toWhoMessage').innerHTML;
    fromWho = document.querySelector('.rightSideRecivedMessage .fromWhoMessage').innerHTML;
    content = document.querySelector('.rightSideRecivedMessage textarea').innerHTML;


    state = {'title' : title, 'toWho': toWho, 'fromWho': fromWho, 'content': content};
    historyTitle = '';
    url = 'creatNewMessage';
    history.pushState(state, historyTitle, url);
    history.go(0);
}
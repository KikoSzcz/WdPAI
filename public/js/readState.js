function readStateAndPut() {
    if (history.state != null) {
        let state = history.state;
        document.querySelector('input[name=emailsList]').value = state['fromWho'];
        document.querySelector('input[name=title]').value = 'RE: ' + state['title'];
        document.querySelector('textarea[name=messageText]').value = '\n\n\nFrom: ' + state['From'] + '\nTo: ' + state['toWho'] + '\n\n' + state['content'];
        history.back();
    }
}
function showLogin(){
    document.querySelector('.register').style.display = 'none';
    document.querySelector('.login').style.display = 'block';
}

function showReister(){
    document.querySelector('.login').style.display = 'none';
    document.querySelector('.register').style.display = 'block';
}

window.addEventListener('load', function () {
    document.querySelector('.register').style.display = 'none'
})

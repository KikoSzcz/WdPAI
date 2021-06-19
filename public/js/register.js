function registerNewUser()
{
    email = document.querySelector('.register input[name=email]').value;
    password = document.querySelector('.register input[name=password]').value;
    name = document.querySelector('.register input[name=name]').value;
    surname = document.querySelector('.register input[name=surname]').value;

    jQuery.post('src/postScript/registerUser.php',{
        email: email,
        password: password,
        name: name,
        surname: surname
    },
    function(data){
        document.querySelector('.answer').innerHTML = data;
    });
}
function showDropDownMenu(){

    menu = document.querySelector('.dropdownMenu');

    if(menu.style.display == 'block'){
        menu.style.display = "none";
    }else{
        menu.style.display = 'block';
    }
}
function os(){
let side = document.getElementById('side');
let main = document.getElementById('main');


if(side.classList.contains('open')){
    side.classList.remove('open');
    main.style.marginLeft = '0';
    
}else{
    side.classList.add('open');
    main.style.marginLeft = '260px';
   
}

}
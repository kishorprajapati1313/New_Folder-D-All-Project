const password = document.getElementById('password');
const pshow    = document.getElementById('pshow');
const fname    = document.getElementById('fname');
const error1   = document.getElementById('error1');
const error2   = document.getElementById('error2');
const user     = document.getElementById('user');


pshow.onclick = function() {
    if(password.type === 'password'){
        password.type = 'text';
    }else{
        password.type = 'password';
    }
};



function validform(username){
    const numericRegex = /\d/;
        
    if(user === ''){
        error1.textContent = "Please enter valid name";
        return false;
    }
    else if(!numericRegex.test(username)) {
        return 'Please enter only alphabate'; 
    }
    else if(username.length < 8){   
        return 'please enter 8 charcter';
    }


return '';
}

function valid(){
    const username = user.value.trim();
    error  = validform(username);
    error2.textContent = error;
}

document.getElementById('user').addEventListener('input', valid);



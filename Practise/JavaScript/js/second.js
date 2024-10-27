const password = document.getElementById('password');

// for the password Genertare
/*
function passwordgen() {
    const password = document.getElementById('password');
    let ualpha = 'QWERTYUIOPASDFGHJKLZXCVBNM';
    let lalpha = 'qwertyuiopasdfghjkzxcvbnml';
    let number = '1234567890';
    let schar = '!@#$%^&*()_+~<>?:"{}|+-';
    let all = ualpha + lalpha + number + schar;

    let ucount = 0;
    let lcount = 0;
    let ncount = 0;
    let scount = 0;

    let password1 = '';

    const count = Math.max(12, 8);
    const cat = Math.ceil(count / 4);

    while (password1.length < count) {
        const ran = all[Math.floor(Math.random() * all.length)];

        if (ualpha.includes(ran) && ucount < cat)
            ucount++;
        else if (lalpha.includes(ran) && lcount < cat)
            lcount++;
        else if (number.includes(ran) && ncount < cat)
            ncount++;
        else if (schar.includes(ran) && scount < cat)
            scount++;
        else {
            continue;
        }

        password1 += ran;
    }

    return password1;
}

const p1 = passwordgen();
console.log("Generated Password:", p1);

if (p1.length >= 12) {
    console.log("Strong password");
} else {
    console.log("Weak password");
}
*/

//checking password is strong or not

function check(password){
    const lower = /[a-z]/g;
    const upper = /[A-Z]/g;
    const no    = /\d/g;
    const sp    = /[!@#$%^&*()_+}{":><=-]/g;

    const isupper = (password.match(upper) || []).length >= 2;
    const islower = (password.match(lower) || []).length >= 2;
    const isno    = (password.match(no) || []).length >= 2;
    const issp    = (password.match(sp) || []).length >= 2;
    const length  = password.length >= 8;
    
    return isupper && islower && isno && issp && length;
}

function valid(){
    const userp = document.getElementById('password').value;
    const pc = check(userp);
    
    if(pc)
    {
        console.log("Strong password");
        error3.textContent = "Strong";
    }else
    {
        console.log("Weak password");
        error3.textContent = "waek";
    }
}

document.getElementById('password').addEventListener('input',valid);
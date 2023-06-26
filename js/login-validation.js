const lemail = document.getElementById('lemail');
const lpassword = document.getElementById('lpassword');
lemail.addEventListener('blur', lemailVerify, true);
lpassword.addEventListener('blur', lpasswordVerify, true);
var validRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

function LoginValidate(){
    if (lemail.value == "") 
    {
        document.getElementById('lemail_div').className = 'form-control bg-dark border-0 error ';
        document.getElementById('lemail_error').textContent = "Enter your email address";
        return false;	
    } 
    else if (lemail.value != "" && !lemail.value.match(validRegex)) 
    {
        document.getElementById('lemail_div').className = 'form-control bg-dark border-0 error ';
        document.getElementById('lemail_error').textContent = "Enter a valid email address";
        return false;
    }

    if (lpassword.value == "") 
    {
        document.getElementById('lpassword_div').className = 'form-control bg-dark border-0 error';
        document.getElementById('lpassword_error').textContent = "Enter a password";
        return false
    }
}

        
function lemailVerify(){
    if (lemail.value.match(validRegex)) 
    {
        document.getElementById('lemail_div').className = 'form-control bg-dark border-0 success';
        document.getElementById('lemail_error').innerHTML = "";
        return true;
    }
};

function lpasswordVerify(){
if (lpassword.value !== "") 
{
    document.getElementById('lpassword_div').className = 'form-control bg-dark border-0 success';
    document.getElementById('lpassword_error').innerHTML = "";
    return true;
}
}
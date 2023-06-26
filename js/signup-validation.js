
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const terms = document.getElementById('terms');

username.addEventListener('blur', nameVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);
password2.addEventListener('blur', password2Verify, true);
terms.addEventListener('blur', termsVerify, true);
var validRegex = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

function Validate(){
	//NICKNAME
	if (username.value == "")
	{
		document.getElementById('Name_error').textContent = "Enter a nickname ";
		document.getElementById('Name_div').className = 'form-control bg-dark border-0 error';
		return false
	}
	else if (username.value != "" && username.value.length < 6)
	{
		document.getElementById('Name_error').textContent = "Nickname is too short (6-20)";
		document.getElementById('Name_div').className = 'form-control bg-dark border-0 error';
		return false
	}
	else if (username.value.length > 20)
	{
		document.getElementById('Name_error').textContent = "Nickname is too long (6-30)";
		document.getElementById('Name_div').className = 'form-control bg-dark border-0 error';
		return false
	}

	//EMAIL
	if (email.value == "") 
	{
		document.getElementById('Email_div').className = 'form-control bg-dark border-0 error ';
		document.getElementById('Email_error').textContent = "Enter your email address";
		return false;	
	} 
	else if (email.value != "" && !email.value.match(validRegex)) 
	{
		document.getElementById('Email_div').className = 'form-control bg-dark border-0 error ';
		document.getElementById('Email_error').textContent = "Enter a valid email address";
		return false;
	}

	//PASSWORD
	if (password.value == "") 
	{
		document.getElementById('Password_div').className = 'form-control bg-dark border-0 error';
		document.getElementById('Password_error').textContent = "Enter a password";
		return false
	}
	else if (password.value != "" && password.value.length < 8)
	{
		document.getElementById('Password_div').className = 'form-control bg-dark border-0 error';
		document.getElementById('Password_error').textContent = "Password is too short (6-30)";
		return false
	}	
	else if (password.value.length > 8 && password.value.length > 20)
	{
		document.getElementById('Password_div').className = 'form-control bg-dark border-0 error';
		document.getElementById('Password_error').textContent = "Password is too long (6-30)";
		return false
	}

	//PASSWORD CONFIRM
	if (password2.value == "") 
	{
		document.getElementById('PasswordConfirm_div').className = 'form-control bg-dark border-0 error';
		document.getElementById('PasswordConfirm_error').textContent = "Enter password again";
		return false	
	}
	else if (password.value !== password2.value) 
	{
		document.getElementById('PasswordConfirm_div').className = 'form-control bg-dark border-0 error';
		document.getElementById('PasswordConfirm_error').textContent = "Passwords does not match";
		return false
	}

	//TERMS
	if(terms.checked == false) 
	{
		document.getElementById('Terms_div').className = 'form-control bg-dark border-0 error';
		document.getElementById('Terms_error').innerHTML = "Must accept";
		return false	
	}
}

function nameVerify()
{
	if(username.value.length >= 6) 
	{	
		document.getElementById('Name_div').className = "form-control bg-dark border-0 success"
		document.getElementById('Name_error').innerHTML = ""
		return true;
	}
}
function emailVerify(){
	if (email.value.match(validRegex)) 
	{
		document.getElementById('Email_div').className = 'form-control bg-dark border-0 success';
		document.getElementById('Email_error').innerHTML = "";
		return true
	}
}
function passwordVerify(){
	if(password.value.length >= 8) 
	{
		document.getElementById('Password_div').className = 'form-control bg-dark border-0 success';
		document.getElementById('Password_error').innerHTML = "";
		return true
	}
}
function password2Verify(){
	if(password.value == password2.value) 
	{
		document.getElementById('PasswordConfirm_div').className = 'form-control bg-dark border-0 success';
		document.getElementById('PasswordConfirm_error').innerHTML = "";
		return true
	}
}
function termsVerify(){
	if(terms.checked == true) 
	{
		document.getElementById('Terms_div').className = 'form-control bg-dark border-0 success';
		document.getElementById('Terms_error').innerHTML = "";
		return true
	}
}


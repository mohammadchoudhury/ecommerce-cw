function validateLogin() {
	var form = document.getElementById("login_form");
	var email = form['email'].value;
	var password = form['password'].value;
	var errors = [];
	if (!email || !password) {
		errors.push("Must enter username and password");
	}
	var email_regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	if (!email_regex.test(email)) {
		errors.push("Email address is invalid");
	}
	document.getElementById("error").innerHTML = generateErrorMessages(errors);
	return !errors;
}

function validateRegister() {
	var form = document.getElementById("register_form");
	var fname = form['fname'].value;
	var lname = form['lname'].value;
	var email = form['email'].value;
	var password = form['password'].value;
	var cpassword = form['cpassword'].value;
	var phone = form['phone'].value;
	var errors = [];

	if (!fname || !lname) {
		errors.push('Please enter your name');
	}
	var name_regex = /^[a-zA-Z]+(-)?[a-zA-Z]*$/;
	if (fname && !name_regex.test(fname)) {
		errors.push("First name must not have special characters");
	}
	if (lname && !name_regex.test(lname)) {
		errors.push("Last name must not have special characters");
	}
	var email_regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	if (!email_regex.test(email)) {
		errors.push('Please enter a valid email address');
	}
	if (password != cpassword) {
		errors.push('Passwords do not match');
	}
	var pwd_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/;
	if (!pwd_regex.test(password)) {
		errors.push('Passwords must have at least one lowercase character, one uppercase character and one digit');
	}
	var phone_regex = /^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$/;
	if (!phone_regex.test(phone)) {
		errors.push("Please enter a valid phone/mobile number");
	}
	document.getElementById("error").innerHTML = generateErrorMessages(errors);
	return !errors;
}

function generateErrorMessages(errors_arr) {
	var errors = "";
	for (i in errors_arr) {
		errors += "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'><span>&times;</span></button>"+errors_arr[i]+"</div>";
	}
	return errors;
}
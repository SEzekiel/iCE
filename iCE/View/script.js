



function doLogin(){
	var user = document.getElementById('user').value;
	var pass = document.getElementById('pass').value;
	if (user != "" && pass != "") {
		login(user, pass);
	} else {
		alert("Empty fields");
	}
}

function login(user, pass){
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				window.location.assign("#/app/profile");
			} else {
				alert("Wrong username or password");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "templates/login-controller.php?user="+user+"&pass="+pass,true);
	httpRequest.send();
}


function doSignup(){
	var name = document.getElementById('name').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;
	var gender = document.getElementById('gender').value;
	var pass = document.getElementById('password').value;
	var cName = document.getElementById('cname').value;
	var cNumber = document.getElementById('cphone').value;

	if (name != "") {
		if (phone != "") {
			if (validatePhone(phone)) {
				if (email != "") {
					if (validateEmail(email)) {
						if (gender != "") {
							if (pass.length < 8) {
								if (cName != "") {
									if (cNumber != "") {
										if (validatePhone(cNumber)) {
											signup(name, phone, email,gender,pass,cName, cNumber);
										} else {
											document.getElementById('message').innerHTML = "Emergency number is invalid";
										}
									} else {
										document.getElementById('message').innerHTML = "Please provide an emergency contact number";
									}
								} else {
									document.getElementById('message').innerHTML = "Please provide an emergency contact";
								}
							} else {
								document.getElementById('message').innerHTML = "Password must be at least 8 characters long";
							}
						} else {
							document.getElementById('message').innerHTML = "Please select gender";
						}
					} else {
						document.getElementById('message').innerHTML = "Email is invalid";
					}
				} else {
					document.getElementById('message').innerHTML = "Provide a value for email";
				}
			} else {
				document.getElementById('message').innerHTML = "Phone number is invalid";
			}
		} else {
			document.getElementById('message').innerHTML = "Provide a value for phone number";
		}
	} else {
		document.getElementById('message').innerHTML = "Provide a value for name";
	}
}

/*
*Sign up
*/
function signup(name, phone, email,gender,pass,cName, cNumber){
	var data = "name="+name+"&phone="+phone+"&email="+email+"&gender="+gender+"&pass="+pass+"&cname="+cName+"&cnumber="+cNumber;
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("The registeration was successful\n You will now be redirected to login");
				window.location.assign("#/app/login");
			} else {
				alert("There was an error in the registeration process");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "templates/signup-controller.php?"+data,true);
	httpRequest.send();
}

function validatePhone(phonenumber){
	const regex = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
	let m;

	if ((m = regex.exec(phonenumber)) !== null) {
	    // The result can be accessed through the `m`-variable.
	    m.forEach((match, groupIndex) => {
	        return true;
	        //console.log(`Found match, group ${groupIndex}: ${match}`);
	    });
}
else{
	return false;
}
}

function validateEmail(email){
	const regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	let m;

	if ((m = regex.exec(email)) !== null) {
	    // The result can be accessed through the `m`-variable.
	    m.forEach((match, groupIndex) => {
	        return true;
	        //console.log(`Found match, group ${groupIndex}: ${match}`);
	    });
	}
	else{
		return false;
	}
}

function send(type, number){
	var image = ""
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam').click();
	image = document.getElementById('cam').value;
	}

	/*
	*Get location
	*/

}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by your device.");
    }
}
function showPosition(position) {
    var lat = position.coords.latitude;
    var long = position.coords.longitude;

    var coord = [lat, long];

    return coord
}
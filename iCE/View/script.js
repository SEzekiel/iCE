



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
			alert("in");
			var len = this.responseText.length;
			if (len == 2) {
				window.location.assign("#/app/profile");
			} else {
				alert("Wrong username or password");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/user_controller.php?user="+user+"&pass="+pass+"&c=1",true);
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
	if (name !== "") {
		if (phone !== "") {
			if (validatePhone(phone) ==true) {
				if (email !== "") {
					if (validateEmail(email) == true) {
						if (gender !== "") {
							if (pass.length >= 8) {
								if (cName !== "") {
									if (cNumber !== "") {
										if (validatePhone(cNumber) ==true) {
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
				document.getElementById('message').innerHTML = "Phone number is invalid 1";
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
			var len = this.responseText.length;
			if (len == 2) {
				document.getElementById('message').innerHTML = "<eze style=\"color:green\">The registeration was successful\n You will now be redirected to login</eze>";
				window.location.assign("#/app/login");
			} else {
				document.getElementById('message').innerHTML = "<eze style=\"color:green\">An error occured while trying to signup</eze>";
			}
		}
	};
	httpRequest.open("GET", "../Controller/signup_controller.php?"+data,true);
	httpRequest.send();
}

function validatePhone(phonenumber){
     //    const phoneNum = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/; 
     //        let n;
     //        if((n = phoneNum.exec(phonenumber)) !== null) {
     //    		// The result can be accessed through the `m`-variable.
	    // 		n.forEach((match, groupIndex) => {
	    //     	return true;
	    //     	//console.log(`Found match, group ${groupIndex}: ${match}`);
	    // });
     //        }
     //        else {
     //            return false;
     //        }
     return true;
}

function validateEmail(email){
	// const regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	// let m;

	// if ((m = regex.exec(email)) !== null) {
	//     // The result can be accessed through the `m`-variable.
	//     m.forEach((match, groupIndex) => {
	//         return true;
	//         //console.log(`Found match, group ${groupIndex}: ${match}`);
	//     });
	// }
	// else{
	// 	return false;
	// }
	return true;
}

function sendRobbery(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is a Robbery emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam').click();
	image = document.getElementById('cam').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=Robbery"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/emergency-controller.php?"+data,true);
	httpRequest.send();

}

function getLocation(id) {
    if (navigator.geolocation) {
        switch(id) {
    case 1:
    	navigator.geolocation.getCurrentPosition(sendRobbery);
    case 2:
        navigator.geolocation.getCurrentPosition(sendHealth);
        break;
    case 3:
        navigator.geolocation.getCurrentPosition(sendAccident);
        break;
    case 4:
        navigator.geolocation.getCurrentPosition(sendFire);
        break;
   	case 5:
        navigator.geolocation.getCurrentPosition(sendFlood);
        break;
    case 6:
        navigator.geolocation.getCurrentPosition(sendShock);
        break;
    case 7:
        navigator.geolocation.getCurrentPosition(sendLandslide);
        break;
    case 8:
        navigator.geolocation.getCurrentPosition(sendHazard);
        break;
    case 9:
        navigator.geolocation.getCurrentPosition(sendNuclear);
        break;
    case 10:
        navigator.geolocation.getCurrentPosition(sendOther);
        break;
    default:
        alert("Unavailable")
}
    } else {
        alert("Geolocation is not supported by your device.");
    }
}


function sendHealth(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is a Health emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam1').click();
	image = document.getElementById('cam1').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=Health"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/emergency-controller.php?"+data,true);
	httpRequest.send();

}

//***************************************

function sendAccident(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is a Accident emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam2').click();
	image = document.getElementById('cam2').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=Accident"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/signup-controller.php?"+data,true);
	httpRequest.send();

}

//**************************************************

function sendFire(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is a Fire emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam3').click();
	image = document.getElementById('cam3').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=Fire"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/signup-controller.php?"+data,true);
	httpRequest.send();

}

//**************************************************
function sendFlood(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is a Flood emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam4').click();
	image = document.getElementById('cam4').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=Flood"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/signup-controller.php?"+data,true);
	httpRequest.send();

}

//*********************************************
function sendShock(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is an Electric shock emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam5').click();
	image = document.getElementById('cam5').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=Electrickschock"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/signup-controller.php?"+data,true);
	httpRequest.send();

}

//*****************************************
function sendLandslide(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is a Land slide emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam6').click();
	image = document.getElementById('cam6').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=Landslide"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/signup-controller.php?"+data,true);
	httpRequest.send();

}

//****************************************
function sendHazard(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is a Biological hazard emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam7').click();
	image = document.getElementById('cam7').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=Hazard"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/signup-controller.php?"+data,true);
	httpRequest.send();

}

//*********************************************
function sendNuclear(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is a Nuclear emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam8').click();
	image = document.getElementById('cam8').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=Nuclear"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/signup-controller.php?"+data,true);
	httpRequest.send();

}

//************************************
function sendOther(position){
	var lat = position.coords.latitude;
    var long = position.coords.longitude;
	var image = "";
	var message = "Hello,\n There is an unidentified emergency at Lat. "+lat+" and Long.\nPlease I need your help"+long;
	var choice = confirm("Do you want to attach an image to this report?");
	if (choice == true){
	document.getElementById('cam9').click();
	image = document.getElementById('cam9').value;
	}

	var data = "lat="+lat+"&long="+long+"&image="+image+"&message="+message+"&recepient="+""+"&type=other"+"&number=+233270327467";
	/*
	*send the info
	*/
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (this.readyState == 4 && this.status == 200) {
			if (this.responseText == "true") {
				alert("Message is sent. You will get a response soon");
			} else {
				alert("Message cannot be sent at this time");
			}
			//document.getElementById('display').innerHTML = this.responseText;
		}
	};
	httpRequest.open("GET", "../Controller/signup-controller.php?"+data,true);
	httpRequest.send();

}
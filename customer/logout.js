
function LogoutConfirmation(event)
{
	event.preventDefault();

	var result = confirm("Are You Sure You Want To Logou?");
	if(result){
		logout();
	}
	else {

	}
}

function logout() {
	console.log("User Logged Out!");
	
}
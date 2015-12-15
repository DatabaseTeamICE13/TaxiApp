function UserChecker(document){
	usr=document.getElementById("uid").value;
	val= document.getElementById("pwd").value;
	if (val!="" && usr !="") {
		document.getElementById("login").action = "UserCheck.php";
	}else{
		alert("Fill the Blanks and Proceed!!!")
	}
}
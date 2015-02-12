{* Smarty *}
{extends 'base.tpl'}
{block name='body'}

<script>

function validateForm() {
	var username = document.forms["loginForm"]["username"].value;
	if (x.length < 3) {
		alert("Username must be between 5 and 15 characters long.");
		return false;
	}
	//TEST username only has letters/numbers/underscores
	contain = /^\w+$/;
      	if(!contain.test(x)) {
		alert("Username can only contain letters, numbers, and underscores.");
		return false;
	}
	var password = document.forms["loginForm"]["password"].value;
	if (x.length < 5 || x.length > 15) {
		alert("Password must be between 5 and 15 characters long.");
		return false;
	}
	lowercase = /[a-z]/;
	uppercase = /[A-Z]/;
	numbers = /[0-9]/;
	if (!lowercase.test(x) && !uppercase.test(x)) {
		alert("Password must contain at least one letter.");
		return false;
	}
	if (!numbers.text(x)) {
		alert("Password must contian at lesat one number.");
		return false;
	}
	if (!contain.test(x)) {
		alert("Password can only contain letters, numbers, and underscores.");
		return false;
	} 
	if (document.forms["loginForm"]["password"].value != document.forms["loginForm"]["confirm_password"].value) {
		alert("Passwords do not match, please try again.");
		return false;
	}

	var email = document.forms["loginForm"]["email"].value;
	var atsymbol = email.indexOf("@");
	var period = email.lastIndexOf(".");
	at = /[@]/;
	per = /[.]/;
	if (email.search("@") == -1 || email.search(".") == -1) {
		alert("Not a valid e-mail address");
		return false;
	}
	if (atsymbol < 1 || period < atsymbol + 2 || period +2 >= email.length) {
        	alert("Not a valid e-mail address");
	        return false;
	}
}

</script>


<center>

<h1>
New User
</h1>
<p>
<table>
<form method="post" onsubmit="return validateForm()" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/user" name="loginForm">
 <tr> 
   <td><label>Username:</label></td>
   <td><input type="text" name="username"></td>
 </tr>
 <tr>
   <td><label>First Name:</label></td>
   <td><input type="text" name="first_name"></td>
 </tr>
 <tr>
   <td><label>Last Name:</label></td>
   <td><input type="text" name="last_name"></td>
 </tr>
 <tr>
   <td><label>E-mail Address:</label></td>
   <td><input type="text" name="email"></td>
 </tr>
 <tr> 
   <td><label>Password:</label></td>
   <td><input type="password" name="password"></td>
 </tr>
 <tr> 
   <td><label>Confirm Password:</label></td>
   <td><input type="password" name="confirm_password"></td>
 </tr>
 <tr>
   <td><input type="hidden" name="source" value="new_user"><br></td>
   <td align="right"><input class="button" type="submit" value="Submit"><br></td>
   <label style="color:red; position: relative; left: 45px; top: 5px;">{$error_message}</label>
 </tr>
</form>
</table>

</p>

Already have an account? <a href="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2">Go back and login.</a>


{/block}


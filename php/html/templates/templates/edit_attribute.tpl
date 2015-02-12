{* Smarty *}
{extends 'navigation.tpl'}
{block name='body'}

<script>
function validateForm() {
	if(document.forms["form1"]["changed_attribute"].value == "Password") {
               var password = document.forms["form1"]["new_value"].value;
	       if (password.length < 5 || password.length > 15) {
        	        alert("Password must be between 5 and 15 characters long.");
               	 return false;
               }
	       lowercase = /[a-z]/;
               uppercase = /[A-Z]/;
               numbers = /[0-9]/;
	       contain = /^\w+$/;
	       if (!lowercase.test(password) && !uppercase.test(password)) {
	                alert("Password must contain at least one letter.");
	                return false;
	       }
	       if (!numbers.test(password)) {
	               alert("Password must contain at least one number.");
	               return false;
	       }
	       if (!contain.test(password)) {
	               alert("Password can only contain letters, numbers, and underscores.");
	               return false;
	       }
	       if (document.forms["form1"]["new_value"].value != document.forms["form1"]["confirm_password"].value) {
	               alert("Passwords do not match, please try again.");
	               return false;
	       }
	}
	if(document.forms["form1"]["changed_attribute"].value == "E-mail") {
	       var email = document.forms["form1"]["new_value"].value;
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
}
</script>


<center>
<h1>
{$username}
</h1>
{assign "inputtype" "text"}
{if $attribute eq 'Password'}
	{assign "inputtype" "password"}
{/if}

<form method="post" onsubmit="return validateForm()" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/user/edit" name="form1">
	<label>New {$attribute}:</label>
	<input type="hidden" name="username" value="{$username}">
	<input type="{$inputtype}" name="new_value">
	<input type="hidden" name="changed_attribute" value="{$attribute}"><br>
{if $attribute eq 'Password'}
	<label>Confirm Password:</label>
	<input type="{$inputtype}" name="confirm_password"><br>
{/if}
	<input type="submit" value="Change">
</form>












{/block}

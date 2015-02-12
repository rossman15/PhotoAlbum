{* Smarty *}
{extends 'base.tpl'}
{block name='body'}
<head>
  <style type="text/css">
    .container {
        width: 260px;
    }
    .container input {
        width: 120px;
    }
    .container .button { 
      position: relative;
      left: 45px;  
      top: 5px;
      width: 60px;
      height: 30px;
    }

  </style>
</head>
<title>Group 34</title>
<meta name="description" content="A basic photo album">
<meta name="keywords" content="photos, album, photo, EECS485">

<center>

<p>
 <h1>Welcome Guest!</h1>
 <a href="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/public_albums">Click here</a> to view public albums<br> 
 OR<br>
 Login below to see your Private Albums<br>

</p> 
<p>
  <h4>LOGIN:</h4>

</p>
<div class="container">
<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2" name="loginForm">
  <label>Username:</label>
  <input type="text" name="username"><br>
  <label>Password:</label>
  <input type="password" name="password"><br>
  <input type="hidden" name="source" value="login">  
  <input class="button" type="submit" value="LOGIN"><br>
  <label style="color:red; position: relative; left: 45px; top: 5px;">{$error_message}</label>
</form>
</div>
<p style="position: relative; top: 5px;">
Don't have an account? 
<a href="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/user">Create one!</a>
</p>



{/block}

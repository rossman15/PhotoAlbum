{* Smarty *}

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<style>
ul {
        float: right;
        margin-right: 5px;
        list-style-type: none;
}
.navigate {
        width: 120px;
}
.cool {
        margin-left: 50px;
}

</style>

<head>

    <link rel="stylesheet" href="/static/css/style.css" />

    <title>{$title}</title>

<ul>
<li style="font-size: 20px; font-weight: bold">Logged in as {$username}
</li>
<li class="cool"><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2">
<input class="navigate" type="submit" value="Home">
<input type="hidden" name="username" value="{$username}">
</form>
</li>
<li class="cool"><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/user/edit">
<input class="navigate" type="submit" value="Edit Account">
<input type="hidden" name="username" value="{$username}">
</form>
</li>
<li class="cool"><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/albums">
<input class="navigate" type="submit" value="My Albums">
<input type="hidden" name="username" value="{$username}">
</form>
</li>
<li class="cool"><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/logout">
<input class="navigate" type="submit" value="Logout">
</form>
</li>
</ul>



</head>
<body bgcolor="#58ACFA">
  <div class="center">
    {block "body"}Default Body Text{/block}
  </div>
  <script type="text/javascript" src="/static/js/main.js"></script>


</body>
</html>

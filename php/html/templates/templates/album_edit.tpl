{* Smarty *}
{extends 'navigation.tpl'}
{block name='body'}

<center>



<h1><font style="font-style: ; text-transform: uppercase;">edit {$album_title} album</h1>


<table border="1" style="float: left; margin-right: 200px;">

{section name=pictures loop=$pic_array}
 <tr>
  <td align="center"><img src="http://eecs485-10.eecs.umich.edu:5834/{$pic_array[pictures].url}" style="width: 140px; height:120px" alt="Cannot Display Picture"></td>
  <td align="center">{$pic_array[pictures].picid}</td>
  <td align="center"><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/album/edit" name="form1">
    <input type="submit" name="op" value="delete">
    <input type="hidden" name="picid" value="{$pic_array[pictures].picid}">
    <input type="hidden" name="albumid" value="{$albumid}">
    <input type="hidden" name="username" value="{$username}">
  </form></td> 
</tr>

{/section}


<tr>
  <form enctype="multipart/form-data" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/album/edit" method="post">
   <td align="center"> 
    <label for="file">Add Photo:</label>
   </td>
   <td>
    Send this file: <input name="userfile" type="file" />
   </td> 
   <td>
    <input type="submit" value="Send File" />
   </td>
   <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
   <input type="hidden" name="op" value="add"/>
   <input type="hidden" name="album_title" value="{$album_title}"/>
   <input type="hidden" name="username" value="{$username}">
   <input type="hidden" name="albumid" value="{$albumid}">
</form>
 </tr>
</table>

<p>

<table border="1" style="text-align: center;">
 <tr>
  <td><b>USERS WITH ACCESS</b></td>
  <td><b>REMOVE</b></td>
 </tr>
 
{foreach $accessable_users as $us}

 <tr>
  <td>{$us}</td>
  <td>
	 <form method ="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/album/edit">
	 <input type="submit" value="Remove">
	 <input type="hidden" name="op" value="rmUser">
	 <input type="hidden" name="oldUser" value="{$us}">
	 <input type="hidden" name="username" value="{$username}">
	 <input type="hidden" name="albumid" value="{$albumid}">
	 </form>
  </td>
 </tr>

{/foreach}

 <tr>
  <td>
  	<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/album/edit">
	<input type="text"  name="newUser">
  </td>
  <td>
	<input type="submit" value="Add User">
	<input type="hidden" name="op" value="addUser">
	<input type="hidden" name="username" value="{$username}">
	<input type="hidden" name="albumid" value="{$albumid}">
	</form>
	
  </td>
 </tr>
 
 <tr>
	<td colspan="2">
		<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/album/edit">
		<label>Access: {$current_access}   </label>
		<input type="submit" value="Go {$other_access}">
		<input type="hidden" name="op" value="switch_access">
		<input type="hidden" name="albumid" value="{$albumid}">
		<input type="hidden" name="username" value="{$username}">
		</form>
	</td>
 </tr>

</table>

<p>

<table border="1" style="margin-right: 200px;">
 <tr>
  <td align="center">
   <b>
        <form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/albums/edit">
        <input class="button" type="submit" value="Back To Albums Edit">
        <input type="hidden" name="username" value="{$username}">
        </form>
   </b>
  </td>
 </tr>



</center>


{/block}

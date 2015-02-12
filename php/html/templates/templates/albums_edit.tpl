{* Smarty *}
{extends 'navigation.tpl'}
{block name='body'}

<script>
function validateForm() {
	if(document.forms["form2"]["access"].value != "Private" && document.forms["form2"]["access"].value != "Public") {
		alert("Please enter either 'Public' or 'Private' for the Access option.");
		return false;
	}

}
</script>


<style>

h1{
   text-transform: uppercase;
}
.button4 {
        background:none!important;
        border:none;
        padding:0!important;
        cursor: pointer;
        color: black;
        font-size: 25px;
        text-decoration: underline;
}
</style>



<center>


<h1>EDIT {$username}'s ALBUMS</h1>

<table border="1">

<thead>
 	<tr> 
  		<td align="center"><b>ALBUM</b></td>
  		<td align="center"><b>ACCESS</b></td>
 		<td align="center"><b>EDIT</b></td>
                <td align="center"><b>DELETE</b></td>
	</tr>
</thead>



{section name=album loop=$title_array}



<tr>
   <td>{$title_array[album]}</td>
   <td>{$access_array[album]} </td>
   <td>
	<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/album/edit" name="form1">
     		<input type="submit" value="Edit">
		<input type="hidden" name="albumid" value="{$albumids[album]}">
      		<input type="hidden" name="username" value="{$username}">
       	</form>
   </td>
   <td>
	<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/albums/edit" name="form1">
     		<input type="submit" name="op" value="delete">
     		<input type="hidden" name="albumid" value="{$albumids[album]}">
     		<input type="hidden" name="username" value="{$username}">
   	</form>
   </td>
<tr>


{/section}
  <tr>
   	<td>
    		<form method="post" onsubmit="return validateForm()" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/albums/edit" name="form2">
    			<label>New:  </label>
			<input type="text" name="add">    		
   	</td>
	<td>
			<input size="10" type="text" name="access">
			<input type="hidden" name="username" value="{$username}">
    	</td>
	<td>
			<input type="submit" name="op" value="add">
		</form>
	</td>
  </tr>


</table>
<p>
   <form align="center" method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/albums">
        <input class="button4" type="submit" value="Back to Albums">
        <input type="hidden" name="username" value="{$username}">
   </form>
</p>

{/block}

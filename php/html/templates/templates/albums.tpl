{* Smarty *}
{extends 'navigation.tpl'}
{block name='body'}
<center>
<h1>ALBUMS FOR {$username}</h1>
<style>
h1 {
  text-transform: uppercase;
}
.button2 {
    	background:none!important;
    	border:none;
     	padding:0!important;
     	cursor: pointer;
     	color: white;
}
.button3 {
    	background:none!important;
     	border:none;
     	padding:0!important;
     	cursor: pointer;
     	color: blue;
}
.button4 {
    	background:none!important;
     	border:none;
     	padding:0!important;
     	cursor: pointer;
     	color: black;
	font-size: 25px;
     	text-decoration: underline;
     	position: relative;
     	top: 5px;
}	
.button5 {
        background:none!important;
        border:none;
        padding:0!important;
        cursor: pointer;
        color: blue;
        font-size: 18px;
        position: relative;
}
</style>  


<table border="1">

<thead>
 <tr>
  <td align="center"><b>ALBUM</b></td>
  <td align="center"><b>ACCESS</b></td>
 </tr>
</thead>

{section name=album loop=$title_array}
  <tr>
   <td align="center"><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/album">
		      	<input class="button2" type="submit" value="{$title_array[album]}">
			<input type="hidden" name="albumid" value="{$albumids[album]}">
			<input type="hidden" name="username" value="{$username}">
		      </form>
   </td>
   <td align="center">{$access_array[album]}</td>
  </tr>
  
{/section}
<tr>
	<td align="center" colspan="2">
		<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/albums/edit">
                        <input class="button5" type="submit" value="Edit Albums">
                        <input type="hidden" name="username" value="{$username}">
                </form>
	</td>
</tr>
</table>
<form align="center" method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2">
	<input class="button4" type="submit" value="Back">
	<input type="hidden" name="albumid" value="{$albumids[album]}">
	<input type="hidden" name="username" value="{$username}">
</form>

</center>

{/block}

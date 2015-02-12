{* Smarty *}
{extends 'navigation.tpl'}
{block name='body'}

<center>

<h1><font style="font-style: ; text-transform:uppercase;">{$album_title}</h1>


<table border="1">

{section name=pictures loop=$pic_array}
 <tr>
  <td align="center"><img src="http://eecs485-10.eecs.umich.edu:5834/{$pic_array[pictures].url}" style="width: 140px; height:120px" alt="Cannot Display Picture"></td>
  <td><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/pic" name="form1">
    <input type="submit" name="picid" value="{$pic_array[pictures].picid}">
    <input type="hidden" name="username" value="{$username}">
    </form>
  <td align="center">{$pic_array[pictures].caption}</td>
 </tr>

{/section}



</table>

<p>


<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2" name="form1">
	<input type="submit" value="HOME">
</form>


</center>


{/block}

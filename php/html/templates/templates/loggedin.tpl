{* Smarty *}
{extends 'navigation.tpl'}
{block name='body'}

<style>
.button3 {
    background:none!important;
     border:none;
     padding:0!important;
     cursor: pointer;
     color: blue;
}
</style>

<center>
<h2>ACCESSABLE ALBUMS</h2>

<p>

<table border="1">
 <tr>
  <td align="center"><b>Album Title</b></td>
  <td align="center"><b>User</b></td>
 <tr>

 {section name=album loop=$albumids}
  <tr>
   <td align="center">
	<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/album">
		<input class="button3" type="submit" value="{$album_titles[album]}">
		<input type="hidden" name="username" value="{$username}">
		<input type="hidden" name="albumid" value="{$albumids[album]}">
	</form>
  </td>
   <td align="center">{$usernames[album]}</td>
  </tr>
 {/section}

</table>








{/block}

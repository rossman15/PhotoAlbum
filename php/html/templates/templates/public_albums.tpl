{* Smarty *}
{extends 'base.tpl'}
{block name='body'}
<style>
.button2 {
    background:none!important;
     border:none;
     padding:0!important;
     cursor: pointer;
     text-decoration: underline;
     color: blue;
}

</style>
<center>
<h1>PUBLIC ALBUMS</h1>

<p>

<table border="1">
 <tr>
  <td align="center"><b>Album Title</b></td>
  <td align="center"><b>User</b></td>
  <td align="center"><b>Permission</b></td>
 <tr>

 {section name=album loop=$albumids}
  <tr>
   <td align="center"><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/public_album">
				<input type="hidden" name="albumid" value="{$albumids[album]}">
   				<input class="button2" type="submit" value="{$album_titles[album]}">
				<input type="hidden" name="username" value="{$usernames[album]}">
			</form>
   <td align="center">{$usernames[album]}</td>
   <td align="center">Public</td>
  </tr>
 {/section}

</table>

</p>
<p>
<a href="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2">Home</a>
</p>


{/block}

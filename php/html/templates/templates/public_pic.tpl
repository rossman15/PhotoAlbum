{* Smarty *}
{extends 'base.tpl'}
{block name='body'}

<center>

<h1>{$picid}</h1>
<img src="http://eecs485-10.eecs.umich.edu:5834/{$url}">

<br><b>Caption:</b><br>{$caption}

<p>
 <table border="1">

  <tr>
   <td><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/public_pic" name="form1">
    <input type="submit" name="button" value="PREV">
    <input type="hidden" name="picid" value="{$picid}">
    </form>
    <td><form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/public_pic" name="form1">
    <input type="submit" name="button" value="NEXT">
    <input type="hidden" name="picid" value="{$picid}">
    </form>
  </tr>

 </table>
</p>

<p>

<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/public_album">
       <input class="button" type="submit" value="Back To Album">
       <input type="hidden" name="albumid" value="{$albumid}">
</form>

</p>

{/block}

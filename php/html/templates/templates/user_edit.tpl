{* Smarty *}
{extends 'navigation.tpl'}
{block name='body'}


<center>

<h1>
{$username}
</h1>

<table border="4">
<tr>
	<td>First Name:</td>
	<td>{$firstname}</td>
	<td>
		<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/user/edit">
			<input type="submit" value="Edit">
			<input type="hidden" name="attribute" value="First Name">
			<input type="hidden" name="username" value="{$username}">
		</form>
	</td>
</tr>
<tr>
        <td>Last Name:</td>
	<td>{$lastname}</td>
	<td>
                <form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/user/edit">
                        <input type="submit" value="Edit">
                        <input type="hidden" name="attribute" value="Last Name">
			<input type="hidden" name="username" value="{$username}">
                </form>
        </td>
</tr>
<tr>
        <td>E-mail:</td>
	<td>{$email}</td>
	<td>
                <form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/user/edit" name="editEmail">
                        <input type="submit" value="Edit">
                        <input type="hidden" name="attribute" value="E-mail">
			<input type="hidden" name="username" value="{$username}">
                </form>
        </td>
</tr>
<tr>
	<td>Password:</td>
	<td>********</td>
	<td>
		<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/user/edit" name="editPassword">
			<input type="submit" value="Edit">
			<input type="hidden" name="attribute" value="Password">
			<input type="hidden" name="username" value="{$username}">
		</form>
	</td>
</tr>
</table>

<p>
	<form method="post" action="http://eecs485-10.eecs.umich.edu:5834/aqsiby/pa2/delete" name="editPassword">
               <input class="button" type="submit" value="Delete Account">
       </form>

</p>


{/block}


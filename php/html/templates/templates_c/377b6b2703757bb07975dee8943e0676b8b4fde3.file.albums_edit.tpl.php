<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 20:22:14
         compiled from "/var/www/html/group34/admin/pa1/php/html/templates/templates/albums_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16859320541c8f57b73391-13012281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '377b6b2703757bb07975dee8943e0676b8b4fde3' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/albums_edit.tpl',
      1 => 1411244523,
      2 => 'file',
    ),
    '39ab05aeed319fe98bc89559694cad589260b920' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1410998380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16859320541c8f57b73391-13012281',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_541c8f57ba60b4_93512143',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541c8f57ba60b4_93512143')) {function content_541c8f57ba60b4_93512143($_smarty_tpl) {?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>

    <link rel="stylesheet" href="/static/css/style.css" />

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body bgcolor="#58ACFA">
  <div class="center">
    

<style>

h1{
   text-transform: uppercase;
}

</style>



<center>


<h1>EDIT <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
's ALBUMS</h1>

<table border="1">

<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['album'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['album']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['name'] = 'album';
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['title_array']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['album']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['album']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['album']['total']);
?>



  <tr>
   <td><?php echo $_smarty_tpl->tpl_vars['title_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']];?>
</td>
   <td><a href="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/album/edit/<?php echo $_smarty_tpl->tpl_vars['album_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']];?>
">EDIT</a></td>
   <td><form method="post" action="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/albums/edit/<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" name="form1">
    <input type="submit" name="op" value="delete">
    <input type="hidden" name="albumid" value="<?php echo $_smarty_tpl->tpl_vars['album_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']];?>
"></form></td>
 <tr>


<?php endfor; endif; ?>
  <tr>
   <td>
    <form method="post" action="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/albums/edit/<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" name="form2">
    Add:<input type="text" name="add">
     <input type="submit" name="op" value="add">
     <input type="hidden" name="albumid" value="<?php echo $_smarty_tpl->tpl_vars['album_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']];?>
">
    </form>
   </td>
  </tr>


</table>

<p>

<table border="1">
 <tr>
  <td>
   <a href="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1">
    <b>
     BACK TO USERS
    </b>
   </a>
  </td>
 </tr>

</table>




  </div>
  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html><?php }} ?>
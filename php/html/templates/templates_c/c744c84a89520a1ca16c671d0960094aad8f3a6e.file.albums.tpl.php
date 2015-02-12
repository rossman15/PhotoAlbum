<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 08:03:09
         compiled from "/var/www/html/group34/admin/pa1/php/html/templates/templates/albums.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1241818025541a1ea8201837-63259605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c744c84a89520a1ca16c671d0960094aad8f3a6e' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/albums.tpl',
      1 => 1411200179,
      2 => 'file',
    ),
    '39ab05aeed319fe98bc89559694cad589260b920' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1410998380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1241818025541a1ea8201837-63259605',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_541a1ea8234083_28309313',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541a1ea8234083_28309313')) {function content_541a1ea8234083_28309313($_smarty_tpl) {?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>

    <link rel="stylesheet" href="/static/css/style.css" />

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body bgcolor="#58ACFA">
  <div class="center">
    
<center>
<h1>ALBUMS FOR <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</h1>
<style>
h1 {
  text-transform: uppercase;
}
</style>  


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
  <tr><td align="center"><a href="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/album/<?php echo $_smarty_tpl->tpl_vars['albumid_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['title_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['album']['index']];?>
</a></td></tr>
<?php endfor; endif; ?>

</table>

<p>

<table border="1">

 <tr>
  <td align="center">
   <a href="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1"><b>BACK TO USERS</b></a>
  </td>
 </tr>

</table>

</center>


  </div>
  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html><?php }} ?>
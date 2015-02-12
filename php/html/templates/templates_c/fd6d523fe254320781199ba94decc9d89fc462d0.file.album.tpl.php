<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 18:16:58
         compiled from "/var/www/html/group34/admin/pa1/php/html/templates/templates/album.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1312697612541a3b31624375-41407955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd6d523fe254320781199ba94decc9d89fc462d0' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/album.tpl',
      1 => 1411237018,
      2 => 'file',
    ),
    '39ab05aeed319fe98bc89559694cad589260b920' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1410998380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1312697612541a3b31624375-41407955',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_541a3b31667e14_81668608',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541a3b31667e14_81668608')) {function content_541a3b31667e14_81668608($_smarty_tpl) {?>

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

<h1><font style="font-style: ; text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['album_title']->value;?>
</h1>


<table border="1">

<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['name'] = 'pictures';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['pic_array']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pictures']['total']);
?>
 <tr>
  <td align="center"><img src="http://eecs485-10.eecs.umich.edu:5734/<?php echo $_smarty_tpl->tpl_vars['pic_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['url'];?>
" style="width: 140px; height:120px" alt="Cannot Display Picture"></td>
  <td><form method="post" action="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/pic" name="form1">
    <input type="submit" name="picid" value="<?php echo $_smarty_tpl->tpl_vars['pic_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['picid'];?>
">
    <input type="hidden" name="last_pic" value="<?php echo $_smarty_tpl->tpl_vars['last_pic']->value;?>
"> 
    <input type="hidden" name="first_pic" value="<?php echo $_smarty_tpl->tpl_vars['first_pic']->value;?>
"></form></td>
  <td align="center"><?php echo $_smarty_tpl->tpl_vars['pic_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['caption'];?>
</td>
 </tr>

<?php endfor; endif; ?>



</table>

<p>

<table border="1">

 <tr>
  <td align="center">
   <a href="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/albums/<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
"><b>BACK TO ALBUMS</b></a>
  </td>
 </tr>

</table>


</center>



  </div>
  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html><?php }} ?>
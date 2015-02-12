<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 17:55:35
         compiled from "/var/www/html/group34/admin/pa1/php/html/templates/templates/pic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:813431105541ba6a2d49519-52663112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4256e9a1c02628e144a309ace54ec8ccbd4712c' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/pic.tpl',
      1 => 1411235573,
      2 => 'file',
    ),
    '39ab05aeed319fe98bc89559694cad589260b920' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1410998380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '813431105541ba6a2d49519-52663112',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_541ba6a2d934d4_71657917',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541ba6a2d934d4_71657917')) {function content_541ba6a2d934d4_71657917($_smarty_tpl) {?>

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

<h1><?php echo $_smarty_tpl->tpl_vars['picid']->value;?>
</h1>
<img src="http://eecs485-10.eecs.umich.edu:5734/<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">

<br><b>Caption:</b><br><?php echo $_smarty_tpl->tpl_vars['caption']->value;?>


<p>
 <table border="1">

  <tr>
   <td><form method="post" action="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/pic" name="form1">
    <input type="submit" name="button" value="PREV">
    <input type="hidden" name="picid" value="<?php echo $_smarty_tpl->tpl_vars['picid']->value;?>
">
    <input type="hidden" name="last_pic" value="<?php echo $_smarty_tpl->tpl_vars['last_pic']->value;?>
">
    <input type="hidden" name="first_pic" value="<?php echo $_smarty_tpl->tpl_vars['first_pic']->value;?>
"></form></td>
    <td><form method="post" action="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/pic" name="form1">
    <input type="submit" name="button" value="NEXT">
    <input type="hidden" name="picid" value="<?php echo $_smarty_tpl->tpl_vars['picid']->value;?>
">
    <input type="hidden" name="last_pic" value="<?php echo $_smarty_tpl->tpl_vars['last_pic']->value;?>
">
    <input type="hidden" name="first_pic" value="<?php echo $_smarty_tpl->tpl_vars['first_pic']->value;?>
"></form></td>
  </tr>

 </table>
</p>

<p>
<table border="1">

<tr><td><b><a href="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/album/<?php echo $_smarty_tpl->tpl_vars['albumid']->value;?>
">BACK TO ALBUM</a><b></td></tr>

</table>
</p>


  </div>
  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html><?php }} ?>
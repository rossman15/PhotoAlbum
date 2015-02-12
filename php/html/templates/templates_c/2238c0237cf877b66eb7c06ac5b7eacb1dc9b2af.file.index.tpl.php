<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 06:42:33
         compiled from "/var/www/html/group34/admin/pa1/php/html/templates/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18884888375418f6c8d929c7-41589440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2238c0237cf877b66eb7c06ac5b7eacb1dc9b2af' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/index.tpl',
      1 => 1411195328,
      2 => 'file',
    ),
    '39ab05aeed319fe98bc89559694cad589260b920' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1410998380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18884888375418f6c8d929c7-41589440',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5418f6c8dcf895_18712303',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418f6c8dcf895_18712303')) {function content_5418f6c8dcf895_18712303($_smarty_tpl) {?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>

    <link rel="stylesheet" href="/static/css/style.css" />

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body bgcolor="#58ACFA">
  <div class="center">
    

<title>Group 34</title>
<meta name="description" content="A basic photo album">
<meta name="keywords" content="photos, album, photo, EECS485">

<center>

<p>
 <h1>Welcome!</h1>
</p>

<p>
  <h4>Select Your Username<br>
   from the table below:</h4>
<table border="1">
<tr>
    <td align="center"><b>Username</b></td>
    <td align="center"><b>VIEW ALBUMS</b></td>
    <td align="center"><b>EDIT ALBUMS</b></td>
</tr>

<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
  <tr>
   <td align="center"><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</td>
   <td align="center"><a href="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/albums/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">VIEW</a></td>
   <td align="center"><a href="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/albums/edit/<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
">EDIT</td>
  </tr>
<?php } ?>

</table>





  </div>
  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html><?php }} ?>
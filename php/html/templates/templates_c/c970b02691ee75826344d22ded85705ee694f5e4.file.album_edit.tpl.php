<?php /* Smarty version Smarty-3.1.14, created on 2014-09-20 20:24:48
         compiled from "/var/www/html/group34/admin/pa1/php/html/templates/templates/album_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:980312563541c9f1c852ba5-38576250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c970b02691ee75826344d22ded85705ee694f5e4' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/album_edit.tpl',
      1 => 1411244684,
      2 => 'file',
    ),
    '39ab05aeed319fe98bc89559694cad589260b920' => 
    array (
      0 => '/var/www/html/group34/admin/pa1/php/html/templates/templates/base.tpl',
      1 => 1410998380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '980312563541c9f1c852ba5-38576250',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_541c9f1c88cf42_53562513',
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541c9f1c88cf42_53562513')) {function content_541c9f1c88cf42_53562513($_smarty_tpl) {?>

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

<h1><font style="font-style: ; text-transform: uppercase;">edit <?php echo $_smarty_tpl->tpl_vars['album_title']->value;?>
 album</h1>

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
  <td align="center"><?php echo $_smarty_tpl->tpl_vars['pic_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['picid'];?>
</td>
  <td align="center"><form method="post" action="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/album/edit" name="form1">
    <input type="submit" name="op" value="delete">
    <input type="hidden" name="picid" value="<?php echo $_smarty_tpl->tpl_vars['pic_array']->value[$_smarty_tpl->getVariable('smarty')->value['section']['pictures']['index']]['picid'];?>
">
    <input type="hidden" name="albumid" value="<?php echo $_smarty_tpl->tpl_vars['albumid']->value;?>
"></form></td>
 </tr>

<?php endfor; endif; ?>


<tr>
  <form enctype="multipart/form-data" action="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/upload" method="post">
   <td align="center"> 
    <label for="file">Add Photo:</label>
   </td>
   <td>
    Send this file: <input name="userfile" type="file" />
   </td> 
   <td>
    <input type="submit" value="Send File" />
   </td>
   <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
   <input type="hidden" name="op" value="add"/>
   <input type="hidden" name="album_title" value="<?php echo $_smarty_tpl->tpl_vars['album_title']->value;?>
"/>
  </form>
 </tr>
</table>

<p>

<table border="1">
 <tr>
  <td align="center">
   <b>   
    <a href="http://eecs485-10.eecs.umich.edu:5734/aqsiby/pa1/albums/edit/<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
     BACK TO ALBUMS
    </a>
   </b>
  </td>
 </tr>


</table>

</center>



  </div>
  <script type="text/javascript" src="/static/js/main.js"></script>
</body>

</html><?php }} ?>
<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-13 03:13:11
  from 'C:\OSPanel\domains\mvc.local\application\view\auth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e93ae9749efd0_58471023',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99618cb1a8894df40a17362b58ac87680570572d' => 
    array (
      0 => 'C:\\OSPanel\\domains\\mvc.local\\application\\view\\auth.tpl',
      1 => 1586736769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e93ae9749efd0_58471023 (Smarty_Internal_Template $_smarty_tpl) {
?><form class="auth-form<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajax-form<?php }?>" data-action="/auth/?ajax=1" action="/auth/" method="post">
    <h1 style="text-align: center">Авторизация</h1>
    <input type="text" name="login" placeholder="Логин" value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
">
    <input type="password" name="pass" placeholder="Пароль" value="<?php echo $_smarty_tpl->tpl_vars['pass']->value;?>
">
    <button type="submit">Войти</button>
    <?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
        <div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
    <?php }?>
</form><?php }
}

<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-13 15:24:56
  from '/var/www/u0545195/data/www/league.ru.com/application/view/auth.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e945a18998737_31200242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38691160cc5903f50c466fa8ef4069ab12f4e4de' => 
    array (
      0 => '/var/www/u0545195/data/www/league.ru.com/application/view/auth.tpl',
      1 => 1586780689,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e945a18998737_31200242 (Smarty_Internal_Template $_smarty_tpl) {
?><form class="auth-form<?php if ($_smarty_tpl->tpl_vars['ajax']->value) {?> ajax-form<?php }?>" data-action="/auth/?ajax=1" action="/auth/" method="post">
    <h1 style="text-align: center">Авторизация</h1>
    <div class="input-group  mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Логин</span>
        </div>
        <input required type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
" class="form-control">
    </div>
    <div class="input-group  mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Пароль</span>
        </div>
        <input required type="password" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['pass']->value;?>
" class="form-control">
    </div>
    <input type="hidden" name="redirect" value="<?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
">
    <button class="btn btn-primary" type="submit">Войти</button>
    <?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?>
        <div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
    <?php }?>
</form><?php }
}

<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-13 15:30:33
  from '/var/www/u0545195/data/www/league.ru.com/application/view/task_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e945b697b3d19_20401341',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d6227d2ed83bac731dbdb745adbb38b3540e036' => 
    array (
      0 => '/var/www/u0545195/data/www/league.ru.com/application/view/task_edit.tpl',
      1 => 1586781023,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e945b697b3d19_20401341 (Smarty_Internal_Template $_smarty_tpl) {
?><form class="modal-edit ajax-form" data-action="/?act=edit&id=<?php ob_start();
echo $_smarty_tpl->tpl_vars['task']->value->id;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
&ajax=1" method="post" data-id="<?php echo $_smarty_tpl->tpl_vars['task']->value->id;?>
">
    <div class="task-wrapper">
        <div class="task">
            <h1>Изменение задачи</h1>
            <?php if ($_smarty_tpl->tpl_vars['success']->value === true) {?>
                <div class="success">
                    Изменения сохранены
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['success']->value === false) {?>
                <div class="error">
                    При изменении произошли ошибки
                </div>
            <?php }?>
            <div class="error">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['task']->value->errors, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
                    <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['task']->value->id;?>
">
            <div class="input-group  mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><?php  $_prefixVariable2 = $_smarty_tpl->tpl_vars['task']->value;
echo $_prefixVariable2::$model['username']['title'];?>
</span>
                </div>
                <input required type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['task']->value->username;?>
" class="form-control">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><?php  $_prefixVariable3 = $_smarty_tpl->tpl_vars['task']->value;
echo $_prefixVariable3::$model['email']['title'];?>
</span>
                </div>
                <input required type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['task']->value->email;?>
" class="form-control">
            </div>
            <label>
                <span><?php  $_prefixVariable4 = $_smarty_tpl->tpl_vars['task']->value;
echo $_prefixVariable4::$model['completed']['title'];?>
</span>
                <input type="checkbox" name="completed"<?php if ($_smarty_tpl->tpl_vars['task']->value->completed) {?> checked<?php }?> value="1">
            </label>
            <textarea required name="text"><?php echo $_smarty_tpl->tpl_vars['task']->value->text;?>
</textarea>
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </div>
    </div>
</form>
<?php }
}

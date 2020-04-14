<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-13 03:07:00
  from 'C:\OSPanel\domains\mvc.local\application\view\task_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e93ad24bdfb89_56655639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cf4c83e892faaf77af751f4f8b826592f226b39' => 
    array (
      0 => 'C:\\OSPanel\\domains\\mvc.local\\application\\view\\task_edit.tpl',
      1 => 1586736419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e93ad24bdfb89_56655639 (Smarty_Internal_Template $_smarty_tpl) {
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
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['task']->value->id;?>
">
            <label>
                <span><?php  $_prefixVariable2 = $_smarty_tpl->tpl_vars['task']->value;
echo $_prefixVariable2::$model['username']['title'];?>
</span>
                <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['task']->value->username;?>
">
            </label>
            <label>
                <span><?php  $_prefixVariable3 = $_smarty_tpl->tpl_vars['task']->value;
echo $_prefixVariable3::$model['email']['title'];?>
</span>
                <input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['task']->value->email;?>
">
            </label>
            <label>
                <span><?php  $_prefixVariable4 = $_smarty_tpl->tpl_vars['task']->value;
echo $_prefixVariable4::$model['completed']['title'];?>
</span>
                <input type="checkbox" name="completed"<?php if ($_smarty_tpl->tpl_vars['task']->value->completed) {?> checked<?php }?> value="1">
            </label>
            <textarea required name="text"><?php echo $_smarty_tpl->tpl_vars['task']->value->text;?>
</textarea>
            <button type="submit">Сохранить</button>
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
        </div>
    </div>
</form>
<?php }
}

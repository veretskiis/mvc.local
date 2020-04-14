<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-14 09:17:47
  from 'C:\OSPanel\domains\mvc.local\application\view\task_add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e95558bc56fc1_37033195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10dc79605a643db0274a75cef9e94df4443454b7' => 
    array (
      0 => 'C:\\OSPanel\\domains\\mvc.local\\application\\view\\task_add.tpl',
      1 => 1586781023,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e95558bc56fc1_37033195 (Smarty_Internal_Template $_smarty_tpl) {
?><form class="add-task ajax-form" data-action="/?act=add&ajax=1" method="post">
    <h2 class="mt-3">Добавить новую задачу</h2>
    <?php if ($_smarty_tpl->tpl_vars['success']->value === true) {?>
        <div class="success">
            Задача добавлена
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['success']->value === false) {?>
        <div class="error">
            При добавлении произошли ошибки
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
    <div class="input-group  mb-3 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Имя</span>
        </div>
        <input required type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['task']->value->username;?>
" class="form-control">
    </div>
    <div class="input-group  mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Email</span>
        </div>
        <input required type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['task']->value->email;?>
" class="form-control">
    </div>
    <label class="textarea">
        <span>Текст задачи: </span>
        <textarea required name="text"><?php echo $_smarty_tpl->tpl_vars['task']->value->text;?>
</textarea>
    </label>
    <button class="btn btn-primary" type="submit">Добавить</button>

</form><?php }
}

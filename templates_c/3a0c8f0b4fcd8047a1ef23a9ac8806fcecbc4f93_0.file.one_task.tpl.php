<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-11 20:33:59
  from 'C:\OSPanel\domains\mvc.local\application\view\one_task.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e91ff87380a78_46866353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a0c8f0b4fcd8047a1ef23a9ac8806fcecbc4f93' => 
    array (
      0 => 'C:\\OSPanel\\domains\\mvc.local\\application\\view\\one_task.tpl',
      1 => 1586626438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e91ff87380a78_46866353 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('item', $_smarty_tpl->tpl_vars['task']->value->getValues());?>
<div class="task js-edited" data-action="/?act=edit" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
    <div class="task__title"><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
</div>
    <div class="task__completed"><?php echo $_smarty_tpl->tpl_vars['item']->value['completed'];?>
</div>
    <div class="task__email"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</div>
    <div class="task__text">
        <?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>

    </div>
    <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
        <span title="Изменить задачу" class="task__edit js-edit"></span>
        <form action="">
            <input type="text" name="username" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
">
            <input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
">
            <input type="checkbox" name="completed"<?php if ($_smarty_tpl->tpl_vars['item']->value['completed']) {?> checked<?php }?> value="1">
            <textarea name="text"><?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>
</textarea>
            <button type="submit">Сохранить</button>
        </form>
    <?php }?>
</div><?php }
}

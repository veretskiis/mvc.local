<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-11 20:50:48
  from 'C:\OSPanel\domains\mvc.local\application\view\task.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e92037891b933_56755281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88be908cc31e25357b4c53f8f8bad70ce32a388b' => 
    array (
      0 => 'C:\\OSPanel\\domains\\mvc.local\\application\\view\\task.tpl',
      1 => 1586627448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e92037891b933_56755281 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php }?>
</div><?php }
}

<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-14 09:17:47
  from 'C:\OSPanel\domains\mvc.local\application\view\tasks_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e95558bc3b804_15335447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd48a68350a2e88e7eb53595c81b0d461649cfd44' => 
    array (
      0 => 'C:\\OSPanel\\domains\\mvc.local\\application\\view\\tasks_item.tpl',
      1 => 1586778742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e95558bc3b804_15335447 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="task js-edited<?php if ($_smarty_tpl->tpl_vars['item']->value['completed']) {?> completed<?php }
if ($_smarty_tpl->tpl_vars['item']->value['edited']) {?> edited<?php }?>" data-action="/?act=edit" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
    <div class="task__title"><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
 <span>(<a href="mailto:<?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</a>)</span></div>
    <div class="task__text">
        <?php echo $_smarty_tpl->tpl_vars['item']->value['text'];?>

    </div>
    <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
        <span title="Изменить задачу" class="task__edit in-modal" data-url="/?act=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&ajax=1"></span>
    <?php }?>
</div><?php }
}

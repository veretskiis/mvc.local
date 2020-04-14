<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-13 14:53:45
  from '/var/www/u0545195/data/www/league.ru.com/application/view/tasks_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9452c9ce2806_28514641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d72dc15c40f9facbe3588a9c47729ba71bb868e' => 
    array (
      0 => '/var/www/u0545195/data/www/league.ru.com/application/view/tasks_item.tpl',
      1 => 1586778742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9452c9ce2806_28514641 (Smarty_Internal_Template $_smarty_tpl) {
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

<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-13 10:47:51
  from '/var/www/u0545195/data/www/league.ru.com/application/view/pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e941927e78543_75662818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '684bd269cf912aefcb264ba2c72f48e704b69981' => 
    array (
      0 => '/var/www/u0545195/data/www/league.ru.com/application/view/pagination.tpl',
      1 => 1586715505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e941927e78543_75662818 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="pagination-wrap">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagination']->value->getListHref(), 'item', false, 'num');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
        <div<?php if ($_smarty_tpl->tpl_vars['pagination']->value->current_page == $_smarty_tpl->tpl_vars['num']->value) {?> class="active"<?php }?>>
            <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num']->value;?>
</a>
        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}

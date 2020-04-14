<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-12 21:18:26
  from 'C:\OSPanel\domains\mvc.local\application\view\pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e935b722fc389_77009180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa25e6a00e3bc8d739cfc10c9f9dacd2de70b853' => 
    array (
      0 => 'C:\\OSPanel\\domains\\mvc.local\\application\\view\\pagination.tpl',
      1 => 1586715505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e935b722fc389_77009180 (Smarty_Internal_Template $_smarty_tpl) {
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

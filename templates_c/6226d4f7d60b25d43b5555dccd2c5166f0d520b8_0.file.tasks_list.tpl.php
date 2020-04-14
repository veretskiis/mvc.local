<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-13 15:29:33
  from '/var/www/u0545195/data/www/league.ru.com/application/view/tasks_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e945b2d122d64_57837930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6226d4f7d60b25d43b5555dccd2c5166f0d520b8' => 
    array (
      0 => '/var/www/u0545195/data/www/league.ru.com/application/view/tasks_list.tpl',
      1 => 1586780970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tasks_item.tpl' => 1,
    'file:pagination.tpl' => 1,
    'file:task_add.tpl' => 1,
  ),
),false)) {
function content_5e945b2d122d64_57837930 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Список задач</h1>
<div class="task-wrapper pagination" data-action="/">
    <select name="sort" class="sorted">
        <option <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'id') {?> selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['router']->value->makeUrl('sort','id');?>
">
            По id
        </option>
        <option <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'username') {?> selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['router']->value->makeUrl('sort','username');?>
">
            По имени
        </option>
        <option <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'email') {?> selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['router']->value->makeUrl('sort','email');?>
">
            По email
        </option>
        <option <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'completed') {?> selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['router']->value->makeUrl('sort','completed');?>
">
            По завершенности
        </option>
    </select>
    <select name="sort" class="sorted">
        <option <?php if ($_smarty_tpl->tpl_vars['sort_direction']->value == 'ASC') {?> selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['router']->value->makeUrl('sort_direction','ASC');?>
">
            по возрастанию
        </option>
        <option <?php if ($_smarty_tpl->tpl_vars['sort_direction']->value == 'DESC') {?> selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['router']->value->makeUrl('sort_direction','DESC');?>
">
            по убыванию
        </option>
    </select>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'item', false, 'index');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
        <?php $_smarty_tpl->_subTemplateRender("file:tasks_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php
}
} else {
?>
        <div class="task-wrapper">
            <div class="task">Нет задач</div>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php $_smarty_tpl->_subTemplateRender("file:pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:task_add.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

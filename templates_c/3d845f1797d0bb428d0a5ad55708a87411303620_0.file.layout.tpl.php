<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-13 15:25:44
  from '/var/www/u0545195/data/www/league.ru.com/application/view/layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e945a485450e0_27039451',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d845f1797d0bb428d0a5ad55708a87411303620' => 
    array (
      0 => '/var/www/u0545195/data/www/league.ru.com/application/view/layout.tpl',
      1 => 1586780741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e945a485450e0_27039451 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <link href="../../static/css/main.css" rel="stylesheet">
        <link href="../../static/css/bootstrap.css" rel="stylesheet">
        <?php echo '<script'; ?>
 src="../../static/js/main.js" type="text/javascript"><?php echo '</script'; ?>
>
    </head>
   <body>
   <header class="header">
       <div class="wrapper wrapper_head">
           <a class="header__main" href="/">
               Задачи
           </a>
           <?php if ($_smarty_tpl->tpl_vars['is_admin']->value) {?>
               <a class="header__auth" href="/auth/?act=logout&redirect=<?php echo $_SERVER['REQUEST_URI'];?>
">Выйти</a>
           <?php } else { ?>
               <a class="header__auth in-modal" data-url="/auth/?ajax=1&redirect=<?php echo $_SERVER['REQUEST_URI'];?>
" href="/auth/?redirect=<?php echo $_SERVER['REQUEST_URI'];?>
">Войти</a>
           <?php }?>
       </div>
   </header>
   <div class="wrapper">
       <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

   </div>
   <div class="modal-c">
       <div class="modal__canvas">
           <div class="modal__content"></div>
           <div class="modal__close"></div>
       </div>
   </div>
   </body>
</html><?php }
}

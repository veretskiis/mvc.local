<html>
    <head>
        <link href="../../static/css/main.css" rel="stylesheet">
        <link href="../../static/css/bootstrap.css" rel="stylesheet">
        <script src="../../static/js/main.js" type="text/javascript"></script>
    </head>
   <body>
   <header class="header">
       <div class="wrapper wrapper_head">
           <a class="header__main" href="/">
               Задачи
           </a>
           {if $is_admin}
               <a class="header__auth" href="/auth/?act=logout&redirect={$smarty.server['REQUEST_URI']}">Выйти</a>
           {else}
               <a class="header__auth in-modal" data-url="/auth/?ajax=1&redirect={$smarty.server['REQUEST_URI']}" href="/auth/?redirect={$smarty.server['REQUEST_URI']}">Войти</a>
           {/if}
       </div>
   </header>
   <div class="wrapper">
       {$content}
   </div>
   <div class="modal-c">
       <div class="modal__canvas">
           <div class="modal__content"></div>
           <div class="modal__close"></div>
       </div>
   </div>
   </body>
</html>
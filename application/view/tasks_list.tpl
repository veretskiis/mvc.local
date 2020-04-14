<h1>Список задач</h1>
<div class="task-wrapper pagination" data-action="/">
    <select name="sort" class="sorted">
        <option {if $sort == 'id'} selected{/if} value="{$router->makeUrl('sort', 'id')}">
            По id
        </option>
        <option {if $sort == 'username'} selected{/if} value="{$router->makeUrl('sort', 'username')}">
            По имени
        </option>
        <option {if $sort == 'email'} selected{/if} value="{$router->makeUrl('sort', 'email')}">
            По email
        </option>
        <option {if $sort == 'completed'} selected{/if} value="{$router->makeUrl('sort', 'completed')}">
            По завершенности
        </option>
    </select>
    <select name="sort" class="sorted">
        <option {if $sort_direction == 'ASC'} selected{/if} value="{$router->makeUrl('sort_direction', 'ASC')}">
            по возрастанию
        </option>
        <option {if $sort_direction == 'DESC'} selected{/if} value="{$router->makeUrl('sort_direction', 'DESC')}">
            по убыванию
        </option>
    </select>
    {foreach $list as $index => $item}
        {include file="tasks_item.tpl"}
    {foreachelse}
        <div class="task-wrapper">
            <div class="task">Нет задач</div>
        </div>
    {/foreach}
    {include file="pagination.tpl"}
</div>
{include file="task_add.tpl"}

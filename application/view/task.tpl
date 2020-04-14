{$item = $task->getValues()}
<div class="task js-edited" data-action="/?act=edit" data-id="{$item.id}">
    <div class="task__title">{$item.username}</div>
    <div class="task__completed">{$item.completed}</div>
    <div class="task__email">{$item.email}</div>
    <div class="task__text">
        {$item.text}
    </div>
    {if $is_admin}
        <span title="Изменить задачу" class="task__edit js-edit"></span>
    {/if}
</div>
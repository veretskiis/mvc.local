<div class="task js-edited{if $item.completed} completed{/if}{if $item.edited} edited{/if}" data-action="/?act=edit" data-id="{$item.id}">
    <div class="task__title">{$item.username} <span>(<a href="mailto:{$item.email}">{$item.email}</a>)</span></div>
    <div class="task__text">
        {$item.text}
    </div>
    {if $is_admin}
        <span title="Изменить задачу" class="task__edit in-modal" data-url="/?act=edit&id={$item.id}&ajax=1"></span>
    {/if}
</div>
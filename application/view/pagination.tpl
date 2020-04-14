<div class="pagination-wrap">
    {foreach $pagination->getListHref() as $num => $item}
        <div{if $pagination->current_page == $num} class="active"{/if}>
            <a href="{$item}">{$num}</a>
        </div>
    {/foreach}
</div>
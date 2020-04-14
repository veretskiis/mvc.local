<form class="modal-edit ajax-form" data-action="/?act=edit&id={{$task->id}}&ajax=1" method="post" data-id="{$task->id}">
    <div class="task-wrapper">
        <div class="task">
            <h1>Изменение задачи</h1>
            {if $success === true}
                <div class="success">
                    Изменения сохранены
                </div>
            {elseif $success === false}
                <div class="error">
                    При изменении произошли ошибки
                </div>
            {/if}
            <div class="error">
                {foreach $task->errors as $error}
                    <p>{$error}</p>
                {/foreach}
            </div>
            <input type="hidden" name="id" value="{$task->id}">
            <div class="input-group  mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">{$task::$model.username.title}</span>
                </div>
                <input required type="text" name="username" value="{$task->username}" class="form-control">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">{$task::$model.email.title}</span>
                </div>
                <input required type="email" name="email" value="{$task->email}" class="form-control">
            </div>
            <label>
                <span>{$task::$model.completed.title}</span>
                <input type="checkbox" name="completed"{if $task->completed} checked{/if} value="1">
            </label>
            <textarea required name="text">{$task->text}</textarea>
            <button class="btn btn-primary" type="submit">Сохранить</button>
        </div>
    </div>
</form>

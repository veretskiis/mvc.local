<form class="add-task ajax-form" data-action="/?act=add&ajax=1" method="post">
    <h2 class="mt-3">Добавить новую задачу</h2>
    {if $success === true}
        <div class="success">
            Задача добавлена
        </div>
    {elseif $success === false}
        <div class="error">
            При добавлении произошли ошибки
        </div>
    {/if}
    <div class="error">
        {foreach $task->errors as $error}
            <p>{$error}</p>
        {/foreach}
    </div>
    <div class="input-group  mb-3 mt-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Имя</span>
        </div>
        <input required type="text" name="username" value="{$task->username}" class="form-control">
    </div>
    <div class="input-group  mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Email</span>
        </div>
        <input required type="email" name="email" value="{$task->email}" class="form-control">
    </div>
    <label class="textarea">
        <span>Текст задачи: </span>
        <textarea required name="text">{$task->text}</textarea>
    </label>
    <button class="btn btn-primary" type="submit">Добавить</button>

</form>
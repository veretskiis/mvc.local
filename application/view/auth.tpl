<form class="auth-form{if $ajax} ajax-form{/if}" data-action="/auth/?ajax=1" action="/auth/" method="post">
    <h1 style="text-align: center">Авторизация</h1>
    <div class="input-group  mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Логин</span>
        </div>
        <input required type="text" name="login" value="{$login}" class="form-control">
    </div>
    <div class="input-group  mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Пароль</span>
        </div>
        <input required type="password" name="pass" value="{$pass}" class="form-control">
    </div>
    <input type="hidden" name="redirect" value="{$redirect}">
    <button class="btn btn-primary" type="submit">Войти</button>
    {if !empty($error)}
        <div class="error">{$error}</div>
    {/if}
</form>
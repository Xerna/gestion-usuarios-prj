<?php
loadPartial('header')
?>
<div class="container-sm mx-auto bg-white p-5 " style="width: 25%;">
    <form>
        <div class="mb-3">
            <label for="user_email" class="form-label">email</label>
            <input type="email" class="form-control" id="user_email" name="user_email">
        </div>
        <div class="mb-3">
            <label for="user_pw" class="form-label">password</label>
            <input type="password" class="form-control" id="user_pw" name="user_pw">
        </div>
        <p>¿No tienes una cuenta? &nbsp;<a href="/auth/register">Registrate aqui</a></p>
        <button type="submit" class="btn btn-primary mt-2">Iniciar Sesion</button>

    </form>
</div>
<?php
loadPartial('footer')
?>
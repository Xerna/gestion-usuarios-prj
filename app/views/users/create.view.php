<?php
loadPartial('header')
?>

<div class="container-sm mx-auto bg-white p-5 " style="width: 45%;">
<?= loadPartial('errors', [
      'errors' => $errors ?? []
])?>
    <form method="post" action="/users/store">
        <div class="row mb-3">
            <div class="col-5">
                <label for="user_name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="user_name" name="user_name" value=<?= $user['user_name'] ?? '';?>>
            </div>
            <div class="col-5 offset-1">
                <label for="user_lastname" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="user_lastname" name="user_lastname" value=<?= $user['user_lastname'] ?? '';?>>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-8">
                <label for="user_email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="user_email" id="user_email" value=<?= $user['user_email'] ?? '';?>>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-8">
                <label for="user_pw" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="user_pw" id="user_pw">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <a href="/auth/login" class="btn btn-secondary mt-2 w-75">Volver</a>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary mt-2 w-100">Registrate</button>
            </div>
        </div>


    </form>
</div>
<?php
loadPartial('footer')
?>
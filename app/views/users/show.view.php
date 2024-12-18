<?php loadPartial('header') ?>

<div class="container-sm mx-auto bg-white p-5" style="width: 75%;">
    <div class="card shadow p-5">
        <div class="row g-0">
            <div class="col-md-4 p-4">
                <img src="../img/image.png" class="img-fluid rounded-start w-100 h-100 object-fit-contain"
                    alt="Profile picture" style="object-fit: cover; height: 100%;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <form id="userForm" action="/users/<?= $user['id'] ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?=$user['nombre'] ?? ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="user_lastname" name="user_lastname" value="<?= $user['apellido'] ?? ''; ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo:</label>
                            <input type="email" class="form-control" id="user_email" name="user_email" 
                                value="<?=$user['correo'] ?? ''; ?>">
                        </div>
                        
                        <div class="d-flex gap-2">
                  
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                <i class="fa-regular fa-floppy-disk me-2"></i> Guardar
                            </button>
                        </div>
                    </form>

              
                    <form action="/users/<?= $user['id'] ?>" method="POST" class="mt-2">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('¿Está seguro que desea eliminar este usuario?');">
                            <i class="fa-solid fa-trash-can me-2"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php loadPartial('footer'); ?>
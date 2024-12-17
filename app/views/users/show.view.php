<?php
loadPartial('header')
?>
<div class="container-sm mx-auto bg-white p-5 " style="width: 75%;">

 <div class="card shadow p-5">
            <div class=" row g-0">
                <div class="col-md-4 p-4">
                    <img src="../img/image.png" class="img-fluid rounded-start  w-100 h-100 object-fit-contain"
                        alt="Profile picture" style="object-fit: cover; height: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <form id="userForm">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$user['nombre'] ?? '';?>">
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?=$user['apellido'] ?? '';?>">
                            </div>

                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="correo"
                                value="<?=$user['correo'] ?? '';?>">
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary flex-grow-1">
                                    <i class="bi bi-save"></i> Guardar
                                </button>
                                <button type="button" class="btn btn-danger flex-grow-1">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php
loadPartial('footer');
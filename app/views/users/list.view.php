<?php
include_once basePath('app/views/partials/header.view.php');
?>
<div class="container-sm mx-auto bg-white p-5 " style="width: 75%;">
    <table class="table table-striped " id="user-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td class="col-1"><?= $user['id']; ?></td>
                    <td class="col-3"><?= $user['nombre']; ?></td>
                    <td class="col-3"><?= $user['correo']; ?></td>
                    <td class="col-2">
                        <a href=""><i class="fa-solid fa-eye fs-5 "></i></a>
                        <form class="form" action="/users/delete/<?= $user['id']; ?>" method="POST" style="display: inline;">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn" onclick=" return confirm('¿Estás seguro?');">
                                <i class="fa-solid fa-trash fs-5 text-danger ms-2"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>


<?php
include_once basePath('app/views/partials/footer.view.php');

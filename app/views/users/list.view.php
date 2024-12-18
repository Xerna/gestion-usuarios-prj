<?php
loadPartial('header')
?>

<div class="container-sm mx-auto bg-white p-5 " style="width: 75%;">
    
<?= loadPartial('message', [
      'message' => $message ?? ''
])?>
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
                        <a href="/users/<?=$user['id'];?>"><i class="fa-solid fa-eye fs-5 "></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>


<?php
loadPartial('footer');

<?php
include_once basePath('app/views/partials/header.view.php');
foreach ($users as $user): ?>
    <h1><?= $user['nombre']; ?></h1>
<?php endforeach; ?>

<?php
include_once basePath('app/views/partials/footer.view.php');

<?php if (isset($errors)) : ?>
  <?php foreach ($errors as $error) : ?>
    <div class="message bg-danger text-white bg-gradient text-center p-2 mb-4 bg-opacity-75"><?= $error ?></div>
  <?php endforeach; ?>
<?php endif; ?>
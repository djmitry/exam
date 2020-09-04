<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
</head>
<body>
    <?php if ($this->flash->has('success')) { ?>
        <div class="alert alert-success"><?= $this->flash->get('success') ?></div>
    <?php } ?>

    <?php if ($this->flash->has('error')) { ?>
        <div class="alert alert-danger"><?= $this->flash->get('error') ?></div>
    <?php } ?>

    <?= $form->render() ?>
</body>
</html>
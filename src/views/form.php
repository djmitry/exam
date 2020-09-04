<?php

use App\components\Csrf;

?>
<div class="form-feedback">
    <?php foreach($this->errors as $error) { ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>
    <form action="index.php" method="POST">
        <input type="hidden" name="form" value="feedback">
        <input type="hidden" name="csrf_token" value="<?= Csrf::create() ?>">
        <div class="form-group">
            <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>">
        </div>
        <div class="form-group">
            <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>">
        </div>
        <div class="form-group">
            <textarea name="text" id="" rows="10"><?= $_POST['text'] ?? '' ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Send</button>
        </div>
    </form>
</div>
<?php

use App\Csrf;

foreach($this->errors as $error) {
?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php
}
?>
<form action="index.php" method="POST">
    <input type="hidden" name="form" value="feedback">
    <input type="hidden" name="csrf_token" value="<?= Csrf::create() ?>">
    <div>
        <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>">
    </div>
    <div>
        <input type="text" name="email" value="<?= $_POST['email'] ?? '' ?>">
    </div>
    <div>
        <textarea name="text" id="" cols="30" rows="10"><?= $_POST['text'] ?? '' ?></textarea>
    </div>
    <div>
        <button type="submit">Send</button>
    </div>
</form>
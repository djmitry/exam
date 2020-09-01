<?php

use App\Csrf;

foreach($this->errors as $error) {
?>
    <div class="alert alert-danger"><?= $error ?></div>
<?php
}
?>
<form action="index.php" type="POST">
    <input type="hidden" name="csrf_token" value="<?= Csrf::createToken() ?>">
    <div>
        <input type="text" name="name">
    </div>
    <div>
        <input type="text" name="email">
    </div>
    <div>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
    </div>
</form>
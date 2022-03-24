<?php

include "layout/header.php" ?>

    <div class="clearfix">
        <div class="box">
            <h2>Ваш аккаунт:</h2>
            <p><?= $authResponse ?></p>
            <form action="" method="post">
                <input type="submit" name="Exit" value="Выйти">
            </form>
        </div>
    </div>

<?php
include "layout/footer.php" ?>
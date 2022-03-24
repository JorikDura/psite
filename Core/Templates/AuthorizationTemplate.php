<?php

include "layout/header.php" ?>

    <div class="clearfix">
        <div class="box">
            <h2>Авторизация</h2>
            <form action="" method="post" autocomplete="off">
                <label for="login">Логин</label><br>
                <input type="text" id="login" name="login" placeholder="Ваш логин..."><br>
                <label for="password">Пароль</label><br>
                <input type="password" id="password" name="password" placeholder="Ваш пароль..."><br>
                <input type="submit" value="Залогинится">
            </form>
        </div>
        <div class="box">
            <p><?= $authResponse ?></p>
        </div>
    </div>

<?php
include "layout/footer.php" ?>
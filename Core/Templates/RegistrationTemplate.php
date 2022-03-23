<?php

include "layout/header.php" ?>

    <div class="clearfix">
        <div class="box">
            <h2>Регистрация</h2>
            <form action="" method="post" autocomplete="off">
                <label for="regLogin">Придумайте логин</label><br>
                <input type="text" id="regLogin" name="regLogin" placeholder="Ваш логин..."><br>
                <label for="regPassword">Придумайте пароль</label><br>
                <input type="password" id="regPassword" name="regPassword" placeholder="Ваш пароль..."><br>
                <input type="submit" value="Зарегистрироваться">
            </form>
        </div>
        <div class="box">
            <?= $registResponse ?>
        </div>
    </div>

<?php
include "layout/footer.php" ?>
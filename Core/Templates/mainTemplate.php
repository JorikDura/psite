<?php

include "layout/header.php" ?>
    <div class="clearfix">
        <div class="box">
            <form action="index.php" method="get" autocomplete="off">
                <label for="fstr">Введите имя:</label><br>
                <input type="text" id="fstr" name="fstr" placeholder="Введите имя..."><br>
                <label for="nstr">Введите фамилию:</label><br>
                <input type="text" id="nstr" name="nstr" placeholder="Введите фамилию..."><br>
                <label for="time">Введите дату рождения: </label><br>
                <input type="date" id="time" name="time" placeholder="Ваша дата..."><br>
                <input type="submit" value="Отправить" id="button">
            </form>
        </div>
        <div class="box">
            <?= $serverResponse ?>
        </div>
    </div>
<?php
include "layout/footer.php" ?>
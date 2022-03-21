<?php

include "layout/header.php" ?>
    <div class="clearfix">
    <div class="box">
        <h2>Новости</h2>
        <ul class="databaselist">
            <?= $news ?>
        </ul>
        <!-- форма для страниц -->
        <form action="" method="post" target="_self">
            <input type="submit" value="<?= $page - 1 ?>" name="page">
            <span> <?= $page ?></span>
            <input type="submit" value="<?= $page + 1 ?>" name="page">
        </form>
    </div>
    <!-- форма для ввода данных -->
    <div class="box">
        <h2>Создать новость</h2>
        <form action="" method="post" autocomplete="off">
            <label for="_title">Введите заголовок:</label><br>
            <input type="text" id="_title" name="_title" placeholder="Введите заголовок..."><br>
            <label for="nstr">Введите текст:</label><br>
            <input type="text" id="_text" name="_text" placeholder="Введите текст..."><br>
            <label for="time">Введите дату новости: </label><br>
            <input type="date" id="_date" name="_date" placeholder="Ваша дата..."><br>
            <input type="submit" value="Отправить">
        </form>
        <h2>Выбрать язык</h2>
        <form action="" method="post" target="_self">
            <input type="submit" value="Русский" name="language">
            <input type="submit" value="Не русский" name="language">
        </form>
    </div>
    <br>
<?php
include "layout/footer.php" ?>
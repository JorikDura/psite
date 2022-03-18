<!DOCTYPE html>
<html lang="ru-RU" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keyword" content="php">
    <meta name="description" content="AwA">
    <title>nst php ver 0.89564</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!-- Меню -->
<ul class="sidenav">
    <li><a href="\">Формы</a></li>
    <li><a href="news">Новости</a></li>
    <li style="float: right;"><a href="#about">About</a></li>
</ul>

<div class="clearfix">
    <div class="box">
        <h2>Новости</h2>
        <ul class="databaselist">
            <?php
            error_reporting(E_ALL);
            $page = 1;

            if (isset($_POST["page"])) {
                $page = (int)$_POST["page"];

                if ($page < 1) {
                    $page = 1;
                }

            }

            $lang = 1;

            if(isset($_COOKIE["kuki"]))
            {

                if($_COOKIE["kuki"] == "2")
                {
                    $lang = 2;
                }

            }

            if(isset($_POST["language"]))
            {

                if($_POST["language"] == "Русский")
                {
                    $lang = 1;
                }

                if($_POST["language"] == "Не русский")
                {
                    $lang = 2;
                }

            }

            setcookie("kuki", $lang);

            //вывод базы данных
            $DB = new \Core\Controllers\NewsController();
            $listOfNews = $DB->getNews($page, $lang);
            /*print_r($listOfNews);*/
            if ($listOfNews == null) {
                echo "Тут пока что пусто";
            }

            foreach ($listOfNews as $news) : ?>
                <li>
                    <h3><?= $news["title"] ?></h3>
                    <?= $news["content"] ?><br>
                    <p>Дата публикации: <?= $news["date"] ?></p>
                </li>
            <?php
            endforeach; ?>
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
            <input disabled type="submit" value="Отправить">
        </form>
        <!-- форма для языка -->
        <h2>Выбрать язык</h2>
        <form action="" method="post" target="_self">
            <input type="submit" value="Русский" name="language">
            <input type="submit" value="Не русский" name="language">
        </form>
    </div>
    <br>

    <?php
    error_reporting(E_ALL);

    if (isset($_POST["_title"]) && isset($_POST["_text"]) && isset($_POST["_date"])) {
        $date = htmlspecialchars($_POST["_date"]);
        $str1 = htmlspecialchars($_POST["_text"]);
        $str2 = htmlspecialchars($_POST["_title"]);

        if ($date != "" && $str1 != "" && $str2 != "") {
            $DB->insertDataToNews($str2, $str1, $date, $_COOKIE["kuki"]);
            header('Refresh:0; url=news.php');
        }
    }
    ?>
    <!-- подключаем java скрипты -->
    <script src="script.js"></script>
</body>
</html
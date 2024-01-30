<?php
include "connect.php"; // выражение include включает и выполняет указанный файл

$query_get_category = "select * from categories";

$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category)); //получаем результат запроса из переменной query_get_category
// и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса

$news = mysqli_query($con, "select * from news");
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;800&display=swap" rel="stylesheet">
    <title>Админка</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <section class="last-news">
            <div class="container">
                <?php
                while ($new = mysqli_fetch_assoc($news)) {
                    $new_id = $new['news_id'];
                    echo "<a id='newsp' href='oneNew.php?new=$new_id'>Новость: " . $new['title'] . "</a>";
                }
                ?>
        </section>
    </main>
    </div>
</body>

</html>
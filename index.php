<?php
include "connect.php"; // выражение include включает и выполняет указанный файл

$id_cat = isset($_GET['cat']) ? ($_GET['cat']) : false;

$news = mysqli_query($con, "select * from news where category_id = '$id_cat'");

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
    <title>Главная</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <section class="last-news">
            <div class="container">
                <?php
                while ($new = mysqli_fetch_assoc($news)) {
                    $new_id = $new['news_id'];
                    echo "<a id='newsp' href='oneNew.php?new=$new_id'>Новость: " . $new['news_id'] . "</a>";
                    // echo "<p id='newsp'>Новость" . " " . $new['news_id'] . "<br></p>";
                    echo "<div class='card'>";
                    echo "<h2 class='c_title'>" . $new['title'] . "</h2><br>";
                    // echo "<p>Категория: <b>" . $new['name'] . "</b></p>";
                    echo "<br><p>" . $new['content'] . "</p>";
                    echo "<img id='img' src=images/news/" . $new['image'] . ">";
                    echo "<p id='newsdate'>Дата публикации" . " " . $new['publish_date'] . "</p>";
                    echo "</div>";

                }
                ?>
        </section>
    </main>
    </div>
</body>

</html>
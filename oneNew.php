<?php

include("connect.php");
include("header.php");

$new_id = isset($_GET["new"]) ? intval($_GET["new"]) : false;
$query_getNew = "SELECT news.*, categories.name FROM news INNER JOIN categories on news.category_id = categories.category_id where news_id = $new_id";
$new = mysqli_fetch_assoc(mysqli_query($con, $query_getNew));
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;800&display=swap" rel="stylesheet">
    <title>карточка</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <section class="last-news">
            <div class="container">
                <?php

                echo "<a id='newsp' href='oneNew.php?new=$new_id'>Новость: " . $new['news_id'] . "</a>";
                // echo "<p id='newsp'>Новость" . " " . $new['news_id'] . "<br></p>";
                echo "<div class='cardd'>";
                echo "<h2 class='c_title'>" . $new['title'] . "</h2><br>";
                echo "<p>Категория: <b>" . $new['name'] . "</b></p>";
                echo "<br><p>" . $new['content'] . "</p>";
                echo "<img id='img' src=images/news/" . $new['image'] . ">";
                echo "<p id='newsdate'>Дата публикации" . " " . $new['publish_date'] . "</p>";
                echo "</div>";
                ?>
            </div>
        </section>
    </main>

</body>

</html>
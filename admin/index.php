<?php
include "../connect.php"; // выражение include включает и выполняет указанный файл
include "../header.php";

$query_get_category = "select * from categories";

$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category)); //получаем результат запроса из переменной query_get_category
// и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса

$news = mysqli_query($con, "select * from news");

$id_new = isset($_GET["new"])? $_GET["new"] :false;

if($id_new) $new_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM news WHERE news_id = $id_new"));
// var_dump($id_new?$new['title']:"");
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
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <main>
    <h1 id="large_text">Панель администратора</h1>
        <section class="last-news">
            <div class="containerr">
                <div class="col_1">
                <h1>Список новостей</h1>
                    <?php
                    while ($new = mysqli_fetch_assoc($news)) {
                        $new_id = $new['news_id'];
                        echo "<a id='newsp' href='?new=$new_id'>Новость: " . $new['title'] . "</a>";
                    }
                    ?>
                    <a href="/admin"><img src="/images/plus.png" alt="Добавить новость"></a>
                </div>
                <div class="col_2">
                    <main>

                        <h1><?=$id_new?"Редактирование новости №$id_new":"Создание новости"?></h1>

                        <form action='<?=$id_new?"update":"create";?>NewValid.php' method="POST" enctype="multipart/form-data" class="newsForm">

                        <?=$id_new? "<input type='hidden' name='id' value='$id_new'>":"";?>
                        
                            <label for="userTitle">Напишите заголовок...</label>
                            <input type="text" id="userTitle" name="userTitle" value="<?=$id_new?$new_info["title"]:"";?>">
                            <br>

                            <label for="userCategory">Выберите категорию</label>
                            <select name="userCategory" id="Category">
                                <?php foreach ($categories as $category) {
                                    $id_cat = $category[0];
                                    $name = $category[1];
                                    $is_sel = ($id_cat==$new_info['category_id'])?"selected":'';
                                    echo "<option value='$id_cat'". ($id_new?$is_sel:'') .">$name</option>";
                                } ?>

                            </select>

                            <label for="userImages">Загрузите изображение</label>
                            <input type="file" id="userImages" name="userImages" accept="image/*">
                            <?=$id_new?"<img id='img_ad' src='/images/news/".$new_info["image"]."'>":"";?>
                            <br>

                            <label for="userText">Напишите текст...</label>
                            <input id="text" type="text" name="userText" value="<?=$id_new?$new_info["content"]:"";?>">
                            <br>

                            <input id="button" type="submit" value="Сохранить">

                        </form>
                    </main>
                </div>
        </section>
    </main>
    </div>
</body>

</html>
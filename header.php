<?php
$query_get_category = "select * from categories";

$categories = mysqli_fetch_all(mysqli_query($con, $query_get_category)); //получаем результат запроса из переменной query_get_category
// и преобразуем его в двумерный массив, где каждый элемент это массив с построчным получением кортежей из таблицы результата запроса
?>

<div class="header">
        <div class="header-div1">
            <img src="images/menu.png" alt="">
            <p>Разделы</p>
        </div>
        <hr class="hr1">
        <div class="header-div2">
            <img src="images/search.png" alt="">
            <label for="">
                <input type="search" name="" id="nav-search" placeholder="Поиск">
            </label>
        </div>
        <div class="header-div3">
            <img src="images/profile.png" alt="">
            <a href="admin.php">Войти</a>
        </div>
    </div>
    <hr class="hr2">
    <div class="logo-date">
        <div>
            <h1>Пингвинсы</h1>
        </div>
        <div class="date-weather">
            <p>Monday, January 1, 2018</p>
            <div class="weather">
                <img src="images/weather.png" alt="">
                <p>- 23 °C</p>
            </div>
        </div>
    </div>
    <div class="section">
    <?php
        foreach($categories as $category){
            echo "<li id='styleme'><a href = #>$category[1]</a></li>";
        }
        ?>
    </div>
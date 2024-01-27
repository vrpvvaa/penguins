<?php

include("connect.php");
// $userImages = $_FILES["userImages"];
// $userTitle = $_POST["userTitle"];
// $userText = $_POST["userText"];
// $userCategory = $_POST["userCategory"];
// $types = ['image/jpeg', 'image/png'];
// if (mb_strlen($userTitle)>20){
// echo "<p>слишком много букв <br></р›";
// };

// foreach($types as $value) {
// if ($userImages[ 'type'] == $value){
// echo 'ок картинка есть <br>';
// }
// };
// if (is_string($userTitle) && is_string($userText) && is_string($userCategory)) {
//     echo 'ок норм текст <br>';
// } else {
//     echo 'нужны буковки <br>';
// }

// echo '<br>Введённые данные:' . '<br>';
// echo 'Заголовок: ' . $userTitle . '<br>';
// echo 'Текст: ' . $userText . '<br>';
// echo 'Категория: ' . $userCategory . '<br>'; 

$image = $_FILES["userImages"]["name"];
$title = $_POST["userTitle"];
$text = $_POST["userText"];

$update = "INSERT INTO `news` (`image`, `title`, `content`, `category_id`) VALUES ('$image', '$title', '$text', 1)";

if (mysqli_query($con, $update)) {
    echo "новая запись добавлена";

} else {
    echo "ошибка " . $update . "<br>" . mysqli_error($con);
}
?>
<?php
$user_name = $_POST["user_name"]; 
$user_phone = $_POST["user_phone"];
$user_email = $_POST["user_email"];

// Проверка переданных значений из формы
var_dump($user_name, $user_phone, $user_email);

$db = mysqli_connect("localhost", "root", "", "MarcoPoloInvest"); 

if(mysqli_connect_errno()){ // при соединении с базой данных возникла ошибка
    echo 'Ошибка соединения: ' . mysqli_connect_error() . '<br>';
    echo 'Код ошибки: ' . mysqli_connect_errno();
 }else{ // соединение было установлено успешно
    // здесь можно делать запрос к базе, 
    // потому что соединение успешно установлено
    echo "Success";

    $sql = "INSERT INTO MarcoPoloInvest(user_name, user_phone, user_email) VALUES ('$user_name', '$user_phone', '$user_email')";
    $result = mysqli_query($db, $sql) or die("Ошибка в запросе: " . mysqli_error($db));
    
    // Проверка результатов выполнения запроса
    if($result) {
        echo "Данные успешно записаны в базу данных";
    } else {
        echo "Ошибка при записи данных в базу данных";
    }
 }

// Закрываем соединение с базой данных
mysqli_close($db);
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars($_POST['name']);
    $secondName = htmlspecialchars($_POST['secondName']);
    $parol = htmlspecialchars($_POST['parol']);
    $year = htmlspecialchars($_POST['year']);
    $phrase = htmlspecialchars($_POST['phrase']);
    $hobbi = htmlspecialchars($_POST['hobbi']);
    $profession = htmlspecialchars($_POST['profession']);
    $contact = htmlspecialchars($_POST['contact']);
    $email = htmlspecialchars($_POST['email']);

if ( empty($name) || empty($secondName) || empty($parol) || empty($year) || empty($contact) || empty($email)  =='')
{
    echo "Заполните все обязательные поля";
}
    echo "<h2>Регистрация успешна!</h2>";
    echo "<p>Имя: $name</p>";
    echo "<p>Фамилия: $secondName</p>";
    echo "<p>Пароль: $parol</p>";
    echo "<p>Год рождения: $year</p>";
    echo "<p>Цитата: $phrase</p>";
    echo "<p>Хобби: $hobbi</p>";
    echo "<p>Профессия: $profession</p>";
    echo "<p>Номер телефона: $contact</p>";
    echo "<p>Email: $email</p>";

} else {
    echo "Некорректный запрос.";
    }
&>
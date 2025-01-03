<!DOCTYPE html> 
<html>
<head>
    <title>Админ панель</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
        }
        .registration-header {
            font-size: 36px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }
        .books__form {
            width: 300px;
            margin: 70px auto 150px; /* Отступы сверху и снизу */
            text-align: center;
        }
        .books__form-input {
            width: 100%;
            font-size: 18px;
            background-color: #353535; /* Темный фон */
            color: #fff; /* Белый текст */
            padding: 10px 20px;
            border: 2px solid #9c27b0; /* Фиолетовый цвет */
            border-radius: 5px;
            margin: 5px 0;
        }
        .books__form-input:focus {
            outline: none;
            border: 2px solid #9c27b0; /* Фиолетовый цвет */
        }
        .books__form-input::placeholder {
            color: #9c27b0; /* Фиолетовый цвет */
        }
        .books__form-button {
            background-color: #9c27b0; /* Фиолетовый */
            padding: 10px 20px;
            color: #fff; /* Белый текст */
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .books__form-button:hover {
            background-color: #7b1fa2; /* Более темный фиолетовый */
        }
        .logout {
            background-color: #9c27b0; /* Фиолетовый */
            color: #fff; /* Белый текст */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
        }
        .logout:hover {
            background-color: #7b1fa2; /* Более темный фиолетовый */
        }
        th {
            color: #9c27b0; /* Фиолетовый */
        }
        table {
            box-sizing: border-box;
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="registration-header">Админ панель</div>
    
    <form class='books__form' action='delete_user.php' method='post'>
        <input type='text' class='books__form-input' name='id' placeholder='ID пользователя'>
        <input type='submit' class='books__form-button' value='Удалить'>
    </form>

    <form class='books__form' action='edit_user.php' method='post'>
        <input type='text' class='books__form-input' name='id' placeholder='ID пользователя'>
        <input type='text' class='books__form-input' name='login' placeholder='Новый логин'>
        <input type='text' class='books__form-input' name='password' placeholder='Новый пароль'>
        <input type='text' class='books__form-input' name='email' placeholder='Новый email'>
        <input type='submit' class='books__form-button' value='Редактировать'>
    </form>

    <form method="post" action="authindex.php">
        <input type="submit" class="logout" name="logout" value="На главную">
    </form>

    <?php
    require_once __DIR__ . "/config/db.php";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    if (!$_SESSION['authorized']) {
        header('Location: index.php');
        exit;
    }
    $sql = "SELECT id, login, password, email FROM users";
    $result = $conn->query($sql);
    if ($_SESSION['username'] != "Yazykova") {
        header('Location: index.php');
        exit;
    }
    echo "<table>";
    echo "<tr><th>ID</th><th>Login</th><th>Password</th><th>Email</th></tr>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["login"] . "</td><td>" . $row["password"] . "</td><td>" . $row["email"] . "</td></tr>";
        }
    } else {
        echo "0 results";
    }
    echo "</table>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["logout"])) {
            session_unset();
            session_destroy();
            header("Location: main.php");
            exit;
        }
    }
    $conn->close();
    ?> 
</body>
</html>

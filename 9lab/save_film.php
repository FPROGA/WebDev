<?php
	/* проверяем наличие всех обязательных полей формы */
	if(isset($_GET['category_identity']) && isset($_GET['director']) && isset($_GET['title']) && isset($_GET['raiting'])) {
		/* считываем значения с формы */
		$category_identity = (int)$_GET['category_identity'];
		$director= $_GET['director'];
		$title = $_GET['title'];
		$raiting = $_GET['raiting'];
		/* проверяем корректность данных, введённых на форме */
		if(strlen($director) > 0 && strlen($director) <= 100 && strlen($title) > 0 && strlen($title) <= 200 && $raiting >= 0 && $raiting <= 1) {
			try {
				/* подключаемся к серверу баз данных */
				$pdo = new PDO('mysql:host=localhost;dbname=films', 'root', 'TemaiSofaBF', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				/* в зависимости от присутствия/отсутствия идентификатора книги выполняем нужный запрос */
				if(isset($_GET['identity'])) {
					$identity = (int)$_GET['identity'];
					$pdo->exec("UPDATE `film` SET `category_identity`=$category_identity, `director`='$director', `title`='$title', `raiting`=$raiting WHERE `identity`=$identity");
				} else {
					$pdo->exec("INSERT INTO `film` (`category_identity`, `director`, `title`, `raiting`) VALUES ($category_identity, '$director', '$title', $raiting)");
				}
				/* закрываем подключение к базе данных */
				$pdo = NULL;
				/* перенаправляем пользователя на список всех фильмов */
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/index.php');
			} catch(PDOException $e) {
				/* при возникновении ошибки работы с базой данных, перенаправляем на страницу ошибки */
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Ошибка работы с базой данных'));
			}
		} else {
			/* если данные, введённых на форме, некорректны, перенаправляем на страницу ошибки */
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Некорректные данные'));
		}
	} else {
		/* в случае отсутствия одного из обязательных полей формы, перенаправляем на страницу ошибки */
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Данные пропущены'));
	}
?>
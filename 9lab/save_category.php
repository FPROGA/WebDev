<?php
	/* аналогично save_book.php */
	if(isset($_GET['name']) && isset($_GET['raiting'])) {
		$name = $_GET['name'];
		$raiting = $_GET['raiting'];
		if(strlen($name) > 0 && strlen($name) <= 50 && $raiting >= 0 && $raiting <= 1) {
			try {
				$pdo = new PDO('mysql:host=localhost;dbname=books', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				if(isset($_GET['identity'])) {
					$identity = (int)$_GET['identity'];
					$pdo->exec("UPDATE `category` SET `name`='$name', `raiting`=$raiting WHERE `identity`=$identity");
				} else {
					$pdo->exec("INSERT INTO `category` (`name`, `raiting`) VALUES ('$name', $raiting)");
				}
				$pdo = NULL;
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/categories.php');
			} catch(PDOException $e) {
				header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Ошибка работы с базой данных'));
			}
		} else {
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Некорректные данные'));
		}
	} else {
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Данные пропущены'));
	}
?>
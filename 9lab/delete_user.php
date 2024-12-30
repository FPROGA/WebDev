<?php
	if(isset($_GET['identity'])) {
		$identity = (int)$_GET['identity'];
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=books', 'root', 'TemaiSofaBF', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			$count = $pdo->exec("DELETE FROM `film` WHERE `identity`=$identity");
			$pdo = NULL;
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/index.php');
		} catch(PDOException $e) {
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Ошибка работы с базой данных'));
		}
	} else {
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Данные пропущены'));
	}
?>
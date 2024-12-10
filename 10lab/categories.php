
<?php

	try {
		$pdo = new PDO('mysql:host=localhost;dbname=films', 'root', 'TemaiSofaBF', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$result = $pdo->query('SELECT `identity`, `name`, `raiting` FROM `category`');
		$pdo = NULL;
	} catch(PDOException $e) {
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Ошибка работы с базой данных'));
	}
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<TITLE>Список категорий</TITLE>
		<LINK href="style.css" rel="stylesheet" type="text/css">
	</HEAD>
	<BODY>
		<H1>Список категорий</H1>
		<MENU>
			<LI><A href="index.php">Фильмы</A></LI>
			<LI><STRONG>категории</STRONG></LI>
		</MENU>
		<TABLE>
			<TR>
				<TH>название</TH>
				<TH>общий рейтинг</TH>
				<TH>&nbsp;</TH>
			</TR>
			<?php
				foreach($result as $row) {
					echo '<TR>';
					echo '<TD>'.$row['name'].'</TD>';
					echo '<TD>'.$row['raiting'].'</TD>';
					echo '<TD>';
					echo '<FORM action="edit_category.php">';
					echo '<INPUT type="hidden" name="identity" value="'.$row['identity'].'">';
					echo '<DIV class="small"><BUTTON type="submit">&gt;&gt;</BUTTON></DIV>';
					echo '</FORM>';
					echo '</TD>';
					echo '</TR>';
				}
			?>
		</TABLE>
		<FORM class="main" action="edit_category.php">
			<DIV class="small"><BUTTON type="submit">+</BUTTON></DIV>
		</FORM>
	</BODY>
</HTML>

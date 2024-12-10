<?php
	
	$name = '';
	$raiting = '';
	if(isset($_GET['identity'])) {
		$identity = (int)$_GET['identity'];
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=films', 'root', 'TemaiSofaBF', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			$result = $pdo->query("SELECT `name`, `raiting` FROM `category` WHERE `identity`=$identity");
			$pdo = NULL;
			foreach($result as $row) {
				$name = $row['name'];
				$raiting = $row['raiting'];
			}
		} catch(PDOException $e) {
			header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Ошибка работы с базой данных'));
		}
	}
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<TITLE>Новая категория</TITLE>
		<LINK href="style.css" rel="stylesheet" type="text/css">
	</HEAD>
	<BODY>
		<H1>Новая категория</H1>
		<MENU>
			<LI><A href="index.php">фильмы</A></LI>
			<LI><A href="categories.php">категории</A></LI>
		</MENU>
		<FORM class="main" action="save_category.php">
			<?php
				if(isset($identity)) {
					echo "<INPUT type=\"hidden\" name=\"identity\" value=\"$identity\">";
				}
			?>
			<DIV><STRONG>название</STRONG> (обязательное поле - строка не длиннее 25 символов):</DIV>
			<DIV class="large"><INPUT name="name" value="<?php echo $name;?>"></DIV>
			<DIV><STRONG>рейтинг</STRONG> (обязательное поле - десятичное дробное число в диапазоне [0, 1]):</DIV>
			<DIV class="large"><INPUT name="raiting" value="<?php echo $raiting;?>"></DIV>
			<DIV class="large"><BUTTON type="submit">сохранить</BUTTON></DIV>
		</FORM>
		<?php
			if(isset($identity)) {
				echo '<FORM class="main" action="delete_category.php">';
				echo "<INPUT type=\"hidden\" name=\"identity\" value=\"$identity\">";
				echo '<DIV class="large"><BUTTON type="submit">удалить</BUTTON></DIV>';
				echo '</FORM>';
			}
		?>
	</BODY>
</HTML>

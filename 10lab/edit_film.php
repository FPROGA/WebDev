<?php
	/* формируем значения по умолчанию для книги */
	$category_identity = 0;
	$author = '';
	$title = '';
	$raiting = '';
	try {
		/* выполняем подключение к базе данных */
		$pdo = new PDO('mysql:host=localhost;dbname=films', 'root', 'TemaiSofaBF', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

		$categories = $pdo->query('SELECT `identity`, `name`, `raiting` FROM `category`');

		if(isset($_GET['identity'])) {
			/* выполняем явное приведение типа, чтобы исключить SQL-инъекцию */
			$identity = (int)$_GET['identity'];
			/* загружаем информацию о книге с заданным идентификатором */
			$result = $pdo->query("SELECT `identity`, `category_identity`, `director`, `title`, `raiting` FROM `film` WHERE `identity`=$identity");
			foreach($result as $row) {
				$category_identity = $row['category_identity'];
				$author = $row['director'];
				$title = $row['title'];
				$raiting = $row['raiting'];
			}
		}
		/* закрываем подключение к базе данных */
		$pdo = NULL;
	} catch(PDOException $e) {
		/* в случае ошибки перенаправляем пользователя на страницу с сообщением об ошибке */
		header('Location: http://'.$_SERVER['HTTP_HOST'].'/error.php?message='.urlencode('Ошибка работы с базой данных'));
	}
?>
<!-- отображаем форму редактирования/добавления книги -->
<!DOCTYPE html>
<HTML>
	<HEAD>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<TITLE>Новая книга</TITLE>
		<LINK href="style.css" rel="stylesheet" type="text/css">
	</HEAD>
	<BODY>
		<H1>Новая книга</H1>
		<MENU>
			<LI><A href="index.php">фильмы</A></LI>
			<LI><A href="categories.php">категории</A></LI>
		</MENU>
		<FORM class="main" action="save_film.php">
			<?php
				/* если скрипту был передан идентификатор книги (то есть
				необходимо отредактировать книгу, а не создавать новую), с
				помощью скрытого поля указываем этот идентификатор, чтобы
				PHP-скрипт сохранения новых данных смог либо выполнить
				SQL-запрос UPDATE (при наличии идентификатора), или
				SQL-запрос CREATE (если идентификатора нет)*/
				if(isset($identity)) {
					echo "<INPUT type=\"hidden\" name=\"identity\" value=\"$identity\">";
				}
			?>
			<DIV><STRONG>категория</STRONG>:</DIV>
			<SELECT name="category_identity">
			<?php
				/* формируем элементы выпадающего списка категорий */
				foreach($categories as $row) {
					echo '<OPTION value="'.$row['identity'].'"';
					/* в случае если идентификатор категории совпадает с идентификатором
					категории редактируемой книги, делаем этот пункт выпадающего списка
					выделенным по умолчанию */
					if(isset($category_identity) && $row['identity'] == $category_identity) {
						echo ' selected';
					}
					echo '>'.$row['name'].'</OPTION>';
				}
			?>
			</SELECT>
			<DIV><STRONG>Режиссер</STRONG> (обязательное поле - строка не длиннее 50 символов):</DIV>
			<DIV class="large"><INPUT name="author" value="<?php echo $author;?>"></DIV>
			<DIV><STRONG>Название</STRONG> (обязательное поле - строка не длиннее 100 символов):</DIV>
			<DIV class="large"><INPUT name="title" value="<?php echo $title;?>"></DIV>
			<DIV><STRONG>рейтинг</STRONG> (обязательное поле - десятичное дробное число в диапазоне [0, 1]):</DIV>
			<DIV class="large"><INPUT name="raiting" value="<?php echo $raiting;?>"></DIV>
			<DIV class="large"><BUTTON type="submit">сохранить</BUTTON></DIV>
		</FORM>
		<?php
			/* если присутствует идентификатор (то есть выполняется редактирование
			уже существующей книги), создаём форму с кнопкой удаления книги, в
			ином случае (если идентификатора нет и создаётся новая книга)
			кнопка удаления не будет иметь смысла, так как нельзя удалить из
			базы данных запись, ещё туда не сохранённую */
			if(isset($identity)) {
				echo '<FORM class="main" action="delete_book.php">';
				echo "<INPUT type=\"hidden\" name=\"identity\" value=\"$identity\">";
				echo '<DIV class="large"><BUTTON type="submit">удалить</BUTTON></DIV>';
				echo '</FORM>';
			}
		?>
	</BODY>
</HTML>

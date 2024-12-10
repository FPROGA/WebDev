<?php
	if(isset($_GET['message'])) {
		$message = $_GET['message'];
	} else {
		$message = 'Неизвестная ошибка';
	}
?>
<!DOCTYPE html>
<HTML>
	<HEAD>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<TITLE><?php echo $message;?></TITLE>
		<LINK href="style.css" rel="stylesheet" type="text/css">
	</HEAD>
	<BODY>
		<H1 class="error"><?php echo $message;?></H1>
		<MENU>
			<LI><A href="index.php">фильмы</A></LI>
			<LI><A href="categories.php">категории</A></LI>
		</MENU>
	</BODY>
</HTML>

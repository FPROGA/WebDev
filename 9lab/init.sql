
DROP DATABASE IF EXISTS `films`;
CREATE DATABASE `films` DEFAULT CHARACTER SET utf8;
USE `films`;


CREATE TABLE `category` (
	/* первичный ключ с автоматически присваиваемым очередным номером */
	`identity` INTEGER PRIMARY KEY AUTO_INCREMENT,
	/* название категории */
	`name` VARCHAR(50) NOT NULL,
	/* рейтинг категории (среди других категорий) */
	`raiting` REAL NOT NULL CHECK (`raiting` BETWEEN 0 AND 1)
) DEFAULT CHARACTER SET utf8;


CREATE TABLE `film` (
	/* первичный ключ с автоматически присваиваемым очередным номером */
	`identity` INTEGER PRIMARY KEY AUTO_INCREMENT,
	/* идентификатор категории, которой принадлежит фильм */
	`category_identity` INTEGER NOT NULL,
	/* имя режиссера фильма */
	`director` VARCHAR(100) NOT NULL,
	/* название фильма */
	`title` VARCHAR(200) NOT NULL,
	/* рейтинг фильма в пределах категории */
	`raiting` REAL NOT NULL CHECK (`raiting` BETWEEN 0 AND 1),
	/* внешний ключ, связывающий таблицу книг с таблицей категорий */
	FOREIGN KEY (`category_identity`) REFERENCES `category` (`identity`)
	/* при изменении в таблице категорий значений идентификаторов,
	соответствующие значения идентификаторов в таблице книг также будут
	изменены */
	ON UPDATE CASCADE
	/* удаление записей из таблицы категорий, для которых есть связанные записи
	в таблице книг, будет блокировано (запрещено) */
	ON DELETE RESTRICT
) DEFAULT CHARACTER SET utf8;

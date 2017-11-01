<?php
/**
 * Assignment #2
 * These are your database (MySQL) login credentials
 *    Host: localhost
 *    User: root
 *    Password: gamepointtrialzday
 *    Database: gamepoint
 *
 * These are the tables structures of the tables:
 *
 * CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `status` enum('forwarded','pending','authorised') DEFAULT NULL,
  `totalPrice` int(11) DEFAULT NULL,
  `methodID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
 *
 *  CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
 *
 *
 *
 *
 * Make a backend script, select all payments for user "Henk"
 * Output should be something like this:
 * <payment.id>   <user.firstname> <user.lastname>    <payment.totalPrice>     <payment.status>    <payment.methodID>
 *
 *
 */

//* These are your database (MySQL) login credentials
//*    Host: localhost
//*    User: root
//*    Password: gamepointtrialzday
//*    Database: gamepoint
const query = 'SELECT * FROM user JOIN payment on user.id = payment.userID WHERE user.firstname="Henk"';
// why try..catch was not used?
// 1. РНР shows try..catch error by default in console and other essential places.
// 2. try..catch need to be used only if we really handle source of problem
// 3. and many other reasons
//- во-вторых, этот код гораздо менее гибкий: он выводит ошибку ТОЛЬКО на экран, в то время как исключение улетит туда же, куда и все остальные ошибки: либо в лог файл, либо на экран, в зависимости от глобальных настроек.
//Поэтому использовать try..catch нужно только тогда, когда вы собираетесь ОБРАБОТАТЬ ошибку - то есть, совершить какое-то действие, связанное с ФАКТОМ ошибки - откатить транзакцию, например. Для того же, чтобы просто выдать сообщение об ошибке, try..catch использовать не нужно - PHP прекрасно справится сам

$pdo = new PDO('mysql:host=localhost;dbname=gamepoint', 'gamepoint', 'gamepointtrialzday');
$statement = $pdo->query(query);
$rows = $statement->fetchAll(PDO::FETCH_NUM);
var_dump($rows);
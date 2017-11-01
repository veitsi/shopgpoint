<?php
/**
 * Assignment #3
 * Use the same code from assignment #2
 *
 * Create a web page which fetches the data without a refresh/pageload
 * The page should initially show a button with the text 'Fetch all payments'
 * - If you click on it, you should fetch the data in a JSON format. Result should look like the image below (see imgur.com URL)
 *
 * Minimal requirements:
 * - Use jQuery
 * - The fetched data should be in JSON format
 * - Loop through the data and show the output in a HTML table (so JSON shouldn't return HTML, but pure JSON)
 *
 * You're allowed to use other frontend/JS frameworks (i.e. Bootstrap, jQuery plugins)
 *
 * Output should be similar to http://imgur.com/a/jUKm1
 * */
//SELECT * FROM user JOIN payment on user.id = payment.userID JOIN method on payment.methodID=method.id JOIN shoppingCart on payment.id=shoppingCart.paymentID JOIN shoppingCartContent on shoppingCart.id = shoppingCartContent.cartID JOIN product as pr on pr.id = shoppingCartContent.productID

//json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
$pdo = new PDO('mysql:host=localhost;dbname=gamepoint', 'gamepoint', 'gamepointtrialzday');
$statement = $pdo->query('SELECT user.firstname as Firstname,user.lastname as Lastname,payment.id as PaymentID,payment.totalPrice as Price,payment.status as Status, method.name as MethodName, pr.name as ProductName FROM user JOIN payment on user.id = payment.userID JOIN method on payment.methodID=method.id JOIN shoppingCart on payment.id=shoppingCart.paymentID JOIN shoppingCartContent on shoppingCart.id = shoppingCartContent.cartID JOIN product as pr on pr.id = shoppingCartContent.productID');
$rows = json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
echo $rows;
<?php

require_once ('rb-mysql.php');
R::setup( 'mysql:host=localhost;dbname=gamepoint',
    'gamepoint', 'gamepointtrialzday' );
//$method = R::inspect( 'method' );
//echo gettype($method);

$method = R::load( 'method', 1 );
print_r($method->name);
$listOfTables = R::inspect();
foreach ($listOfTables as $table)
{
    echo $table;
    print_r(R::inspect($table));}
R::close();

//PPCmethodArray
//(
//    [id] => int(11)
//[name] => varchar(100)
//)
//paymentArray
//(
//    [id] => int(11)
//[userID] => int(11)
//[status] => enum('forwarded','pending','authorised')
//[totalPrice] => int(11)
//[methodID] => int(11)
//)
//productArray
//(
//    [id] => int(11)
//[name] => varchar(100)
//)
//shoppingCartArray
//(
//    [id] => int(11)
//[userID] => int(11)
//[paymentID] => int(11)
//)
//shoppingCartContentArray
//(
//    [id] => int(11)
//[cartID] => int(11)
//[productID] => int(11)
//[quantity] => int(11)
//)
//userArray
//(
//    [id] => int(11)
//[firstname] => varchar(100)
//[lastname] => varchar(100)
//)

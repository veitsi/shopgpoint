<?php
/**
 * Assignment #1
 * Build all needed classes to run this code succesfully
 * Keep in mind:
 * - It should be possible to pay with CreditCardMethod
 * - It should be possible to buy coins as a product
 */

require_once('rb-mysql.php');
R::setup('mysql:host=localhost;dbname=gamepoint',
    'gamepoint', 'gamepointtrialzday');


class User
{
    static function getInstanceById(int $id)
    {
        return R::load('method', 1);
    }
}

class Model_Product extends RedBean_SimpleModel
{
    public function setPrice(int $price)
    {
        $this->price = $price;
    }
    public function getPrice(int $price)
    {
        return $this->price;
    }
}

class Model_Method extends RedBean_SimpleModel
{
    function setPaidPrice(int $price)
    {
        $this->price=$price;
    }
    function paidPrice()
    {
        return $this->price;
    }

    function isApproved()
    {

    }
}

class ProductFactory
{
    static function create(string $name)
    {
        $product = R::dispense('product');
        $product->name = $name;
        $product->price = null;
        return $product;
    }
}

class PaymentMethodFactory
{
    static function create(string $name)
    {
        $paymentMethod = R::dispense('method');
        return $paymentMethod;
    }
}

$user = User::getInstanceById(334);
$product = ProductFactory::create('vip');
$product->setPrice(100); // in cents
$paymentMethod = PaymentMethodFactory::create('paypal');

class Payment
{
    var $method;

    function __construct($user, $product, $paymentMethod)
    {
        $this->method = $paymentMethod;
    }

    function getMethod()
    {
        return $this->method;
    }
    function authorize()
    {
        return true;
    }
}

$payment = new Payment($user, $product, $paymentMethod);
$paymentMethod->setPaidPrice(100);

if ($payment->getMethod()->isApproved() && $payment->getProduct()->getPrice() == $payment->getMethod()->paidPrice()) {
    var_dump($payment->authorize());
}

<?php

//echo 'hi';

require_once('vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
/*$log = new Logger('name');
$log->pushHandler(new StreamHandler('log/my.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');*/



$time_start = time();

//sleep(2);

//echo isEven(5). "<br>";
//echo isEven(6). "<br>";

echo makePizza(5, false);
//logMemory();


$time_end = time();

$log = new Logger('time');
$log->pushHandler(new StreamHandler('log/time.log', Logger::DEBUG));
$log->debug($time_end - $time_start);

function logMemory(){
$log_memory = new Logger('memory');
$log_memory->pushHandler(new StreamHandler('log/memory.log', Logger::DEBUG));
$log_memory->debug(memory_get_usage());
}



function makePizza($personsCount, $isVegetarian){
	$size = getSize($personsCount);
	logMemory();
	$type = getStuffing($isVegetarian);
	logMemory();
	$price = getPrice($size);
	logMemory();
	return cook($size, $type, $price);
	//return $size;
	
}

function getSize($personsCount){
	if($personsCount < 3){
		return 16;
	}
	else if($personsCount < 5){
		return 35;
	}
	return 50;
}

function getStuffing($isVegetarian){
	$vegetarinPizzas = ["Грибная", "Огуречная", "Сельдерейная", "Баклажанная"];
	$regularPizzas = ["Маргарита", "4 Сыра", "Хамон и Сыр", "Мексиканская острая"];
	if($isVegetarian){
		$pizzaType = array_rand($vegetarinPizzas,1);
		return $vegetarinPizzas[$pizzaType];
}
	else{
		$pizzaType = array_rand($regularPizzas,1);
		return $regularPizzas[$pizzaType];
	}
}
	

function getPrice($size){
	return $size * 10;
}

function cook($size, $type, $price){
	return "Я готовлю пиццу '`$type`' `$size` см., которя обойдется вам в `$price` рублей";
}



function isEven($number){
	if($number < 0){
		$number = abs($number);
	}
	if($number%2==0){
		return $number . " is even";
	}
	return $number . " isn't enven";
}











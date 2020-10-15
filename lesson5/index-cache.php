<?php
require_once('vendor/autoload.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
// создаем инстанс
$m = new Memcached();

// подключаемся к серверу
$m->addServer('localhost', 11211);

// добавляем переменные в кеш
// первое значение — имя ключа, второе - значение
$m->set('int', 99);
$m->set('string', 'a simple string');
$m->set('array', array(11, 12));

// здесь указываем время хранения записи с ключом 'object' - 5 минут
$m->set('object', new stdclass, time() + 300);
//$m->set('object_1m', new stdclass, time() + 300);

// теперь можем вытаскивать значения прямо из кеша
var_dump($m->get('int'));
var_dump($m->get('string'));
var_dump($m->get('array'));
var_dump($m->get('object'));
var_dump($m->get('object_1m'));
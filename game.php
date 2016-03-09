<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 17.03.15
 * Time: 22:09
 */

//============Записываем скорость роботы скрипта в БД для статистики!!!!!=========//
$start = microtime(true);//запуск функции отсчета времени с какого то там года...
$sum = 0;//Наша переменна я в милисекундах!
for ($i = 0; $i < 100000; $i++) $sum += $i;//запускаем цикл для определения скорости выполнения скрипта
//============Записываем скорость роботы скрипта в БД для статистики!!!!!=========//

session_start();

if (!isset($_SESSION['login'])){
    $login = ($_GET['login'] ? $_GET['login'] : $_SESSION['login']);
    print( '<frame name="main" src="core/char.php?Login='.$login.'">' );

    print( '<frameset rows="62%, *, 30, 0" style="overflow: scroll;" FRAMEBORDER="0" BORDER="0" FRAMESPACING="1">' );
    print( '<frame name="main"  src="core/char.php?login='.$login.'">' );
    print( '<frameset cols="*,180">' );
    print( '<frame  name="chat"  src="core/chat.php" target="_top" scrolling=YES FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="3" MARGINHEIGHT="3">' );
    print( '<frame name="online" src="core/room.php" target="_blank" scrolling=YES FRAMEBORDER=0 BORDER=0 FRAMESPACING=0 MARGINWIDTH=3 MARGINHEIGHT=0>' );
    print( '</frameset>' );
    print( '<frame name="bottom" scrolling="no" noresize src="core/buttons.php">' );
    print( '<frame name="refreshed" target="_top" scrolling="no" noresize src="core/refreshed.php">' );
    print( '</frameset>' );
}elseif(isset($_SESSION['login'])){
    $login = $_SESSION['login'];

    print( '<frameset rows="62%, *, 30, 0" style="overflow: scroll;" FRAMEBORDER="0" BORDER="0" FRAMESPACING="1">' );
    print( '<frame name="main"  src="core/char.php?login='.$login.'">' );
    print( '<frameset cols="*,180">' );
    print( '<frame  name="chat"  src="core/chat.php" target="_top" scrolling=YES FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="3" MARGINHEIGHT="3">' );
    print( '<frame name="online" src="core/room.php" target="_blank" scrolling=YES FRAMEBORDER=0 BORDER=0 FRAMESPACING=0 MARGINWIDTH=3 MARGINHEIGHT=0>' );
    print( '</frameset>' );
    print( '<frame name="bottom" scrolling="no" noresize src="core/buttons.php">' );
    print( '<frame name="refreshed" target="_top" scrolling="no" noresize src="core/refreshed.php">' );
    print( '</frameset>' );
} else {
// На стартовую
    print( '<SCRIPT>top.location.href="autoris/exit.php";</SCRIPT>' );
}


//============Записываем скорость роботы скрипта в БД для статистики!!!!!=========//
//============Пищем модуль запуска и отключенияфункций на сайте===================//
// подключаемся к базе
$db = mysql_connect("localhost","root",""); //соединение с базой данных при помощи функции mysql_connect()
mysql_select_db("game",$db)  or die("Could not select database1");// Выбираем БД для коннекта!
//если значение в БД 1 тогда скрипт выполняеться и время будет писаться в БД
//используетьсядля тестирования переодического
//$db = mysql_connect("localhost","root",""); //соединение с базой данных при помощи функции mysql_connect()
//mysql_select_db("neverworld",$db);// Выбираем БД для коннекта!
$id=6;//присваеваю значение айди статистики
$start=microtime(true) - $start;//минусую время запуска скрипта от начала до теперь что б узнать время в мл.сек
$start=round($start,2);//Округляем число после запятой до двух цыфр
$query = "UPDATE site_time SET time='$start'  WHERE id ='$id'";//Обновляю запись в БД
$result = mysql_query($query) or die("Query failed");//Выполняем скрипт или выводим ошибку!
//============Записываем скорость роботы скрипта ве БД для статистики!!!!!=========//
?>
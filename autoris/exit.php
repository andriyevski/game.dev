<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 26.02.15
 * Time: 21:57
 */


session_start();

//если значение в БД 1 тогда скрипт выполняеться и время будет писаться в БД
//используетьсядля тестирования переодического
//============Записываем скорость роботы скрипта в БД для статистики!!!!!=========//
$start = microtime(true);//запуск функции отсчета времени с какого то там года...
$sum = 0;//Наша переменна я в милисекундах!
for ($i = 0; $i < 100000; $i++) $sum += $i;//запускаем цикл для определения скорости выполнения скрипта
//============Записываем скорость роботы скрипта в БД для статистики!!!!!=========//
//============Пишем модуль запуска и отключенияфункций на сайте===================//
// подключаемся к базе
$db = mysql_connect("localhost","root","")//соединение с базой данных при помощи функции mysql_connect()
// Выбираем БД для коннекта!
or die("Could not connect : " . mysql_error());
mysql_select_db("game",$db) or die("Could not select database");
$result = mysql_query("SELECT login,password,SessionID FROM Players WHERE login='login'",$db); //извлекаем из базы все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);

     if    ($_SESSION['login'] == $myrow['login'])
          {
              $query = "SELECT * FROM Players WHERE login='$login'";
              $result = mysql_query($query) or die("Query failed : " . mysql_error());
              $aRow = mysql_fetch_array( $result);
              echo $logins=$aRow["login"];
              echo "</br>";
              echo $id = $aRow["id"];
              echo "</br>";
              echo $sess=$aRow["SessionID"];
              echo "</br>";

              $ID=0;
              $query = "UPDATE Players SET SessionID='$ID'  WHERE login ='$login'";
              $result = mysql_query($query) or die("Query failed : " . mysql_error());

              $query = "SELECT * FROM Players WHERE login='$login'";
              $result = mysql_query($query) or die("Query failed : " . mysql_error());
              $aRow = mysql_fetch_array( $result);
              echo $logins=$aRow["login"];
              echo "</br>";
              echo $id = $aRow["id"];
              echo "</br>";
              echo $sess=$aRow["SessionID"];
              echo "</br>";

              unset($_SESSION['password']);
              unset($_SESSION['login']);
              unset($_SESSION['id']);//    уничтожаем переменные в сессиях
              session_destroy();
              //если не существует сессии с логином и паролем, значит на    этот файл попал невошедший пользователь. Ему тут не место. Выдаем сообщение    об ошибке, останавливаем скрипт
              //$URL="http://game.dev";//redirect
             // header ("Location: $URL");
               }else {
         ?>Так не получиться... <a href="aut.php">Авторизуйтесь</a> или <a href="reg.php">Зарегистрируйтесь</a>
         }

         <!--Так не получиться... <a href="aut.php">Авторизуйтесь</a> или <a href="reg.php">Зарегистрируйтесь</a>--><? //
         // отправляем пользователя на главную страницу.


//============Записываем скорость роботы скрипта в БД для статистики!!!!!=========//

//$db = mysql_connect("localhost","root",""); //соединение с базой данных при помощи функции mysql_connect()
//mysql_select_db("neverworld",$db);// Выбираем БД для коннекта!
         $id = 2;//присваеваю значение айди статистики
         $start = microtime(true) - $start;//минусую время запуска скрипта от начала до теперь что б узнать время в мл.сек
         $start = round($start, 2);//Округляем число после запятой до двух цыфр
         $query = "UPDATE site_time SET time='$start'  WHERE id ='$id'";//Обновляю запись в БД
         $result = mysql_query($query) or die("Query failed");//Выполняем скрипт или выводим ошибку!
//============Записываем скорость роботы скрипта ве БД для статистики!!!!!=========//
     }
?>
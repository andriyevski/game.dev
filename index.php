<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 22.12.14
 * Time: 21:58
 */
session_id();//получает и/или устанавливает id текущей сессии.
session_start(); //запуск сессии
print_r($_SESSION[id]=session_id());//записываем сессию_id в переменную
//print_r($_SESSION[id]);
//echo $lol= date('d:m:Y:h:i:s');
//echo "</br>";
//$lol=md5(md5($lol)).mt_rand();
//$_SESSION[id]=$lol;
//print_r($_SESSION[id]);
//echo "</br>";
//print_r($lol= date('l jS \of F Y h:i:s A'));
//============Пищем модуль запуска и отключенияфункций на сайте===================//
require_once('core/db.php');

 //если значение в БД 1 тогда скрипт выполняеться и время будет писаться в БД
    //используетьсядля тестирования переодического
//============Записываем скорость роботы скрипта в БД для статистики!!!!!=========//
$start = microtime(true);//запуск функции отсчета времени с какого то там года...
$sum = 0;//Наша переменна я в милисекундах!
for ($i = 0; $i < 100000; $i++) $sum += $i;//запускаем цикл для определения скорости выполнения скрипта
//============Записываем скорость роботы скрипта в БД для статистики!!!!!=========//

?>
<!DOCTYPE html>
<head>
    <title>Game.dev</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="#">
    <link rel="stylesheet" type="text/css" href="#">



</head>
<body>

<div class="site">
    <div class="header">
        <div class="menu">
            <?php

            ?>
        </div>
        <div class="Header_bg">
            <div class="Header_bg_img">
                        <div class="Text_avtoris">
                            <h1>Авторизация</h1>
                            <?
                            echo $date=date("j-n-Y");//Беру время в данный момент времени
                            echo " </br>".$reg_time= date("H:i:s");//Беру дату в данный момент времени
                            ?>
                        </div>
                       <?php

                       if    (empty($_SESSION['login']) or empty($_SESSION['password']))
                       {
                        // Проверяем, пусты ли пересменные логина и id пользователя
                           if (empty($_SESSION['login']) or empty($_SESSION['id']))
                           {

?>
                       <form action="autoris/testreg.php" method="post"  accept-charset="accept-charset="UTF-8"">
<!--**** testreg.php - это адрес обработчика. То есть, после нажатия на кнопку "Войти", данные из полей отправятся на страничку testreg.php методом "post" ***** -->
  <p>
    <label>Ваш логин:<br></label>
      <!--Панель ввода логина пользователя данные передаються в переменной login -->
      <input  type="text" class="input" maxlength="20" name="login" value="   Логин" onfocus="value=''" onBlur="if (!this.value.length) this.value='   Логин'">

  </p>
<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
  <p>
    <label>Ваш пароль:<br></label>
      <!--Панель ввода пароля пользователя данные передаються в переменной password-->
      <input type="text" class="input" maxlength="20"  name="password" value="   Пароль" onfocus="value=''" onBlur="if (!this.value.length) this.value='   Пароль'">

  </p>


<?
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
// Если пусты, то мы не выводим ссылку
    echo "";
}
?>
                        <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
                        <p>
                            <input type="submit" name="submit" value="Войти">
                            <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** -->
                            <br>
                            <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** -->
                            <a href="autoris/reg.php">Зарегистрироваться</a>
                        </p></form>
                        <br>
                        <?php
                        // Проверяем, пусты ли пересменные логина и id пользователя
                        if (empty($_SESSION['login']) or empty($_SESSION['id']))
                        {
// Если пусты, то мы не выводим ссылку
                            echo "Вы вошли на сайт, как гость <br><a href='#'>Эта ссылка доступна только зарегистрированным пользователям</a>";
                        }
                        else
                        {
                            // Если не пусты, то мы выводим ссылку
                            echo "Вы вошли на сайт, как ".$_SESSION['login']."<br> <a href='exit.php'>Выход</a>";
                        }
                             }
                           else
                           {

                               //============Записываем последнее время захода в игру!!!!!=========//
                               // Если не пусты, то мы выводим ссылку
                               echo "Добро пожаловать: ".$_SESSION['login']."</br><a href='game.php'>Вход в игру!</a><br> <a href='autoris/exit.php'>Выход</a>";
                               // подключаемся к базе

                               //$db = mysql_connect("localhost","root",""); //соединение с базой данных при помощи функции mysql_connect()
                               //mysql_select_db("neverworld",$db);// Выбираем БД для коннекта!
                               $date=date("j-n-Y");//Беру время в данный момент времени
                               $time= date("H:i:s");//Беру дату в данный момент времени
                               $ip=$_SERVER['REMOTE_ADDR'];//Беру глобальный айпи пользователя
// если такого нет, то сохраняем данные
                               $id=$_SESSION['id'];//беру глобалку ИД
                               $query = "UPDATE Players SET last_date = '$date',last_ip='$ip',last_time='$time'  WHERE id ='$id'";//Обновляю запись в БД
                               $result = mysql_query($query) or die("Query failed");//Выполняем скрипт или выводим ошибку!
                                //============Записываем последнее время захода в игру!!!!!=========//`
                           }
                       }else{
                           require_once('autoris/aut.php');//Подключаю модуль авторизации при проверке
                       }
                       ?>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?
//============Записываем скорость роботы скрипта в БД для статистики!!!!!=========//

//$db = mysql_connect("localhost","root",""); //соединение с базой данных при помощи функции mysql_connect()
//mysql_select_db("old-apeha.ru",$db);// Выбираем БД для коннекта!
$id=1;//присваеваю значение айди статистики
$start=microtime(true) - $start;//минусую время запуска скрипта от начала до теперь что б узнать время в мл.сек
$start=round($start,2);//Округляем число после запятой до двух цыфр
$query = "UPDATE site_time SET time='$start'  WHERE id ='$id'";//Обновляю запись в БД
$result = mysql_query($query) or die("Query failed");//Выполняем скрипт или выводим ошибку!
//============Записываем скорость роботы скрипта ве БД для статистики!!!!!=========//

?>
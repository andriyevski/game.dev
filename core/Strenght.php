<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 05.05.15
 * Time: 23:04
 */
session_start();
if (isset($_SESSION['login'])){
    $login = ($_GET['login'] ? $_GET['login'] : $_SESSION['login']);

    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $my_database = "old-apeha.ru";

    $link = mysql_connect($mysql_host, $mysql_user, $mysql_password)
    or die("Could not connect : " . mysql_error());
    mysql_select_db($my_database) or die("Could not select database");

    $query = "SELECT * FROM Players WHERE login='$login'";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    $aRow = mysql_fetch_array( $result);
    //$aStrength = $aRow["Strength"];
    $aNotUsedStats = $aRow["NotUsedStats"];
    mysql_free_result($result);

    //проверка на возможность выполнения!
    if ($aNotUsedStats>0){
    //Выполнение запроса обновления статов
    $UP_Strength=mysql_query("UPDATE Players SET Strength=Strength + '1'  WHERE login = '$login'")or die("Invalid query: " . mysql_error());//Обновляю запись в БД

    $UP_NotUsedStats=mysql_query("UPDATE Players SET NotUsedStats=NotUsedStats - '1' WHERE login = '$login'")or die("Invalid query: " . mysql_error());//Обновляю запись в БД

    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    }
    //$aRow = mysql_fetch_array( $result);
    //echo $aNotUsedStats = $aRow[NotUsedStats];
    //echo
    //$query = "SELECT * FROM Players WHERE login='$login'";
    //echo "</br>".$aStrength = $aRow[Strength];
    // так получаем URL, с которого пришёл посетитель
    $back = $_SERVER['HTTP_REFERER']; // для справки, не обязательно создавать переменную

// Теперь создаём страницу, пересылающую
// в meta теге на предыдущую
    echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
  </head>
</html>";
    //$URL="http://old-apeha.ru";//redirect
    //header ("Location: $URL");
    //header("Refresh: 1; URL=$URL");

}else {
    Echo "Ошибка скрипта: Strength.php / Выход за пределы возможного !";
}
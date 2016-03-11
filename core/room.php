<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 17.03.15
 * Time: 22:22
 */
session_start();
session_id();
require_once ('db.php');
if (isset($_SESSION['login'])){

    $login = $_SESSION['login'];


    $db = mysql_connect("localhost","root","")//соединение с базой данных при помощи функции mysql_connect()
// Выбираем БД для коннекта!
    or die("Could not connect : " . mysql_error());
    mysql_select_db("game",$db) or die("Could not select database");


    $db = "SELECT b.BuildingName, u.Building FROM Players u inner join Buildings b on b.id = u.Building WHERE login='$login'";
    $result = mysql_query($db) or die("Query failed : " . mysql_error());
    $aRow = mysql_fetch_array( $result);
    $aRoom = $aRow["BuildingName"];
    $aBuldingID = $aRow["Building"];
    $db = "SELECT count(id) as CountPlayers from Players where Building = '$aBuldingID' and SessionID > '0'";
    $result = mysql_query($db) or die("Query failed : " . mysql_error());
    $aRow = mysql_fetch_array( $result);
    $aCountPlayers = $aRow["CountPlayers"];


// пишем название комнаты и сколько там народу
    print('<b><center>'.$aRoom.'</b>&nbsp('.$aCountPlayers.') чел.</center><hr>');
    $db = "SELECT login,Level from Players where Building = '$aBuldingID'and SessionID > '0'";
    $result = mysql_query($db) or die("Query failed : " . mysql_error());
    while ($aRow = mysql_fetch_array($result)) {
        $aUser = $aRow["login"];
        $aLevel = $aRow["Level"];
        print($aUser.'['.$aLevel.'] <img src="../img/inf.jpg"><br>');
    }

}else
echo "<center></br>Error chat!</br><hr>We wait for you Neo ;)</br>Your ip:".$ip=$_SERVER['REMOTE_ADDR']."</br><hr>Run Neo,RUN !!!</center>";

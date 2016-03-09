<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 17.03.15
 * Time: 22:22
 */
session_start();
if (isset($_SESSION['login'])){

    $login = $_SESSION['login'];
    $aWhatStat = "";
    $aWhatSkill = "";

    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $my_database = "old-apeha.ru";

    $link = mysql_connect($mysql_host, $mysql_user, $mysql_password)
    or die("Could not connect : " . mysql_error());
    mysql_select_db($my_database) or die("Could not select database");

    $query = "SELECT b.BuildingName, u.Building FROM Players u inner join Buildings b on b.id = u.Building WHERE login='$login'";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    $aRow = mysql_fetch_array( $result);
    $aRoom = $aRow["BuildingName"];
    $aBuldingID = $aRow["Building"];
    $query = "SELECT count(id) as CountPlayers from Players where Building = '$aBuldingID'";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    $aRow = mysql_fetch_array( $result);
    $aCountPlayers = $aRow["CountPlayers"];


// пишем название комнаты и сколько там народу
    print('<b><center>'.$aRoom.'</b>&nbsp('.$aCountPlayers.') чел.</center><hr>');
    $query = "SELECT login,Level from Players where Building = '$aBuldingID'";
    $result = mysql_query($query) or die("Query failed : " . mysql_error());
    while ($aRow = mysql_fetch_array($result)) {
        $aUser = $aRow["login"];
        $aLevel = $aRow["Level"];
        print($aUser.'['.$aLevel.'] <img src="../img/inf.jpg"><br>');
    }

}else
echo "<center></br>Error chat!</br><hr>We wait for you Neo ;)</br>Your ip:".$ip=$_SERVER['REMOTE_ADDR']."</br><hr>Run Neo,RUN !!!</center>";

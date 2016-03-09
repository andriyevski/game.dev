<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 29.03.15
 * Time: 11:18
 */
session_start();

if (isset($_SESSION['login'])){
    $login= ($_GET['login'] ? $_GET['login'] : $_SESSION['login']);

      // подключаемся к базе
      $db = mysql_connect("localhost","root",""); //соединение с базой данных при помощи функции mysql_connect()
      mysql_select_db("old-apeha.ru",$db)  or die("Could not select database");// Выбираем БД для коннекта!

$query = "SELECT * FROM Players WHERE login='$login'";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$aRow = mysql_fetch_array( $result);

$aStrength = $aRow["Character_Strength"];
$aEndurance = $aRow["Character_Endurance"];
$aAccuracy = $aRow["Character_Accuracy"];
$aDexterity = $aRow["Character_Dexterity"];
$aNotUsedStats = $aRow["Character_UnUsed_Points"];
$aSwordSkill = $aRow["Character_Sword"];
$aSpearSkill = $aRow["Character_Spear"];
$aMaceSkill = $aRow["Character_Mace"];
$aAxeSkill = $aRow["Character_Axe"];
$aDaggerSkill = $aRow["Character_Dagger"];

// Меняем статы
if (isset($_GET['setstat']))
{
    if ($aNotUsedStats > 0){
        $aWhatStat =  $_GET['setstat'];
        switch ($aWhatStat){
            case "Strength":
            {  $aStrength++; $aNotUsedStats--;
                $query = "UPDATE Players SET Character_Strength=$aStrength,Character_UnUsed_Points=$aNotUsedStats WHERE login='$login'";
                break;
            }
 case "Endurance":
            {  $aEndurance++; $aNotUsedStats--;
                $query = "UPDATE Players SET Character_Endurance=$aEndurance,Character_UnUsed_Points=$aNotUsedStats WHERE login='$login'";
                break;
            }
            case "Accuracy":
            {  $aAccuracy++; $aNotUsedStats--;
                $query = "UPDATE Players SET Character_Accuracy=$aAccuracy,Character_UnUsed_Points=$aNotUsedStats WHERE login='$login'";
                break;
            }
            case "Dexterity":
            {  $aDexterity++; $aNotUsedStats--;
                $query = "UPDATE Players SET Character_Dexterity=$aDexterity,Character_UnUsed_Points=$aNotUsedStats WHERE login='$login'";
                break;
            }
        }
        $result = mysql_query($query) or die("Query failed : " . mysql_error());

    }
}
  }

echo $aWhatStat;

?>
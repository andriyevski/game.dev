<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 17.03.15
 * Time: 22:23
 */
session_start();
session_id();


if (isset($_SESSION['login'])){
    $login = ($_GET['login'] ? $_GET['login'] : $_SESSION['login']);
   // print( '<frame name="main" src="char.php?Login='.$login.'">' );

$aWhatStat = "";
$aWhatSkill = "";
// Узнаем характеристики персонажа

    $db = mysql_connect("localhost","root","")//соединение с базой данных при помощи функции mysql_connect()
// Выбираем БД для коннекта!
    or die("Could not connect : " . mysql_error());
    mysql_select_db("game",$db) or die("Could not select database");

$query = "SELECT * FROM Players WHERE login='$login'";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$aRow = mysql_fetch_array( $result);
$aStrength = $aRow["Strength"];
$aEndurance = $aRow["Endurance"];
$aAccuracy = $aRow["Accuracy"];
$aDexterity = $aRow["Dexterity"];
$aNotUsedStats = $aRow["NotUsedStats"];
$aSwordSkill = $aRow["Sword"];
$aSpearSkill = $aRow["Spear"];
$aMaceSkill = $aRow["Mace"];
$aAxeSkill = $aRow["Axe"];
$aDaggerSkill = $aRow["Dagger"];
$aCharLevel = $aRow["Level"];
$aMoney = $aRow["Money"];
mysql_free_result($result);


?>
<html>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" type="text/css" href="../css/game.css">
</html>
<!----Меню игровое---->
<div class="main">
<div class="menu">
    <ul>
        <li><a href="#">Профиль</a> </li>
        <li><a href="../index.php">Новости</a> </li>
        <li><a href="#">Законы</a> </li>
        <li><a href="#">Библиотека</a> </li>
        <li><a href="#">Форум</a> </li>
        <li><a id="exit" href="../autoris/exit.php"></a></li>

        <li><a id="digital_watch" style="color: #333366; font-size: 120%; font-weight: bold;">
                <script type="text/javascript">
                    function digitalWatch() {
                        var date = new Date();
                        var hours = date.getHours();
                        var minutes = date.getMinutes();
                        var seconds = date.getSeconds();
                        if (hours < 10) hours = "0" + hours;
                        if (minutes < 10) minutes = "0" + minutes;
                        if (seconds < 10) seconds = "0" + seconds;
                        document.getElementById("digital_watch").innerHTML = hours + ":" + minutes + ":" + seconds;
                        setTimeout("digitalWatch()", 1000);
                    }
                    digitalWatch();
                </script></a></li>
        <li><a id="Diller" href="#">Диллеры</a> </li>
    </ul>

    
</div>


<!--- Конец игрового меню--->

<?//print('Вы зашли как: '.$login);?>

<div class="char_table">
    <div class="char_menu"><ul>
        <li><a href="#"><img src="../img/main/menu_eye.png"></a> </li>
        <li><a href="#"><img src="../img/main/menu_eng.png"></a> </li>
        <li><a href="#"><img src="../img/main/menu_info.png"></a> </li>
    </ul>
    </div>
    <div class="VAL_rank">
        <ul>
            <li><b style="color: #800; font-size: 26px">3.7</b></li>
            <li><b style="color: navy;   margin-left: 6px;">0/0</b></li>
        </ul>

    </div>
    <div class="char_invent">
        <a class="abbill_invent" href="#"><img src=../img/main/char_abill.png></a>
        <div class="char_invent_on">

        </div>
    </div>
    <div class="char_class">
        <a href="#"<b style="font: bold; color: grey;">Gn</b></a>
        <b style=font: bold; color: navy;"><?print("$login");?></b>
        <a href="#" style="margin-left: 2px;"><img src="../img/main/info.gif"></a>
    </div>
    <div class="char_inf_on">
        <div class="mana_kapla"></div>
    <div class="mana">
    </div>
    <div class="avatar">

    </div>
        <div class="healt_div">
        <div class="halth_kapla">

        </div>
    <div class="health">

    </div>
        </div>
        </div>



</div>

<div class="char_characteristics">
    <HR>
<font color="#FF0000"></font></b> <font color="#000080">Характеристики:<br></font><HR>
    <?
    if ($aNotUsedStats != 0){
        echo "Свободные статы: $aNotUsedStats <hr>";

    }
?>

    Сила:  <? echo "$aStrength &nbsp";
    if ($aNotUsedStats > 0){
        echo '<a href="Strenght.php"><img src="../img/main/char_plus.png" border=0></a>';
    }
    ?><br>
    Ловкость: <?php echo "$aDexterity &nbsp";
    if ($aNotUsedStats > 0){echo '<a href="Dexterity.php"><img src="../img/main/char_plus.png" border=0></a>';}
    ?><br>
    Точность: <?php echo "$aAccuracy &nbsp";
    if ($aNotUsedStats > 0){echo '<a href="Accuracy.php"><img src="../img/main/char_plus.png" border=0></a>';}
    ?><br>
    Выносливость: <?php echo "$aEndurance &nbsp";
    if ($aNotUsedStats > 0){echo '<a href="Endurance"><img src="../img/main/char_plus.png" border=0></a>';
    }
    ?><br>
<HR>
Опыт: 0 <br>
Уровень: 0<br>
Побед: 0 <br>
Поражений: 0<br>
Ничьих: 0<br>
Деньги: </font><b><font color="#FF0000"><?php echo "$aMoney"; ?> </font></b> <font color="#000080">золота<br></font>
    <HR>

</td>
</div>
<?
}else{
    echo "<center></br>Error SESSION!</br><hr>We wait for you Neo ;)</br>Your ip:".$ip=$_SERVER['REMOTE_ADDR']."</br><hr>Run Neo,RUN !!!</center>";
}

?>
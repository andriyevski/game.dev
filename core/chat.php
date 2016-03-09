<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 28.03.15
 * Time: 19:05
 */

session_start();
if (isset($_SESSION['login'])){
$login = ($_GET['login'] ? $_GET['login'] : $_SESSION['login']);
?>
<html>
<body bgcolor="#fafad2"">
<div id="mes">



</div>

</body>
</html>
<?
}else{
echo "<center></br>Error chat!</br><hr>We wait for you Neo ;)</br>Your ip:".$ip=$_SERVER['REMOTE_ADDR']."</br><hr>Run Neo,RUN !!!</center>";
}

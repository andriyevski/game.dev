<?php
/**
 * Created by PhpStorm.
 * User: Andriyevski
 * Date: 25.03.15
 * Time: 22:49
 */
session_start();
if (isset($_SESSION['login'])){
$login = $_SESSION['login'];

?>
    <link rel="stylesheet" type="text/css" href="../css/game.css">
<!--suppress HtmlUnknownTarget -->
    <form action=" id="F1">
<div class="chat">
    <img src="../img/main/Chat_gramophone.png" style="float: left">
    <input id="T2" type="text" name="text" height="30" style="width: 900px; margin: 7px 0 0 0; padding: 0 0 0 0; float: left;">
    <img src="../img/main/chat_ok.png" id="T3" width="21" height="21" alt="Добавить текст в чат" onclick="AddToChat()" style="cursor: hand;
    float: left;margin:6px 0 0 5px;" >
    <img src="../img/main/chat_smile.png"  width="21" height="21" alt="Смайлы" style="cursor: hand;
    float: left;margin:6px 0 0 5px;">
    <img src="../img/main/chat_clear.png" width="21" height="21" alt="Очистить строку ввода/чат" style="cursor: hand;
    float: left;margin:6px 0 0 5px;">
    <img src="../img/main/chat_mute.png" width="21" height="21" alt="Смена приватности" style="cursor: hand;
    float: left; margin: 6px 0 0 5px;">
    <img src="../img/main/chat_bsclanold.png" width="21" height="21" alt="Смена приватности" style="cursor: hand;
    float: left; margin: 6px 0 0 5px;">
    <img src="../img/main/chat_meonlyold.png" width="21" height="21" alt="Смена приватности" style="cursor: hand;
    float: left; margin: 6px 0 0 5px;">
    <img src="../img/main/chat_out.png" width="21" height="21" alt="Смена приватности" style="cursor: hand;
    float: left; margin: 6px 0 0 5px;" onclick="if (confirm('Выйти из игры?')) top.window.navigate('/main.phtml?exit=0.781520416407446')">
</div>




</form>
<?
}else{
    echo "<a href='#'>Выход</a>";
}
?>

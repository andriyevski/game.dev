<?php
// вся процедура работает на сесиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
session_start();
?>
<html>
<head></head>
<form action="testreg.php" method="post"  accept-charset="accept-charset="UTF-8"">
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
<a href="reg.php">Зарегистрироваться</a> 
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
?>
</body>
</html>

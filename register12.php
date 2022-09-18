<?
// Страница регистрации нового пользователя

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "root", "testtable");

if(isset($_POST['submit']))
{



    $login = $_POST['login'];
	$inn = $_POST['inn'];
	$number = $_POST['number'];
    $password = md5(md5(trim($_POST['password'])));

	mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_password='".$password."'user_inn='".$inn."',user_login='".$number."' ");
    header("Location: login.php"); exit();
}
?>

<form method="POST">
Логин <input name="login" type="text" required><br>
ИНН <input name="inn" type="text" required><br>
номер телефона <input name="number" type="text" required><br>
Пароль <input name="password" type="password" required><br>
<input name="submit" type="submit" value="Зарегистрироваться">
</form>
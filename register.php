<?
// Страница регистрации нового пользователя

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "root", "testtable");

if (isset($_POST['submit'])) {

    $login = $_POST['login'];
	$inn = $_POST['inn'];
	$number = $_POST['number'];
    $ogrn = $_POST['ogrn'];
    $password = md5(md5(trim($_POST['password'])));

    #print_r("login: $login <br>");
    #print_r("inn: $inn <br>");
    #print_r("number: $number <br>");
    #print_r("password: $password <br>");

    $result = mysqli_query($link, "INSERT INTO `users`(`user_login`,`user_password`,`user_inn`,`user_number`,`user_ogrn`) VALUES('{$login}','{$password}','{$inn}','{$number}','{$ogrn}')");

    #print_r($result);

    #if (!$result) {
        #print_r("<br> Произошла ошибка:<br>\n");
        #exit();
    #}

    header("Location: login.php"); exit();
}
?>

<form method="POST">
Логин <input name="login" type="text" required><br>
ИНН <input name="inn" type="text" required><br>
ОГРН<input name='ogrn' type="text" requred><br>
номер телефона <input name="number" type="text" required><br>
Пароль <input name="password" type="password" required><br>
<input name="submit" type="submit" value="Зарегистрироваться">
</form>
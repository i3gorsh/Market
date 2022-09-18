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

    header("Location: auth.php"); exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" href="post.css">
</head>
<body>
<form method="POST">
	<div class="form">
		<h2>Поставщик</h2>
		<div class="input-form">
			<input name='login' type="text" placeholder="ФИО(Логин)" required>
		</div>
        <div class="input-form">
			<input name='inn' type="text" placeholder="ИНН" required>
		</div>
		<div class="input-form">
			<input name='ogrn' type="text" placeholder="ОГРН" required>
		</div>        
        <div class="input-form">
			<input name='number' type="text" placeholder="Номер телефона" required>
		</div>
		<div class="input-form">
			<input name='password' type="password" placeholder="Пароль" required>
		</div>
			<div class="input-form">
				<input name = 'submit' type="submit" value="зарегистрироваться">
			</div>
		
	</div>
	</form>
</body>
</html>
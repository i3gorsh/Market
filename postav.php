<?php
// Страница поставщика

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "root", "testtable");

if (isset($_POST['submit'])) {
	if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){

	//берём базу
    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

}

	$prod = $_POST['prod'];
	$kol_vo = $_POST['kol_vo'];
	$price = $_POST['price'];

	//То, что мы взяли из бд
	$user_login = $userdata['user_login'];
	$user_inn = $userdata['user_inn'];
	$user_number = $userdata['user_number'];
	


    #print_r("login: $user_login <br>");
    #print_r("inn: $user_inn <br>");
    #print_r("number: $user_number <br>");
    #print_r("password: $password <br>");

	//отправка информации
    $result = mysqli_query($link, "INSERT INTO `postav`(`user_login`,`user_inn`,`user_number`,`prod`,`kol_vo`,`price`) VALUES('{$user_login}','{$user_inn}','{$user_number}','{$prod}','{$kol_vo}','{$price}')");

    #print_r($result);

    #if (!$result) {
        #print_r("<br> Произошла ошибка:<br>\n");
        #exit();
    #}
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
			<input name='prod' type="text" placeholder="Продукция/услуга" required>
		</div>
        <div class="input-form">
			<input name='kol_vo' type="text" placeholder="Кол-во" required>
		</div>
		<div class="input-form">
			<input name='price' type="text" placeholder="Цена" required>
		</div>        
			<div class="input-form">
				<input name = 'submit' type="submit" value="запрос">
			</div>
		
	</div>
	</form>
</body>
</html>
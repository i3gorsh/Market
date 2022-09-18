<?
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
$link=mysqli_connect("localhost", "root", "root", "testtable");

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        // Записываем в БД новый хеш авторизации и IP
        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'"); 

        // Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
        setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true); 

        // Переадресовываем браузер на страницу проверки нашего скрипта
        
        
        $_POST['post'];
        

        if ($_POST['post']=='postav') {
        
            header("Location: zaku.php"); exit();

        }

        else if ($_POST['post']=='zakup') {
            header("Location: posta.php"); exit();
        } 

        

    }

    
    
    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Вход</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	<div class="form">
		<h2>Авторизация</h2>
		<form method="post" action="">
		<div class="input-form">
			<input name='login' type="text" placeholder="ФИО(Логин)" required>
		</div>
		<div class="input-form">
			<input name='password' type="password" placeholder="Пароль" required>
		</div>
        <div class="radio">
    <label class="custom-radio">
      <input type="radio" name="post" value="postav" required>
      <span>Поставщик</span>
    </label>
  </div>

  <div class="radio">
    <label class="custom-radio">
      <input type="radio" name="post" value="zakup" required>
      <span>Закупщик</span>
    </label>
  </div>
		<div class="input-form">
			<input name='submit' type="submit" value="Войти">
		</div>
	</form>
		<a href="registr.php" >Регистрация</a>
		<a href="Zadanie_1/about.php">О нас</a>
	</div>
	</div>
		
</body>
</html> 
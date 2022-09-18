<html>
    <head>
        <title>РосЗакупки</title>
        <link rel="stylesheet" href="style123.css"/>
    </head>
    <body>
		
        <header class="sticky" id="top">
           
            <h1>РосЗакупки</h1>

        </header>

        <main>

        </main>
        <footer>

        </footer>
    </body>
</html>









<?php

$db = mysqli_connect("localhost", "root", "root", "testtable");

function get_singles_all(){
    global $db;
    $singles = $db->query("SELECT * FROM postav");
    return $singles;
}


$singles = get_singles_all();

foreach($singles as $single): ?>
<div>
    <h2> Продукт/услуга: <?php echo $single["prod"] ?></h2>
    <p><?php echo $single["user_login"]?> создал запрос на <?php echo $single["prod"] ?> в количестве <?php echo $single["kol_vo"] ?> желаемая цена <?php echo $single["price"] ?>. Номер телефона <?php echo $single["user_number"] ?>. Юридическая информация     <?php echo $single["user_inn"] ?> </p>
</div>
<?php endforeach; ?>


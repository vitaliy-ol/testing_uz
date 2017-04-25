<?php
include_once("php/db_conn.php");
include_once("php/check_key.php");
include_once("php/access.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Відкриття доступу</title>
    <link rel="icon" type="image/png" href="images/logo_uz.png">
    <link rel="stylesheet" href="css/admin-test-keys.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <header class="header">
        <div class="center-block clearfix">
            <img src="images/logo-larg.png" alt="" class="logo">
            <h1 class="registration_h">Адмін <span>Панель</span></h1>
        </div>
    </header>

    <main class="main">

        <nav class="navigation">

            <ul>
                <li><a href="admin-panel.php">Створення тесту</a></li>
                <li><a href="admin-review.php">Перегляд тестів</a></li>
                <li><a href="admin-result.php">Перегляд  результатів</a></li>
                <li><a href="admin-test-keys.php" class="active">Відкриття доступу</a></li>
            </ul>
        </nav>
        <article class="content">
            <button type="button" class="generate-btn">Генерувати ключ</button>
            <span class="generate-keys"></span>
            <div class="description">
                <a class="description-btn">Довідка</a>
                <div class="information">
                    <p><span>1</span>Згенерований (далі просто "ключ") ключ потрібно надіслати особі яка проходитиме тест.</p>
                    <p><span>2</span> Ключ можна надситали тільки одній особі.</p>
                    <p><span>3</span>Вразі якщо ключ не буде використаний протягом доби він автоматично видалиться і операцію слід провести знову.</p>
                    <p><span>4</span>Після проходження тесту ключ видалиться тому повторне використання неможливе.</p>
                    <p><span>5</span>Одночасно можна надсилати будь-яку кількість ключів, але при умові що їх отримають різні особи.</p>
                </div>

            </div>
        </article>

    </main>

    <footer class="footer">
        <p class="inf">Розроблено в ознайомчих цілях</p>
    </footer>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$('.generate-btn').click(function(){
    $.ajax
        ({
            url: "../php/generateKey.php",
            type: "post",
            data: 
                { 
                    flag: "generate-key"
                },
            cache: false,
            success: function(msg){
                $('.generate-keys').text('').text(msg);
            }
        });
});
</script>
</body>

</html>
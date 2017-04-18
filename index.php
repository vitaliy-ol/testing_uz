<?php 
    include_once("php/signIn.php");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизація</title>
    <link rel="icon" type="image/png" href="images/logo_uz.png">

    <link rel="stylesheet" href="css/autorization.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main">

        <div class="logo">
            <img src="images/logo-larg.png" width="300px" alt="">
        </div>

        <div class="application">
            <h1>кваліфікація</h1>
        </div>

        <form class="form-autorization" action="" method="post">

            <label for="login-field">Логін</label><br>
            <input name="name" type="text" autocomplete="on" autofocus maxlength="30" required id="login-field"><br>
            <label for="password-field">Пароль</label><br>
            <input name="key" type="password" maxlength="30" required id="password-field"><br>
            <button name="signIn" type="submit" class="form-autorization__btn">
	  		Вхід 
	  		</button>

        </form>
    </div>

</body>

</html>
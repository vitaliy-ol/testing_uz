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
    
    <title>Додати тест</title>
    <link rel="icon" type="image/png" href="images/logo_uz.png">
    <link rel="stylesheet" href="css/admin-panel.css" type="text/css">
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
                <li><a href="admin-panel.php" class="active">Створення тесту</a></li>
                <li><a href="admin-review.php">Перегляд тестів</a></li>
                <li><a href="admin-result.php">Перегляд  результатів</a></li>
                <li><a href="admin-test-keys.php">Відкриття доступу</a></li>
            </ul>
        </nav>
        <article class="content">
            <form action="php/addTest.php" class="add-test" method="post">
                <label for="add-test__input">Запишіть сюди назву теста відповідну назві посади(абревіатуру):</label>
                <input type="text" id="add-test__input" name="title" required>
                <label for="add-test__time" >Запишіть сюди час для проходження тестів у хвилинах:</label>
                <input type="number" id="add-test__time" name="time" required>
                <button name="addTest" type="submit">Створити тест</button>
            </form>


            <form action="php/addTest.php" method="POST" class="add-question">
                <label for="position">Оберіть тест до якого хочете додати запитання:</label>
                <select type="text" id="position" name="test_id">
                        <option value="">Зробіть вибір</option>
                        <?php
                            $sql_test = "SELECT id, title FROM test_s";
                            $result_test = $db->query($sql_test);
                            while($data_test = $result_test->fetch(PDO::FETCH_ASSOC)){
                                echo '
                                    <option value="'.$data_test['id'].'">'.$data_test['title'].'</option>
                                ';
                            }
                        ?>
                    </select>

                <label for="add-question__input">Запишіть сюди запитання тесту</label>
                <textarea name="text" id="add-question__input" required rows="4"></textarea>
                <div class="variant-qustion">
                    <label for="variant-qustion__label">Запишіть сюди варіанти відповіді(зеленим кольором позначено поле для вводу правильного варіанту)</label>
                    <input type="text" name="true_answer" class="variant-qustion__true" id="variant-qustion__label" required>
                    <input type="text" name="text_a_2" required>
                    <input type="text" name="text_a_3" required>
                    <input type="text" name="text_a_4" required>
                </div>
                <label for="add_img">Додати зображення до запитання</label>
                <input type="file">
                <input name="img_url" value="" type="hidden">
                <button name="addAnswer" type="submit">Додати запитання</button>
                <button type="reset">Скинути форму</button>
            </form>
        </article>


    </main>

    <footer class="footer">
        <p class="inf">Розроблено в ознайомчих цілях</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/upload.js"></script>
</body>

</html>
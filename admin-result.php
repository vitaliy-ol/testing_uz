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

    <title>Перегляд результатів</title>
    <link rel="icon" type="image/png" href="images/logo_uz.png">
    <link rel="stylesheet" href="css/admin-result.css" type="text/css">
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
                <li><a href="admin-result.php" class="active">Перегляд  результатів</a></li>
                <li><a href="admin-test-keys.php">Відкриття доступу</a></li>
            </ul>
        </nav>
        <article class="content">
            <label for="search-fild">Пошук по імені працівника</label>
            <form action="">
                <input type="search" id="search-fild">
                <button type="button"> Пошук
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 16 16">
<path fill="#ffffff" d="M15.504 13.616l-3.79-3.223c-0.392-0.353-0.811-0.514-1.149-0.499 0.895-1.048 1.435-2.407 1.435-3.893 0-3.314-2.686-6-6-6s-6 2.686-6 6 2.686 6 6 6c1.486 0 2.845-0.54 3.893-1.435-0.016 0.338 0.146 0.757 0.499 1.149l3.223 3.79c0.552 0.613 1.453 0.665 2.003 0.115s0.498-1.452-0.115-2.003zM6 10c-2.209 0-4-1.791-4-4s1.791-4 4-4 4 1.791 4 4-1.791 4-4 4z"></path>
</svg>
           </button>
            </form>
            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>Ім'я</th>
                            <th>Дата народження</th>
                            <th>Залізниця</th>
                            <th>Дистанція</th>
                            <th>Виробничий підрозділ</th>
                            <th>Посада</th>
                            <th>Дата проходження</th>
                            <th>Результат тесту</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM user_test ORDER BY id DESC";
                            $result = $db->query($sql);
                            while($data = $result->fetch(PDO::FETCH_ASSOC)){
                                $test_id = $data['test_id'];
                                $sql_count = "SELECT COUNT(id) as count FROM quest_test WHERE test_id='$test_id'";
                                $result_count = $db->query($sql_count);
                                $data_count = $result_count->fetch(PDO::FETCH_ASSOC);
                                $resultTestProcent = $data['result_test']*100/$data_count['count'];
                                
                                echo '
                                <tr>
                                    <td>'.$data['full_name'].'</td>
                                    <td>'.$data['data_born'].'</td>
                                    <td>'.$data['railways'].'</td>
                                    <td>'.$data['distation'].'</td>
                                    <td>'.$data['distantion_full'].'</td>
                                    <td>'.$data['position'].'</td>
                                    <td>'.$data['date_fix'].'</td>
                                    <td>'.$resultTestProcent.'%</td>
                                </tr>
                                ';
                            }
                        ?>
                        <tr>
                    </tbody>
                </table>
            </div>
        </article>
    </main>

    <footer class="footer">
        <p class="inf">Розроблено в ознайомчих цілях</p>
    </footer>
</body>

</html>

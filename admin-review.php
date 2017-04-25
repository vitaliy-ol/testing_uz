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
    
    <title>Перегляд тестів</title>
    <link rel="icon" type="image/png" href="images/logo_uz.png">
    <link rel="stylesheet" href="css/admin-panel-review.css" type="text/css">
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
                <li><a href="admin-panel.php" >Створення тесту</a></li>
                <li><a href="admin-review.php" class="active">Перегляд тестів</a></li>
                <li><a href="admin-result.php">Перегляд  результатів</a></li>
                <li><a href="admin-test-keys.php">Відкриття доступу</a></li>
            </ul>
        </nav>
        <article class="content">
           
            <div class="select-test">
                <label for="position">Оберіть тест який хочете переглянути, або видалити:</label>
                <select type="text" id="position" name="position">
                        <option value="0">Зробіть вибір</option>
                        <?php
                            $sql_test = "SELECT id, title FROM test_s";
                            $result_test = $db->query($sql_test);
                            $btnStatus = 'none';
                            while($data_test = $result_test->fetch(PDO::FETCH_ASSOC)){
                                $select = '';
                                if($_GET['test_id'] == $data_test['id']){
                                    $select = 'selected';
                                    $btnStatus = 'inline-block';
                                }
                                echo '
                                    <option '.$select.' value="'.$data_test['id'].'">'.$data_test['title'].'</option>
                                ';
                            }
                        ?>
                    </select>
                <button style="display:<?php echo $btnStatus; ?>" data-flag="dt" data-id="<?php echo $_GET['test_id']; ?>" type="button" class="delete-test">Видалити тест</button>
            </div>
            
            <?php
                if(isset($_GET['test_id'])){
                    $test_id = $_GET['test_id'];
                    $sql_quest = "SELECT id, test_id, text, true_answer, img_url FROM quest_test WHERE test_id = '$test_id'";
                    $result_quest = $db->query($sql_quest);
                    while($data_quest = $result_quest->fetch(PDO::FETCH_ASSOC)){
                        $quest_id = $data_quest['id'];
                        echo '
                                <section class="question">
                                <h3>'.$data_quest['text'].'</h3>
                                <img src="'.$data_quest['img_url'].'" alt="">
                        ';
                        
                        $sql_answer = "SELECT id, quest_id, text FROM answer_test WHERE quest_id = '$quest_id'";
                        $result_answer = $db->query($sql_answer);
                        while($data_answer = $result_answer->fetch(PDO::FETCH_ASSOC)){
                            if($data_answer['id'] == $data_quest['true_answer']){
                                $trueClass = 'true-ansver';
                            }else{
                                $trueClass = '';
                            }
                            echo '
                                    <p class="'.$trueClass.'">'.$data_answer['text'].'</p>
                            ';
                        }
                        
                        echo '
                                <button data-flag=dq data-id='.$data_quest['id'].' type="button" class="delete-question">Видалити запитання</button>
                                </section>
                        ';
                    }
                }
            ?>            
        </article>
        
    </main>

    <footer class="footer">
        <p class="inf">Розроблено в ознайомчих цілях</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/review_test.js"></script>
</body>

</html>
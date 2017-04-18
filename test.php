<?php
include_once("php/db_conn.php");
include_once("php/getMeOneData.php");
include_once("php/check_key.php");
include_once("php/access.php");

//echo $_SESSION['name'];
//echo $_SESSION['position'];
//echo $_SESSION['id_user'];
if($_SESSION['name'] && $_SESSION['position'] && $_SESSION['id_user']) {
    include_once("php/delete-key.php");
}else {
    header("Location: reg.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Тест - <?php echo $_SESSION['position']; ?> </title>

    <link rel="icon" type="image/png" href="images/logo_uz.png">
    <link rel="stylesheet" href="css/tests.css" type="text/css">
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
            <h1 class="test_h">тест <span> Кваліфікація </span><span class="work"><?php echo $_SESSION['position']; ?></span></h1>
            <?php $test_time = getMeOneData('time', 'test_s', "title = '".$_SESSION['position']."'", $db); ?>
            <div data-time="<?php echo $test_time; ?>" class="timer">30:00</div>
            <button class="completion_test">Завершити тест
            </button>
        </div>
    </header>

    <main class="main">
        <div class="center-block">

            <!--........test........-->
            <div class="test">
    <div class="testing__name"><p class="test-start">Тест проходить <span class="name-worker"><?php echo $_SESSION['name']; ?></span></p></div>
                <div class="choice_tests">
                    <?php
                        $test_id = getMeOneData('id', 'test_s', "title = '".$_SESSION['position']."'", $db);
                        $sql_btn = "SELECT COUNT(id) as count_btn FROM quest_test WHERE test_id = '$test_id'";
                        $result_btn = $db->query($sql_btn);
                        $data_btn = $result_btn->fetch(PDO::FETCH_ASSOC);
                        for($i = 1; $i <= $data_btn['count_btn']; $i++) {
                            if($i == 1) {
                                echo '
                                    <label data-for="btn-'.$i.'" data-section="'.$i.'" class="active-btn">'.$i.'</label>
                                ';
                            }else {
                                echo '
                                    <label data-for="btn-'.$i.'" data-section="'.$i.'">'.$i.'</label>
                                ';
                            }
                        }
                    ?>

                </div>
                <div class="test-shoved">
                    <?php
                        $sql_quest = "SELECT id, text, img_url FROM quest_test WHERE test_id = '$test_id' ORDER BY RAND()";
                        $result_quest = $db->query($sql_quest);
                    
                        $general_col = 1;    
                    
                        while($data_quest = $result_quest->fetch(PDO::FETCH_ASSOC)) {
                            $quest_id = $data_quest['id'];
                            
                            echo '
                                <section class="question-'.$general_col.' question" data-label="btn-'.$general_col.'">
                                    <h3 class="question__title">питання №'.$general_col.'</h3>
                            ';
                            echo '
                                <h4 class="test__question">
                                    '.$data_quest['text'].'
                                </h4>
                                <img src="'.$data_quest['img_url'].'" alt="">
                            ';
                            
                            $sql_answer = "SELECT id, text FROM answer_test WHERE quest_id = '$quest_id'";
                            $result_answer = $db->query($sql_answer);
                            
                            while($data_answer = $result_answer->fetch(PDO::FETCH_ASSOC)) {
                                echo '
                                        <label class="ansver">
                                            '.$data_answer['text'].'
                                            <input type="radio" data-questId='.$quest_id.' value='.$data_answer['id'].'  name="variant-ansver-'.$general_col.'">
                                            <div class="ansver_checked"></div>
                                        </label>
                                ';
                            }
                            
                            echo '</section>';
                            $general_col++;
                        }
                    ?>
                </div>


            </div>

            <!--........test........-->
            
            <!--........result-test........-->
             <div class="result">
                <h2 class="result__title">Результати тесту</h2>
                <div class="result__test">
                    <h3 class="result__name">Шановний 
                    <span class="name-worker"><?php echo $_SESSION['name']; ?></span></h3>
                    <p class="result__discription-test">В тесті перевірки кваліфікаційних знань на посаду <span class="work"><?php echo $_SESSION['position']; ?></span> ви набрали 
                    <span data-col="<?php echo $data_btn['count_btn']; ?>" class="correct-ansver">24</span>/<span class="number-question"><?php echo $data_btn['count_btn']; ?></span>:</p>

                    <!--progress-test-->
                    <div class="progress-test">
                        <div class="clip1">
                            <div class="slice1"></div>
                        </div>
                        <div class="clip2">
                            <div class="slice2"></div>
                        </div>
                        <div class="status"></div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer class="footer">
        <p class="inf">Розроблено в ознайомчих цілях</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/listing-test.js"></script>
    <script src="js/resultTest.js"></script>
    <script src="js/circleRes.js"></script>
</body>

</html>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Реєстрація</title>
    <link rel="icon" type="image/png" href="images/logo_uz.png">
    <link rel="stylesheet" href="css/registration.css" type="text/css">
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
            <h1 class="registration_h">Реєстрація <span>користувача</span></h1>
        </div>
    </header>
    <main class="registration">

        <div class="center-block">

            <!--........Form........-->
            <form method="post" action="php/add-user.php" class="form">
                <fieldset class="general">
                    <legend class="general_legend">
                        Загальна інформація</legend>


                    <label for="#surname">
                        Прізвище 
                        <input type="text" class="surname" name="surname" autofocus required>
                    </label>


                    <label for="#name">
                        Ім'я
                        <input type="text" class="name" name="name" required>
                    </label>


                    <label for="#middle_name">
                        По-батькові
                        <input type="text" class="middle_name" name="middle_name" required>
                    </label>


                    <label for="#date">Дата народження

                    <input type="text" class="date" name="data_born" pattern="\d{1,2}\.\d{1,2}\.\d{1,4}" placeholder="дд.мм.гггг" required></label>


                </fieldset>

                <fieldset class="work-inf">
                    <legend class="work-inf__legend">Інформація про місце роботи</legend>
                    <label for="railways">Оберіть залізницю де ви працюєте
                    <select name="railways" id="railways" class="railways" required required>
                    <option value="">Зробіть вибір</option>
                    <option value="Львівська залізниця">Львівська залізниця </option>
                    <option value="Південно-Західна залізниця">Південно-Західна залізниця</option>
                    <option value="Південна залізниця">Південна залізниця</option>
                    <option value="Донецька залізниця">Донецька залізниця</option>
                    <option value="Придніпровська залізниця">Придніпровська залізниця</option>
                    <option value="Одеська залізниця">Одеська залізниця</option>
        </select>
                </label>
                    <label for="#distation">Дистанція
                    <select name="distation" id="distation" class="distation">
                    <option value="">Зробіть вибір</option>
                    <option value="ШЧ">ШЧ </option>
                    <option value="ПЧ">ПЧ</option>
           </select>
                    <input type="text" class="distantion-full" name="distantion_full" required placeholder="Повна назва виробничого підрозділу">
                    </label>
                    <label for="#position">Посада
                    <select name="position" id="position" class="position">
                    <option value="">Зробіть вибір</option>
                    <option value="Загальний тест">Загальний тест</option>
                    <option value="ШН">ШН </option>
                    <option value="Монтер колії">Монтер колії</option>
                   </select>
               </label>
                </fieldset>
                <!--Правила проходження тесту-->
                <div class="rules-test">
                    <h3 class="rules-test_title">Правила проходження тестів</h3>
                    <p class="rules-test_description">
                        <span>1.</span>При проходженні тесту забороняється залишати сторінку з тестом<b>(тест буде автоматично завершено)</b>.
                    </p>
                    <p class="rules-test_description">
                        <span>2.</span>Кожне запитання має тільки один правильний варіант відповіді.
                    </p>
                    <p class="rules-test_description">
                        <span>3.</span>До завершення тесту можна змінювати варіант відповіді.
                    </p>
                    <p class="rules-test_description">
                        <span>4.</span>Щоб достроково завершити тест потрібно натиснути кнопку "Завершити тест".
                    </p>
                    <p class="rules-test_description">
                        <span>5.</span>Після завершення тесту вам буде показано результат, також інформація про проходження тесту буде занесена в базу данних.
                    </p>
                </div>
                <!--Правила проходження тесту-->
                <input type="checkbox" class="coordination" id="coordination" required>
                <label for="coordination" class="checkbox">Погодження про обробку персональних данних, та ознайомлення з правилами проходження тесту</label>

                <button name="add" class="send" type="submit"> Реєстрація</button>

                <!--........Form........-->
            </form>
        </div>
    </main>
    
    <footer class="footer">
        <p class="inf">Розроблено в ознайомчих цілях</p>
    </footer>
</body>

</html>
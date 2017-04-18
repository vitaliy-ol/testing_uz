<?php
if($_POST['flag'] == 'getMeInfo') {
    session_start();
    $info = array('id_user' => $_SESSION['id_user'], 'title_test' => $_SESSION['position']);
    echo json_encode($info);
}
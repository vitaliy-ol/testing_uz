<?php
if(isset($_POST['add'])){
    include_once("db_conn.php");
    
    $fullName = $_POST['surname'].' '.$_POST['name'].' '.$_POST['middle_name'];
    
    $sql = "INSERT INTO user_test (full_name, data_born, railways, distation, distantion_full, position, result_test) VALUES (:full_name, :data_born, :railways, :distation, :distantion_full, :position, :result_test)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':full_name', $fullName);
    $stmt->bindValue(':data_born', $_POST['data_born']);
    $stmt->bindValue(':railways', $_POST['railways']);
    $stmt->bindValue(':distation', $_POST['distation']);
    $stmt->bindValue(':distantion_full', $_POST['distantion_full']);
    $stmt->bindValue(':position', $_POST['position']);
    $stmt->bindValue(':result_test', $_POST['result_test']);
    $stmt->execute();
    
    session_start();
    $_SESSION['name'] = $fullName;
    $_SESSION['position'] = $_POST['position'];
    $_SESSION['id_user'] = $db->lastInsertId(); 
    
    header("Location: ../test.php");
}
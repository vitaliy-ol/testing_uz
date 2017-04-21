<?php
include_once('db_conn.php');
include_once('insertData.php');

if(isset($_POST['addTest'])){
    $table = 'test_s';
    $dataArray = array($_POST['title'], $_POST['time']); /*Ручная вставка данных*/
    $dataArrayColumn = array('title', 'time'); /*Ручная вставка колонок*/
    insertData($dataArray, $table, $dataArrayColumn, $db);
    header('Location: ../admin-panel.php');
}elseif(isset($_POST['addAnswer'])){
    $table = 'quest_test';
    $dataArray = array($_POST['test_id'], $_POST['text'], $_POST['img_url']);
    $dataArrayColumn = array('test_id', 'text', 'img_url');
    insertData($dataArray, $table, $dataArrayColumn, $db);
    
    $idQuest = $db->lastInsertId();
    $idTrueAnswer = getTrueAnswer($idQuest, $_POST['true_answer'], $db);
    
    updateQuest($idQuest, $idTrueAnswer, $db);
    
    $table = 'answer_test';
    for($i = 2; $i <= 4; $i++){
        $postKey = 'text_a_'.$i;
        $dataArray = array($idQuest, $_POST[$postKey]);
        $dataArrayColumn = array('quest_id', 'text');
        insertData($dataArray, $table, $dataArrayColumn, $db);   
    }
    
    header('Location: ../admin-panel.php');
}

function getTrueAnswer($idQuest, $text, $db) {
    $sql = "INSERT INTO answer_test (quest_id, text) VALUES (:quest_id, :text)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':quest_id', $idQuest);
    $stmt->bindValue(':text', $text);
    $stmt->execute();
    return $db->lastInsertId();
}

function updateQuest($idQuest, $idTrueAnswer, $db) {
    $sql = "UPDATE quest_test SET true_answer = :true_answer WHERE id = '$idQuest'";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':true_answer', $idTrueAnswer);
    $stmt->execute();
}
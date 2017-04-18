<?php
if(isset($_POST['res'])) {
    include_once("db_conn.php");
    $data = json_decode($_POST['res']);
    
    $id_user = $data->id_user;
    $title_test = $data->title_test;
    $res = 0;
    
    foreach($data->res as $key) {
        $status = checkAnswer($key->id_quest, $key->id_answer, $db);

        if($status){
            $status = 't';
            $res++;
        }else{
            $status = 'f';
        }
        
        fixResult($id_user, $key->id_quest, $key->id_answer, $status, $db);
    }
    echo $resProcent = userResult($id_user, $title_test, $res, $db);
}

function checkAnswer($id_quest, $id_answer, $db) {
    $sql = "SELECT id FROM quest_test WHERE id = '$id_quest' AND true_answer = '$id_answer'";
    $result = $db->query($sql);
    if($data = $result->fetch(PDO::FETCH_ASSOC)){
        return true;
    }else {
        return false;
    }
}

function fixResult($id_user, $id_quest, $id_answer, $status, $db) {
    $sql_fix = "INSERT INTO result_test (id_cand, id_quest, id_answer, status) VALUES (:id_cand, :id_quest, :id_answer, :status)";
    $stmt = $db->prepare($sql_fix);
    $stmt->bindValue(':id_cand', $id_user);
    $stmt->bindValue(':id_quest', $id_quest);
    $stmt->bindValue(':id_answer', $id_answer);
    $stmt->bindValue(':status', $status);
    $stmt->execute();
}
function userResult($id_user, $title_test, $res, $db) {
    include_once("getMeOneData.php");
    
    $test_id = getMeOneData('id', 'test_s', "title = '".$title_test."'", $db);
    
    $sql_col = "SELECT COUNT(id) as count FROM quest_test WHERE test_id = '$test_id'";
    $result_col = $db->query($sql_col);
    $data_col = $result_col->fetch(PDO::FETCH_ASSOC);
    
    $sql = "UPDATE user_test SET test_id = :test_id, result_test = :result_test WHERE id = '$id_user'";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':test_id', $test_id);
    $stmt->bindValue(':result_test', $res);
    $stmt->execute();
    
    return $res;
}

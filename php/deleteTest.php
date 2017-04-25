<?php
include_once('db_conn.php');

if($_POST['flag'] == 'dt'){
    if(delete('test_s', "id='".$_POST['id']."'", $db)){
        delete('quest_test', "test_id='".$_POST['id']."'", $db);
        delete('answer_test', "test_id='".$_POST['id']."'", $db);
        echo 'complete';
    }else{
        echo 'erorr';
    }
}elseif($_POST['flag'] == 'dq'){
    if(delete('quest_test', "id='".$_POST['id']."'", $db)){
        delete('answer_test', "quest_id='".$_POST['id']."'", $db);
        echo 'complete';
    }else{
        echo 'erorr';
    }
}

function delete($table, $where, $db) {
    $sql = "DELETE FROM $table WHERE $where";
    $stmt = $db->prepare($sql);
    if($stmt->execute()){
        return true;
    }
}
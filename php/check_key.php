<?php
function check_key($key, $db) {
    $res = false;
    $sql = "SELECT id FROM test_keys WHERE test_key = '$key'";
    $result = $db->query($sql);
    $data = $result->fetch(PDO::FETCH_ASSOC);
    
    if($data) {
        $res = true;
    }
    return $res;
}
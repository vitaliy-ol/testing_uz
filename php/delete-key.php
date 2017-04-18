<?php
if($_SESSION['name'] && $_SESSION['position'] && $_SESSION['id_user']) {
    $key = $_SESSION['key'];
    $sql = "DELETE FROM test_keys WHERE test_key = '$key'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
<?php
function getMeOneData($select, $table, $where, $db) {
    $sql = "SELECT $select FROM $table WHERE $where";
    $result = $db->query($sql);
    $data = $result->fetch(PDO::FETCH_ASSOC);
    return $data[$select];
}
<?php
if($_POST['flag'] == 'generate-key'){
    include_once('db_conn.php');
    include_once('insertData.php');
    
    $key = md5(date('Y-m-d-h-m-s'));
    
    $table = 'test_keys';
    $dataArray = array($key);
    $dataArrayColumn = array('test_key');
    
    insertData($dataArray, $table, $dataArrayColumn, $db);
    
    echo $key;
}
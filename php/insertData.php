<?php
//include_once("db_conn.php");
//
//$table = 'test_table'; /*Название таблицы*/
//print_r($dataArrayColumn);
//if(count($_POST) > 0){
//    $i = 0;
//    $dataArrayColumn = array_keys($_POST); /*Названия колонок вписывать в ключ массива $_POST*/
//    foreach($_POST as $key){
//        $dataArray[$i] = $key; /*Ajax_data*/
//        $i++;
//    }
//}else{
//    $dataArray = array(); /*Ручная вставка данных*/
//    $dataArrayColumn = array(); /*Ручная вставка колонок*/
//}

//insertData($dataArray, $table, $dataArrayColumn, $db); /*Вызов функции*/

function insertData($dataArray, $table, $dataArrayColumn, $db) {
    $dataArrayColumnValues = array();
    for($i = 0; $i < count($dataArrayColumn); $i++){
        $dataArrayColumnValues[$i] = ':'.$dataArrayColumn[$i];
    }
    
    $dataStrColumn = implode(', ', $dataArrayColumn);
    $dataStrValues = implode(', ', $dataArrayColumnValues);
    
    $sql = "INSERT INTO $table ($dataStrColumn) VALUES ($dataStrValues)";
    $stmt = $db->prepare($sql);
    
    for($i = 0; $i < count($dataArray); $i++){
        $stmt->bindValue($dataArrayColumn[$i], $dataArray[$i]);
    }
    $stmt->execute();
}
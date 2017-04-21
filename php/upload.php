<?php
if(isset($_GET['namefile'])){
    $uploaddir = '../images/test-images/';
    $files = array();
    foreach( $_FILES as $file ){
        $parsName = explode('.', $file['name']);
        if( move_uploaded_file( $file['tmp_name'], $uploaddir.basename($_GET['namefile'].'.'.$parsName[1]))){
            echo json_encode($uploaddir.$_GET['namefile'].'.'.$parsName[1]);
        }
    }
}
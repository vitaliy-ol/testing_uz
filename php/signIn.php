<?
session_start();
if(isset($_POST['signIn'])) {
    include_once("db_conn.php");
    include_once("check_key.php");
    
    $_SESSION['login'] = $_POST['name'];
    
    if($_POST['name'] == 'admin') {
        $_SESSION['key'] = md5($_POST['key']);
        $status_key = check_key($_SESSION['key'], $db);  
        if($status_key) {
            header("Location: admin-panel.php");
        }
    }elseif($_POST['name'] == 'user') {
            $status_key = check_key($_POST['key'], $db);
             if($status_key) {
                $_SESSION['key'] = $_POST['key'];
                header("Location: reg.php");
            }
    }else {
        session_destroy();
    }
}elseif(isset($_SESSION['login']) && isset($_SESSION['key']) && $_SESSION['login'] == 'user') {
    header("Location: reg.php");
}elseif(isset($_SESSION['login']) && isset($_SESSION['key']) && $_SESSION['login'] == 'admin') {
    header("Location: admin-panel.php");
}
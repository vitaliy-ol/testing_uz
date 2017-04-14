<?
if(isset($_POST['signIn'])) {
    include_once("db_conn.php");
    include_once("check_key.php");
    
    session_start();
    
    if($_POST['name'] == 'admin') {
        $_SESSION['key'] = md5($_POST['key']);
        $status_key = check_key($_SESSION['key'], $db);  
        if($status_key) {
            header("Location: admin.php");
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
}
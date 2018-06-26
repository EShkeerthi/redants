<?php
    session_start();
    $old_pwd = $_POST['old_pwd'];
    $new_pwd = $_POST['new_pwd'];
    $retype_new_pwd = $_POST['retype_new_pwd'];
    include_once '../../db_operations.php';
    $dbobj = new DBConnect;
    $dbobj->connect();

    if($new_pwd!=$retype_new_pwd){
        echo '<script>alert("NEW AND RETYPED PASSWORDS NOT MATCHING.")</script>';
        die();
    }

    $result = $dbobj->search('red_ants_users',"user_id, password",'user_id','"'.$_SESSION["user_id"].'"');
    $row = $result->fetch_assoc();
    if($row){
        if($row['password'] != md5($old_pwd)){
            //ERROR HANDLING
            echo '<script>alert("OLD PASSWORD IS INCORRECT.");</script>';
            die();
        }
        $dbobj->update('red_ants_users','password','"'.md5($new_pwd).'"','user_id','"'.$_SESSION['user_id'].'"');   
    }
    die();
    
?>
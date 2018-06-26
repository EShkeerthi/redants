<?php
    session_start();
    session_unset();
    
    $user_id = "";

    $password = "";


    if(isset($_POST['user_id'])){
        $user_id = $_POST['user_id'];
    }
    if(isset($_POST['password'])){
        $password = $_POST['password'];
    }

    include_once 'db_operations.php';

    $dbobj = new DBConnect;

    $dbobj->connect();

    $result = $dbobj->search('red_ants_users',"user_id, password",'user_id','"'.$user_id.'"');

    while($row = $result->fetch_assoc()){
        if($row['password'] == md5($password)){
            $_SESSION['user_id'] = $user_id;
            $_SESSION['logged_in'] = True;
            // $_SESSION['content'] = 0;
            $result2 = $dbobj->search('red_ants_user_roles',"user_id, role_id",'user_id','"'.$user_id.'"');
            while($row2 = $result2->fetch_assoc()){
                $_SESSION['role'] = $row2['role_id'];
            }
            echo "<script>
        window.top.location ='../home.php';
    </script>";
            die();
        }
    }
    // $_SESSION['req_script']="<script>
    // $(document).ready(function(){
    //     setTimeout(function(){
    //         setTimeout(function(){
    //             document.getElementById('alert').style='opacity:0.5;font-style:bold'},200);
    //         },180);
    // });
    // </script>";
    
    echo "<script>
        window.top.location = '../';
    </script>";
    die();
?>
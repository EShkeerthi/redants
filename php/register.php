<?php
    session_start();
    
    $user_id = $_POST['htno'];
    $pwd=$_POST['pwd'];
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $branch=$_POST['branch'];
    $year=$_POST['year'];
    $email=$_POST['email'];
    $aggregate=$_POST['aggregate'];
    $about=$_POST['about'];
    
    include_once 'db_operations.php';

    $dbobj = new DBConnect;

    $dbobj->connect();

    $result = $dbobj->search('red_ants_user_information',"user_id",'user_id','"'.$user_id.'"');


    $row=$result->fetch_assoc();
    if($row){
        echo "<script>
       alert('User already Exists');
    </script>";
    echo "<script>
    window.top.location='index.php';
 </script>";
         die();
    }
    $dbobj->insert('red_ants_users','(user_id,password)','("'.$user_id.'","'.md5($pwd).'")');
    $values = '("'.$user_id.'","'.$name.'","'.$mobile.'","'.$branch.'","'.$year.'","'.$email.'")';
    $dbobj->insert('red_ants_user_information',' ',$values); 
    $dbobj->insert('red_ants_user_roles','(`user_id`, `role_id`)','("'.$user_id.'","2")');

    for($i=1;$i<=9;$i+=1){

        if($_POST['TE0'.$i]=='true'){
            $dbobj->insert('red_ants_user_hobbies','(`user_id`, `hobby_id`)','("'.$user_id.'","TE0'.$i.'")');
        }
    }
    for($i=1;$i<=4;$i+=1){

        if($_POST['AR0'.$i]=='true'){
            $dbobj->insert('red_ants_user_hobbies','(`user_id`, `hobby_id`)','("'.$user_id.'","AR0'.$i.'")');
        }
    }
    for($i=1;$i<=9;$i+=1){

        if($_POST['PA0'.$i]=='true'){
            $dbobj->insert('red_ants_user_hobbies','(`user_id`, `hobby_id`)','("'.$user_id.'","PA0'.$i.'")');
        }
    }
    for($i=1;$i<=2;$i+=1){

        if($_POST['SO0'.$i]=='true'){
            $dbobj->insert('red_ants_user_hobbies','(`user_id`, `hobby_id`)','("'.$user_id.'","SO0'.$i.'")');
        }
    }

    for($i=1;$i<=4;$i+=1){

        if($_POST['CU0'.$i]=='true'){
            $dbobj->insert('red_ants_user_hobbies','(`user_id`, `hobby_id`)','("'.$user_id.'","CU0'.$i.'")');
        }
    }
    echo "<script>
       alert('REGISTERED STUDENT.');
    </script>";

    echo "<script>
       window.top.location='index.php';
    </script>";
            die();

    ?>


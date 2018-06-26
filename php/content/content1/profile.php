<?php
  
  session_start();

  include_once '../../db_operations.php';
  $dbobj = new DBConnect;
  $dbobj->connect();

  $findByColumnName = "user_id";
  $fndByValue = '"'.$_SESSION['user_id'].'"';

  $result = $dbobj->search('red_ants_user_information','*',$findByColumnName,$fndByValue);
  $row = $result->fetch_assoc();

  if($row){
   echo "<script>
        document.getElementById('fname').innerHTML = '".$row['first_name']."';
        document.getElementById('lname').innerHTML = '".$row['last_name']."';
        document.getElementById('mobile').innerHTML = '".$row['mobile']."';
        document.getElementById('email').innerHTML = '".$row['mail_id']."';
        document.getElementById('branch').innerHTML = '".$row['branch']."';
   </script>" ;
  }

?>

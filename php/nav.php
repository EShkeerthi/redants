<?php
session_start();

include_once 'db_operations.php';

$dbobj = new DBConnect;

$dbobj->connect();

    
$query = "SELECT `role_id`, `service_id` FROM `red_ants_role_services` WHERE role_id=".$_SESSION['role']." ORDER BY service_id";

$result = $dbobj->sqlQury($query);

while($row = $result->fetch_assoc()){

    $result1 = $dbobj->search('red_ants_services',"service_id, service_name",'service_id','"'.$row['service_id'].'"');

    echo '<li><a href="home.php" class="line"> Home </a></li>
    <li><a href="about.html" class="line"> About Red Ants </a></li>
    <li><a href="Subscription.html" class="line"> Red Ants  - First 200 Registrations </a></li>
    <li><a href="feedback.html" class="line"> Feedback</a></li>';
    

    while($row1 = $result1->fetch_assoc()){

        echo "<li id='link".$row['service_id']."'>
        <a href='#".$row1['service_name']."' onclick='sidemenu(".$row['service_id'].");'</a>".$row1['service_name']."</li>";
    
        // if($row['service_id']==1)
        //     echo '<script>setTimeout(function(){
        //         document.getElementById("link1").setAttribute("class","active");
        //         $("#content").load("php/content/content1/content1.php");
        //     },100);</script>';
    }
}

?>
 
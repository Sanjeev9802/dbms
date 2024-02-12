<?php

session_start();

include 'dbh.php';

$jid = $_POST['jid'];
$name = $_POST['name'];
$courtid = $_POST['courtid'];
$dob = $_POST['dob'];
$juid = $_POST['juid'];
$jpwd = $_POST['jpwd'];
$jpwd = MD5($jpwd);

$sql = "insert into judge(jid, name, courtid, dob, juid, jpwd) values('$jid','$name','$courtid','$dob','$juid','$jpwd')";

mysqli_query($conn, $sql);

$sql1 = 'CALL get_judge()';

$records = mysqli_query($conn, $sql1);

?>

<html>

    <head>
    
        <title>New Judge Details - JDBMS</title>
        <style>
body {
  background-image: url('bg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
    </head>
    
    <body>
    
        <h1><u>New Judge Details: </u></h1>    
        
        <table width ="1000" border="1" cellpadding="18" cellspacing="3">
        
            <tr>
            
                <th>JUDGE ID</th>
                <th>JUDGE NAME</th>
                <th>COURT ID</th>
                <th>DATE OF BIRTH</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                
            </tr>
        
        <?php
            
            while ($case=mysqli_fetch_array($records)){
                echo "<tr>";
                
                echo "<td>".$case['jid']."</td>";
                
                echo "<td>".$case['name']."</td>";
                
                echo "<td>".$case['courtid']."</td>";
                
                echo "<td>".$case['dob']."</td>";
                
                echo "<td>".$case['juid']."</td>";
                
                echo "<td>".$case['jpwd']."</td>";
                
                echo "<tr>";
            }
        
            if(isset($_SESSION['id'])){
        echo "<b>Logged in Id : </b>".$_SESSION['id'];
                echo "<br><br><br>";
            }
        ?>
        </table>
    
    
    
    </body>
</html>
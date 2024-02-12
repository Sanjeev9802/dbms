<?php

session_start();

include 'dbh.php';
$lid = $_POST['lid'];

$sql = "delete from lawyer where lid = '$lid' ";

$result = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)==0){
    echo "Error in Deletion!!";
}
else
{
    echo "<b>Deleted Successfully.</b>";
}

if(isset($_SESSION['id'])){
        echo "<b>Logged in Id : </b>".$_SESSION['id'];
                echo "<br><br><br>";
            }
//header("Location: a.php");
?>
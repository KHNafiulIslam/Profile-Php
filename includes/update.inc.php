<?php
include_once 'dbh.inc.php';
session_start();
if(isset($_SESSION['uid']) && $_SESSION['uid']==true){
    
$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
    
    $sql = "UPDATE users SET first_name='$first',last_name='$last',email='$email',address='$address',city='$city' WHERE user_name='{$_SESSION['uid']}'";    
    try{
         $conn->query($sql);
        header("Location: ../profile.php?updated");
        }
        catch(PDOException $ex){
            
        }
    }
    else{
header("Location: ../index.php?notupdated");
    }
?>
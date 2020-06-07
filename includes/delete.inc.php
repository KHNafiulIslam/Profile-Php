<?php 
session_start(); 
include_once 'dbh.inc.php';


$sql = "DELETE FROM users WHERE user_name='{$_SESSION['uid']}'";

if ($conn->query($sql) == TRUE) {
  session_destroy();
  header("Location: ../index.php?deleted");
} 
else {
  header("Location: ../index.php?notdeleted");
}

?>
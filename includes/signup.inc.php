<?php

include_once 'dbh.inc.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['userid'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$address = $_POST['address'];
$city = $_POST['city'];

$sql = "INSERT INTO users (first_name,last_name,user_name,email,user_password,address,city) VALUES('$first','$last','$uid','$email','$pwd','$address','$city');";

mysqli_query($conn,$sql);

header("Location: ../index.php?signup=success");
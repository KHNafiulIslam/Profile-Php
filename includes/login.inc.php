<?php

if(isset($_POST['login-submit']))
   {
    require 'dbh.inc.php';
    
    $pwd = $_POST['pwd'];
    $uid = $_POST['uid'];
    
    if(empty($uid) || empty($pwd))
    {
        header("Location: ../index.php?error=emptyfeilds");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE user_name='$uid';";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            
           mysqli_stmt_bind_param($stmt,"ss",$uid);
           mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                if($pwd!=$row['user_password'])
                {
                    header("Location: ../index.php?errorwrongpwd");
                    exit();
                }
                else if($pwd==$row['user_password'])
                {
                    session_start();
                    $_SESSION['uid'] = $row['user_name'];
                    
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
            else{
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}
   else{
    header("Location: ../index.php");
       exit();
   }  
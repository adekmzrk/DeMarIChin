<?php  
session_start(); 
 
if (isset($_SESSION['user'])) { 
 
   include '../db/koneksi.php';
   include '../helper.php';  
 
   if (isset($_POST['op']) && isset($_POST['np']) 
      && isset($_POST['c_np'])) { 

      $op = validate($_POST['op']); 
      $np = validate($_POST['np']); 
      $c_np = validate($_POST['c_np']);
      $name = $_SESSION['user']["username"];
      var_dump($name); 
         
         if(empty($op)){ 
            header("Location: ../reset_password.php?error=Old Password is required"); 
            exit(); 
         } else if(empty($np)){ 
            header("Location: ../reset_password.php?error=New Password is required"); 
            exit(); 
         } else if($np !== $c_np){ 
            header("Location: ../reset_password.php?error=The confirmation password  does not match"); 
         exit(); 
         } else { 
         // hashing the password 
         //$op = md5($op); 
         //$np = md5($np); 
       
            $sql = "SELECT password 
                     FROM user WHERE  
                     username='$name' AND password='$op'"; 
            $result = mysqli_query($koneksi, $sql); 
            if(mysqli_num_rows($result) === 1){ 
               
               $sql_2 = "UPDATE user 
                        SET password='$np' 
                        WHERE username='$name'"; 
               mysqli_query($koneksi, $sql_2); 
               header("Location: ../reset_password.php?success=Your password has been changed successfully, enjoy your password!"); 
               exit(); 
      
            }else { 
               header("Location: ../reset_password.php?error=Incorrect password"); 
               exit(); 
            } 
      
         } 
   
   } else{ 
      header("Location: ../reset_password.php"); 
      exit(); 
   } 
 
} else{ 
   header("Location: ../index.php"); 
   exit(); 
}
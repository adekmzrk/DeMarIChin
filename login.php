<?php

include 'db/koneksi.php';
include 'helper.php';

if(isset($_POST['submit'])){

    // filter data yang diinputkan
    $username = validate($_POST["username"]);
    // enkripsi password
    $val_pass = validate($_POST["password"]);
    $password = $val_pass;

    $stmt = mysqli_query($koneksi, "SELECT * from user WHERE username = '$username'");
    $user = $stmt->fetch_assoc(); 

    if($user){
        // verifikasi password
        if($password == $user["password"]){
            // buat Session
            session_start();
            $user["time"] = date("d-m-Y h:i:s A");
            $_SESSION["user"] = $user;
            header("location:index.php");
        }
    } else {
        echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'login.php\';</script>';
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>DeMarIChin Login</title>
</head>
<body>
    <div class="login"> 
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 1.5rem; font-weight: 500; margin-bottom:0px;">Selamat datang di,</p>
            <p class="login-text" style="font-size: 2rem; font-weight: 800; margin-top:0px;">DeMarIChin</p>
            <div class="input-group">
                <input type='text' placeholder="Username" name='username' required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>


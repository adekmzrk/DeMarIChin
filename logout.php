<?php 
 
session_start();
unset($_SESSION["user"]);
 
echo '<script type="text/javascript">alert("Logout Berhasil");window.location=\'login.php\';</script>';
 
?>
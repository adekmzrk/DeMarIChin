<?php

    include '../db/koneksi.php';
    require_once("../validate.php");

    var_dump($_POST);
    $nip = $_POST['nip'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $cred = "dosen";

    
    $sql = "INSERT INTO user (username, password, cred) VALUES ('".$username."','".$password."','".$cred."')";
    mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

    $sql2 = "INSERT INTO data_dosen (nip, username, nama_dosen) VALUES ('".$nip."','".$username."','".$nama_lengkap."')";
    mysqli_query($koneksi,$sql2) or die (mysqli_error($koneksi));


    header("location:../user_dosen.php");

?>
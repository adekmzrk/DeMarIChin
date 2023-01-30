<?php

    include '../db/koneksi.php';
    require_once("../validate.php");

    var_dump($_POST);
    $npm = $_POST['npm'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $prodi = $_POST['prodi'];
    $bidang_minat = $_POST['bidang_minat'];
    $cred = "siswa";

    
    $sql = "INSERT INTO user (username, password, cred) VALUES ('".$username."','".$password."','".$cred."')";
    mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

    $sql2 = "INSERT INTO data_siswa (npm, username, nama_lengkap, prodi, bidang_minat) VALUES ('".$npm."','".$username."','".$nama_lengkap."','".$prodi."','".$bidang_minat."')";
    mysqli_query($koneksi,$sql2) or die (mysqli_error($koneksi));


    header("location:../user_siswa.php");

?>
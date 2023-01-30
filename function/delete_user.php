<?php

    include '../db/koneksi.php';
    require_once("../validate.php");

    var_dump($_POST);
    $id = $_POST['username'];
    $cred = $_POST["cred"];
    
    $sql = "DELETE FROM user WHERE username = '$id'";
    mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));

    if ($cred == "siswa"){
        $sql = "DELETE FROM data_siswa WHERE username = '$id'";
        mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
        header("location:../user_siswa.php?delete_success");
    } else{
        $sql = "DELETE FROM data_dosen WHERE username = '$id'";
        mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
        header("location:../user_dosen.php?delete_success");
    }

    

?>
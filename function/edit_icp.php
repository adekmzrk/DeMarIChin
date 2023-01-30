<?php

    include '../db/koneksi.php';
    require_once("../validate.php");

    var_dump($_POST);
    $id = $_POST['id'];
    $keputusan = $_POST['keputusan'];

    $sql = "UPDATE telaah_icp SET `hasil_prodi`='".$keputusan."' WHERE id ='".$id."'";
    mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
    header("location:../icp.php?edit_success");

?>
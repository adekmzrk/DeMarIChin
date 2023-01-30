<?php

    include '../db/koneksi.php';
    require_once("../validate.php");

    var_dump($_POST);
    $id = $_POST['id'];

    $sql = "DELETE FROM telaah_icp WHERE id = '".$id."'";
    mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
    header("location:../icp.php?delete_success");

?>
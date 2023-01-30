<?php

function rupiah($val) {
    return number_format($val, 0,',','.');
}

function validate($data){ 
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $data; 
}

function ubah($nilai){
    if($nilai == 1){
        return "Hidup";
    } else if($nilai == 0){
        return "Mati";
    } else if ($nilai== 2){
        return "Tidak Terpasang";
    }
}
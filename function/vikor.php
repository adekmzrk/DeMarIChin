<!DOCTYPE html>
<html>
<head>
  <title>Belajar Array 2 Dimensi PHP</title>
</head>
<body>

<?php
include '../db/koneksi.php';

    //INISIALISASI
    $sql = "SELECT * FROM `telaah_icp` WHERE prodi = 'rk'";
    $result = mysqli_query($koneksi,$sql);
    $y=0;
    $data_id = array();
    $data = array(array(1,2,3,4));
    while($row = mysqli_fetch_row($result)){
        $data_id[$y] = $row[0];
        $data[$y][0] = $row[5];

        if($row[6]=='sangat iya'){$data[$y][1]=4;} elseif($row[6]=='iya'){$data[$y][1]=3;} elseif($row[6]=='kurang'){$data[$y][1]=2;} elseif($row[6]=='tidak'){$data[$y][1]=1;}  
        if($row[7]=='iya'){$data[$y][2]=3;} elseif($row[7]=='tidak semua'){$data[$y][2]=2;} elseif($row[7]=='tidak'){$data[$y][2]=1;}
        if($row[8]=='diterima'){$data[$y][3]=3;} elseif($row[8]=='diterima dengan perbaikan'){$data[$y][3]=2;} elseif($row[8]=='ditolak'){$data[$y][3]=1;}
        $y++;
    }



    //NORMALISASI
    $nt_c1=1; $nr_c1=100; $nt_c2=1; $nr_c2=4; $nt_c3=1; $nr_c3=3; $nt_c4=1; $nr_c4=3;    
    for ($row = 0; $row < $y; $row++){
        if($data[$row][0] > $nt_c1 ){ $nt_c1=$data[$row][0]; }
        if($data[$row][0] < $nr_c1 ){ $nr_c1=$data[$row][0]; }
        
        if($data[$row][1] > $nt_c2 ){ $nt_c2=$data[$row][1]; }
        if($data[$row][1] < $nr_c2 ){ $nr_c2=$data[$row][1]; } 

        if($data[$row][2] > $nt_c3 ){ $nt_c3=$data[$row][2]; }
        if($data[$row][2] < $nr_c3 ){ $nr_c3=$data[$row][2]; }

        if($data[$row][3] > $nt_c4 ){ $nt_c4=$data[$row][3]; }
        if($data[$row][3] < $nr_c4 ){ $nr_c4=$data[$row][3]; } 
    }

    for ($row = 0; $row < $y; $row++){
        $data[$row][0] = ($nt_c1 - $data[$row][0])/($nt_c1-$nr_c1);
        $data[$row][1] = ($nt_c2 - $data[$row][1])/($nt_c2-$nr_c2);
        $data[$row][2] = ($nt_c3 - $data[$row][2])/($nt_c3-$nr_c3);
        $data[$row][3] = ($nt_c4 - $data[$row][3])/($nt_c4-$nr_c4);
    }
    
    
    //NILAI S
    $s = array();
    for ($row = 0; $row < $y; $row++){
        $data[$row][0] = $data[$row][0] * 0.4;
        $data[$row][1] = $data[$row][1] * 0.3;
        $data[$row][2] = $data[$row][2] * 0.2;
        $data[$row][3] = $data[$row][3] * 0.1;
    }

    for ($row = 0; $row < $y; $row++){
        $s[$row] = $data[$row][0] + $data[$row][1] + $data[$row][2] + $data[$row][3];
    }


    //NILAI R
    $r = array();
    for ($row = 0; $row < $y; $row++){
        if($data[$row][0] > $data[$row][1]){
            $r[$row] = $data[$row][0];
        } else{
            $r[$row] = $data[$row][1];
        }

        if($r[$row] > $data[$row][2]){
            $r[$row] = $r[$row];
        } else{
            $r[$row] = $data[$row][2];
        }

        if($r[$row] > $data[$row][3]){
            $r[$row] = $r[$row];
        } else{
            $r[$row] = $data[$row][3];
        }
        
    }

    
    //HITUNG S R TERBESAR
    $s_max=0; $s_min=1; $r_max=0; $r_min=1;
    foreach ($s as $nilArr) {
        if($nilArr > $s_max) {
            $s_max = $nilArr;
        }
        if($nilArr < $s_min) {
            $s_min = $nilArr;
        }
    }

    foreach ($r as $nilArr) {
        if($nilArr > $r_max) {
            $r_max = $nilArr;
        }
        if($nilArr < $r_min) {
            $r_min = $nilArr;
        }
    }

    echo $s_max. " ".$s_min. " ".$r_max. " ".$r_min. " ";


    //HITUNG NILAI VIQOR
    $V = 0.5;
    $q = array();

    for ($row = 0; $row < $y; $row++){
        $q[$row] = ((($s[$row]-$s_min)/($s_max-$s_min))*$V) + ((($r[$row]-$r_min)/($r_max-$r_min))*(1-$V));
    }


    $sql = "SELECT user.username FROM `telaah_icp` JOIN user on telaah_icp.id_siswa = user.id" ;
    $cek = array();                                
    $result = mysqli_query($koneksi,$sql);
    while($row = mysqli_fetch_row($result)){
        array_push($cek, $row[0]);
    }

    //UPDATE DATABASE
    for ($row = 0; $row < $y; $row++){
        $x = $q[$row];
        $r = $data_id[$row];

        $sql = "UPDATE `telaah_icp` SET indeks_vikor = '$x' WHERE ID = '$r'"; 
        mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
    }
	

?>    

</body>

<table>
    <?php
    for($i=0; $i<$y;$i++){ 
    echo "<tr>";
        echo "<td>".$data_id[$i]."</td>";
        echo "<td>".$cek[$i]."</td>";
        echo "<td>".$q[$i]."</td>";
    echo "</tr>";
    }
    ?>
</table>

</html>
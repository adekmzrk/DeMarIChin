<?php

include 'template.php'; 
include 'helper.php';

$x = $_SESSION['user']['username'];
$stmt = mysqli_query($koneksi, "SELECT nama_dosen from data_dosen WHERE username = '$x'");
$nama_dosen = $stmt->fetch_assoc(); 

?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Telaah ICP</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Daftar Telaah ICP Politeknik Siber dan Sandi Negara</li>
                        </ol>
                        
                        <?php
                                if ($_SESSION['user']['cred'] == 'dosen' ) { ?>
                        <button type="button" class="btn btn-info-thanks mb-4 text-white" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%); border: none; width: 250px; height: 50px" data-bs-toggle="modal" data-bs-target="#addICP">
                            Tambah Telaah Baru
                        </button>
                        <?php } ?>

                        <?php if(isset($_GET['edit_success'])){?>
                            <div class="alert alert-success">
                                <strong>Sukses! </strong>Telaah ICP berhasil diedit.
                                <a href="icp.php" class="close" data-dismiss="alert" aria-label="close">&times; </a>
                            </div>
                        <?php }?>


                        <?php if(isset($_GET['delete_success'])){?>
                            <div class="alert alert-success">
                                <strong>Sukses! </strong>Telaah ICP berhasil di hapus.
                                <a href="icp.php" class="close" data-dismiss="alert" aria-label="close">&times; </a>
                            </div>
                        <?php }?> 

                        <div class="card mb-4">
                            
                            <div class="card-body" style="color: #ffff;">
                                <table id="datatablesSimple" style="color: #ffff;">
                                    <thead>
                                        <tr>
                                            <th style="width: 30px; padding:0;">ID</th>
                                            <th style="width: 200px; padding:0;">Judul ICP</th>
                                            <th>Nama Siswa</th>
                                            <th>Nama Penelaah</th>
                                            <th>Prodi</th>
                                            <th>C1</th>
                                            <th>C2</th>
                                            <th>C3</th>
                                            <th>C4</th>
                                            <th>Indeks VIKOR</th>
                                            <th>Keputusan</th>
                                            <?php
                                            if ($_SESSION['user']['cred'] == 'dosen' || $_SESSION['user']['cred'] == 'prodi') { 
                                            echo"<th>Action</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `telaah_icp` " ;
                                    
                                    $result = mysqli_query($koneksi,$sql);
                                    while($row = mysqli_fetch_row($result)){
                                        echo "<tr>";
                                        echo "<td style='width: 30px; padding:0;'>".$row[0]."</td>";
                                        echo "<td style='width: 200px; padding:0;'>".substr($row[4],0, 25)."...</td>";

                                        $xx = mysqli_query($koneksi, "SELECT data_siswa.nama_lengkap FROM `telaah_icp` join `user` on user.ID = telaah_icp.id_siswa join `data_siswa` on data_siswa.username = user.username where telaah_icp.id_siswa = '$row[1]'");
                                        $hasil = $xx->fetch_assoc();
                                        echo "<td>".$hasil['nama_lengkap']."</td>";

                                        $xxx = mysqli_query($koneksi, "SELECT data_dosen.nama_dosen FROM `telaah_icp` join `user` on user.ID = telaah_icp.id_dosen join `data_dosen` on data_dosen.username = user.username where telaah_icp.id_dosen = '$row[2]'");
                                        $hasil2 = $xxx->fetch_assoc();
                                        echo "<td>".$hasil2['nama_dosen']."</td>";

                                        echo "<td>". strtoupper($row[3])."</td>";
                                        echo "<td>". $row[5]."% </td>";
                                                                      

                                        if($row[6]=="sangat iya"){
                                            echo "<td>";
                                            echo "<input type='submit' class='btn' style='background-color: green; color:white !important' value='".strtoupper($row[6])."'></input>";
                                            echo "</td>";
                                        } else if ($row[6]=="iya"){
                                            echo "<td>";
                                            echo "<input type='submit' class='btn' style='background-color: blue; color:white !important' value='".strtoupper($row[6])."'></input>";
                                            echo "</td>";
                                        } else if ($row[6]=="kurang"){
                                            echo "<td>";
                                            echo "<input type='submit' class='btn btn-warning'  value='".strtoupper($row[6])."'></input>";
                                            echo "</td>";
                                        } else {
                                            echo "<td>";
                                            echo "<input type='submit' class='btn btn-danger' value='".strtoupper($row[6])."'></input>";
                                            echo "</td>";
                                        }

                                        if($row[7]=="iya"){
                                            echo "<td>";
                                            echo "<input type='submit' class='btn' style='background-color: blue; color:white !important' value='".strtoupper($row[7])."'></input>";
                                            echo "</td>";
                                        } else if ($row[7]=="tidak"){
                                            echo "<td>";
                                            echo "<input type='submit' class='btn btn-danger' value='".strtoupper($row[7])."'></input>";
                                            echo "</td>";
                                        } else {
                                            echo "<td>";
                                            echo "<input type='submit' class='btn' style='background-color: orangered; color:white !important' value='".strtoupper($row[7])."'></input>";
                                            echo "</td>";
                                        } 

                                        if($row[8]=="diterima"){
                                            echo "<td>";
                                            echo "<input type='submit' class='btn' style='background-color: blue; color:white !important' value='".strtoupper($row[8])."'></input>";
                                            echo "</td>";
                                        } else if ($row[8]=="ditolak"){
                                            echo "<td>";
                                            echo "<input type='submit' class='btn btn-danger' value='".strtoupper($row[8])."'></input>";
                                            echo "</td>";
                                        } else {
                                            echo "<td>";
                                            echo "<input type='submit' class='btn btn-warning' value='PERBAIKAN'></input>";
                                            echo "</td>";
                                        }

                                        echo "<td style='width: 200px; padding:0;'>".$row[9]."</td>";

                                        if($row[10]=="diterima"){
                                            echo "<td>";
                                            echo "<input type='submit' class='btn' style='background-color: black; color:white !important' value='".strtoupper($row[10])."'></input>";
                                            echo "</td>";
                                        } else if ($row[10]=="ditolak"){
                                            echo "<td>";
                                            echo "<input type='submit' class='btn btn-danger' value='".strtoupper($row[10])."'></input>";
                                            echo "</td>";
                                        } else {
                                            echo "<td>";
                                            echo "<input type='submit' class='btn' style='background-color: white !important' value='".strtoupper($row[10])."'></input>";
                                            echo "</td>";
                                        }
                                        
                                        if ($_SESSION['user']['cred'] == 'dosen' || $_SESSION['user']['cred'] == 'prodi') {    
                                            echo "<td>";
                                            if ( $_SESSION['user']['cred'] == 'prodi') {                                      
                                                echo "<form method='post' action='function/edit_icp.php'>";
                                                echo "<input type='hidden' value ='".$row[0]."' name = 'id'>";
                                                echo "<select name='keputusan' id='' class='form-control-sm' style='border-width:0' required>";
                                                echo "<option value='menunggu review'>Menunggu Review</option>";
                                                echo "<option value='diterima'>Diterima</option>";
                                                echo "<option value='ditolak'>Ditolak</option>";
                                                echo "</select>"; 
                                                echo "<input type='submit' class='btn btn-warning' style='margin-left:2px' value='Proses'></input>";
                                                echo "</form>";                                               
                                            }
                                            echo "<form method='post' action='function/delete_icp.php'>";
                                            echo "<input type='hidden' value ='".$row[0]."' name = 'id'>";
                                            echo "<input type='submit' style='margin-top:5px' class='btn btn-danger' value='Delete'></input>";
                                            echo "</form>";
                                            echo "</td>";
                                        }
                                        
                                        echo "</tr>";
                                    
                                    }
                                    ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <?php include 'footer.php'; ?>


<!-- addStakeholder Modal -->
<div class="modal fade" id="addICP">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add ICP </h4>
        </div>

        <form method="post" action = "function/add_icp.php" enctype="multipart/form-data">
            <!-- Modal body -->
            <div class="modal-body" data-closable>

            <h6>Judul Tugas Akhir</h6>
            <input type="text" name="judul" class="form-control mt-3" style="margin-bottom: 10px;" placeholder="Judul Tugas Akhir" required>

            <h6>Nama Siswa</h6>
            <select name="nama_siswa" placeholder="Pilih siswa" class="form-control" style="margin-bottom: 10px;" required>
            <?php 
                $daftar_siswa = mysqli_query($koneksi,"SELECT nama_lengkap from data_siswa");
                while($row = mysqli_fetch_row($daftar_siswa)){
                    echo "<option value='$row[0]'>". ucfirst($row[0])." </option>";      
            } ?>
            </select>

            <h6>Nama Dosen Penelaah</h6>
            <input type="text" name="nama_dosen" class="form-control mt-3" style="margin-bottom: 10px;" value="<?php  echo $nama_dosen['nama_dosen']; ?>" readonly>
        
            <h6>-------------------------------------------------</h6>
            <h6>Kesesuaian topik dengan kompetensi prodi (C1)</h6>
            <input type="number" name="c1" class="form-control mt-3" style="margin-bottom: 10px;" placeholder="Nilai dalam persen" required>

            <h6>Penelitian terukur (C2)</h6>
            <select name="c2" id="" class="form-control" style="margin-bottom: 10px;" required>
                <option value="sangat iya">Sangat Iya</option>
                <option value="iya">Iya</option>
                <option value="kurang">Kurang</option>
                <option value="tidak">Tidak</option>
            </select>

            <h6>Referensi mengacu 5 penelitian terakhir (C3)</h6>
            <select name="c3" id="" class="form-control" style="margin-bottom: 10px;" required>
                <option value="iya">Iya</option>
                <option value="tidak">Tidak</option>
                <option value="tidak semua">Tidak Semua</option>
            </select>

            <h6>Rekomendasi Penelaah (C4)</h6>
            <select name="c4" id="" class="form-control" style="margin-bottom: 10px;" required>
                <option value="diterima">Diterima</option>
                <option value="diterima dengan perbaikan">Diiterima Dengan Perbaikan</option>
                <option value="ditolak">Ditolak</option>
            </select>            

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="add_stake" value = "Add"></input>
            <button type="button" class="btn btn-danger" data-bs-target="#addICP" data-bs-toggle="collapse" href="icp.php" data-close>Cancel</button>
            </div>
       </form>
        
      </div>
    </div>
  </div>               



  <!-- editStakeholder Modal -->
<?php 

//$stmt = mysqli_query($koneksi, "SELECT * FROM `stakeholder` WHERE id='". $id_stake."'");
//$stake = $stmt->fetch_assoc(); 
?>

<div class="modal fade" id="editStakeholder">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Stakeholder </h4>
        </div>

        <form method="post" action = "function/editstakeholder.php" enctype="multipart/form-data">
            <!-- Modal body -->
            <div class="modal-body" data-closable>
            <input type="hidden" name="id_st" value=" <?= $id_stake;?> ">    
            <input type="text" name="nama" class="form-control" value="<?= $stake["stakeholder"];?>" required>
            <input type="text" name="ip" class="form-control mt-3" value="<?= $stake["ip"];?>" required>
            <input type="number" name="port" class="form-control mt-3" value="<?= $stake["port"];?>" required>
            <input type="text" name="username" class="form-control mt-3" value="<?= $stake["user"];?>" required>
            <input type="password" name="password" class="form-control mt-3" style="margin-bottom: 10px;" value="<?= $stake["pass"];?>" required>
            <h6>Glastopf</h6>
            <select name="glastopf" placeholder="Glastopf" class="form-control" style="margin-bottom: 10px;" required>
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
            <h6>Cowrie</h6>
            <select name="cowrie" id="" class="form-control" style="margin-bottom: 10px;" required>
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
            <h6>Dionaea</h6>
            <select name="dionaea" id="" class="form-control" style="margin-bottom: 10px;" required>
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
            <h6>Conpot</h6>
            <select name="conpot" id="" class="form-control" style="margin-bottom: 10px;" required>
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
            <h6>Status</h6>
            <select name="status" id="" class="form-control" required>
                <option value="aktif">Aktif</option>
                <option value="mati">Mati</option>
                <option value="mati">Ditinjau</option>
            </select>
        
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="edit_stake" value = "Edit"></input>
            <button type="button" class="btn btn-danger" data-bs-target="#editStakeholder" data-bs-toggle="collapse" href="stakeholder.php" data-close>Cancel</button>
            </div>
       </form>
        
      </div>
    </div>
  </div>               
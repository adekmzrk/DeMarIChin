<?php 
include 'template.php'; 
include 'helper.php';


?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Home</h1>
                        <div class="row">
                            <div class="col-xl-4 col-md">
                                <div class="card text-white mb-4" style="background: linear-gradient(90deg, #FC466B 0%, #3F5EFB 100%); border: none;">
                                    <div class="card-body"><h2>Jumlah ICP Prodi RKS</h2>
                                    <?php
                                    $jumlah_rks = mysqli_query($koneksi, "SELECT count(*) from telaah_icp where prodi = 'rks'");
                                    $jumlahnya = mysqli_fetch_array($jumlah_rks);
                                    echo "<h3>".$jumlahnya[0]." </h3>" ;

                                    $jumlah_siswa_rks = mysqli_query($koneksi, "SELECT count(*) from data_siswa where prodi = 'rks'");
                                    $jumlahnya = mysqli_fetch_array($jumlah_siswa_rks);
                                    echo "<p> dari ".$jumlahnya[0]." siswa <p>" ;

                                    ?>
                                    
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="icp.php">Detail</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md">
                                <div class="card bg-success text-white mb-4" style="background: linear-gradient(90deg, #FDBB2D 0%, #22C1C3 100%); border: none;">
                                    <div class="card-body"><h2>Jumlah ICP Prodi RK</h2>
                                    <?php
                                    $jumlah_rk = mysqli_query($koneksi, "SELECT count(*) from telaah_icp where prodi = 'rk'");
                                    $jumlahnya = mysqli_fetch_array($jumlah_rk);
                                    echo "<h3>".$jumlahnya[0]." </h3>" ;

                                    $jumlah_siswa_rk = mysqli_query($koneksi, "SELECT count(*) from data_siswa where prodi = 'rk'");
                                    $jumlahnya = mysqli_fetch_array($jumlah_siswa_rk);
                                    echo "<p> dari ".$jumlahnya[0]." siswa <p>" ;
     
                                    ?>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="icp.php">Detail</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md">
                                <div class="card bg-danger text-white mb-4" style="background: linear-gradient(90deg, #0700b8 0%, #00ff88 100%); border: none;">
                                    <div class="card-body"><h2>Jumlah ICP Prodi RPK</h2>
                                    <?php
                                    $jumlah_rpk = mysqli_query($koneksi, "SELECT count(*) from telaah_icp where prodi = 'rpk'");
                                    $jumlahnya = mysqli_fetch_array($jumlah_rpk);
                                    echo "<h3>".$jumlahnya[0]." </h3>" ;

                                    $jumlah_siswa_rpk = mysqli_query($koneksi, "SELECT count(*) from data_siswa where prodi = 'rpk'");
                                    $jumlahnya = mysqli_fetch_array($jumlah_siswa_rpk);
                                    echo "<p> dari ".$jumlahnya[0]." siswa <p>" ;
     
                                    ?>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="icp.php">Detail</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="mt-4">Ringkasan ICP</h2>
                        <div class="row" style="margin-top:20px">
                            <div class="col-xl-4 col-md">
                                <div class="card text-white mb-4" style="background-color: black !important;">
                                    <div class="card-body"><h2>Diterima</h2>
                                    <?php
                                    $jumlah_diterima = mysqli_query($koneksi, "SELECT count(*) from telaah_icp where hasil_prodi = 'diterima'");
                                    $jumlahnya = mysqli_fetch_array($jumlah_diterima);
                                    echo "<h3>".$jumlahnya[0]."</h3>";
                                
                                    ?>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Cek</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md">
                                <div class="card text-white mb-4" style="background-color: red !important;">
                                    <div class="card-body" ><h2>Ditolak</h2>
                                    <?php
                                    $jumlah_ditolak = mysqli_query($koneksi, "SELECT count(*) from telaah_icp where hasil_prodi = 'ditolak'");
                                    $jumlahnya = mysqli_fetch_array($jumlah_ditolak);
                                    echo "<h3>".$jumlahnya[0]."</h3>";
                                
                                    ?>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Cek</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md">
                                <div class="card text-black mb-4" style="background-color: white !important; ">
                                    <div class="card-body" ><h2>Menunggu Review</h2>
                                    <?php
                                    $jumlah_review = mysqli_query($koneksi, "SELECT count(*) from telaah_icp where hasil_prodi = 'menunggu review'");
                                    $jumlahnya = mysqli_fetch_array($jumlah_review);
                                    echo "<h3>".$jumlahnya[0]."</h3>";
                                
                                    ?>
                                </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-black stretched-link" href="#">Cek</a>
                                        <div class="small text-black"></div>
                                    </div>
                                </div>
                            </div>

                            
                            
                        </div>

 
                    </div>
                </main>

                <?php include 'footer.php'; ?>

            <!-- addStakeholder Modal -->
<div class="modal fade" id="showDionaea">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Sensor Dionaea Mati </h4>
        </div>
            
        <div>
            <br>
            <?php
                for($y=0; $y<count($sensor_dionaea); $y++){
                    if($sensor_dionaea[$y] == 0){
                        echo "<h6>".$dionaea[$y]."</h6>";
                    }
                }
            ?>
        </div>

            
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-target="#showDionaea" data-bs-toggle="collapse" href="stakeholder.php" data-close>Close</button>
        </div>
        
      </div>
    </div>
</div>               
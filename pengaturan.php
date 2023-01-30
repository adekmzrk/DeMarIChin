<?php
    include 'template.php';

    if ($_SESSION['user']['role'] != 'admin') {
        echo '<script type="text/javascript">alert("Anda tidak memiliki akses ke halaman ini");window.location=\'index.php\';</script>';
    };

    if(isset($_POST['update'])){
        $nama_cabang = $_POST["namatoko"];
        $alamat_cabang = $_POST["alamat"];
        $nomor_telepon = $_POST["kontak"];
        $email_cabang = $_POST["email"];
    
        $update = mysqli_query($koneksi, "UPDATE setting SET nama_cabang = '$nama_cabang', alamat_cabang = '$alamat_cabang', nomor_telepon = '$nomor_telepon', email_cabang = '$email_cabang' ");
        header("location:pengaturan.php?success");
    }

?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Setting Cabang</h1>
                        <br>
                        <?php if(isset($_GET['success'])){?>
                        <div class="alert alert-success">
                            <strong>Sukses! </strong>Data cabang diperbarui.
                            <a href="pengaturan.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        <?php }?>
                        <table class="table table-stripped" style="border-color: transparent !important;">
                            <thead>
                                <tr>
                                    <td>Nama Cabang</td>
                                    <td>Alamat Cabang</td>
                                    <td>Kontak (Hp)</td>
                                    <td>Alamat Email</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $data_cabang = mysqli_query($koneksi, "SELECT * from setting");
                                    $toko = $data_cabang->fetch_assoc();
                                ?>
                                <form method="post" action="#">      
                                <tr>
                                    <td><input class="form-control" name="namatoko" value="<?php echo $toko['nama_cabang'];?>" placeholder="Nama Cabang"></td>
                                    <td><input class="form-control" name="alamat" value="<?php echo $toko['alamat_cabang'];?>" placeholder="Alamat Cabang"></td>
                                    <td><input class="form-control" name="kontak" value="<?php echo $toko['nomor_telepon'];?>" placeholder="Kontak (Hp)"></td>
                                    <td><input class="form-control" name="email" value="<?php echo $toko['email_cabang'];?>" placeholder="Alamat Email"></td>
                                    <td><button id="tombol-simpan" name="update" class="btn btn-primary">Update</button></td>
                                </tr>
                                </form>
                            </tbody>
                        </table>
                        <div class="clearfix" style="padding-top:10%;"></div>
                  </div>               
                </main>

<?php include 'footer.php'; ?>
              

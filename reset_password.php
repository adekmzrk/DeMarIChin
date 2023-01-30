
<?php 
include 'template.php'; 
include 'helper.php';
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ganti Password</h1>
                        <br>
                        <?php if(isset($_GET['error'])){?>
                        <div class="alert alert-success">
                            <strong>Error! </strong><?php echo $_GET['error']; ?>.
                            <a href="reset_password.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        <?php }?>
                        <?php if(isset($_GET['success'])){?>
                        <div class="alert alert-success">
                            <strong>Sukses! </strong><?php echo $_GET['success']; ?>.
                            <a href="reset_password.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                        <?php }?>

                        <table class="table table-stripped" style="border-color: transparent !important;">
                            <thead>
                                <tr>
                                    <td>Old Password</td>
                                    <td>New Password</td>
                                    <td>Confirm New Password</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="post" action="function/change_password.php">      
                                <tr>
                                    <td><input type="password" class="form-control" name="op" placeholder="Old Password"></td>
                                    <td><input type="password" class="form-control" name="np" placeholder="New Password"></td>
                                    <td><input type="password" class="form-control" name="c_np" placeholder="Confirm New Password"></td>
                                    <td><button id="tombol-simpan" name="submit" type="submit" class="btn btn-primary">Change</button></td>
                                </tr>
                                </form>
                            </tbody>
                        </table>
                        <div class="clearfix" style="padding-top:10%;"></div>
                  </div>               
                </main>

                <?php include 'footer.php'; ?>
<?php
    include 'template.php';
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome <?php  echo ($_SESSION['user']['username']); ?> </li>
                        </ol>
                        
                        <div class="row">
                            <div class="">
                                <div class="card text-white mb-4" style="background: linear-gradient(150deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 25%, rgba(0,212,255,1) 100%); border: none;">
                                    <div class="card-body"><h2>Nama</h2>
                                    <?php
                                        echo "<p>".ucfirst($_SESSION["user"]["username"])."</p>";
                                    ?>
                                </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="card text-white mb-4" style="background: linear-gradient(150deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 25%, rgba(0,212,255,1) 100%); border: none;">
                                    <div class="card-body"><h2>Password</h2>
                                    <p><i>secured</i></p>
                                </div>
                                
                                </div>
                            </div>
                            <div class="">
                                <div class="card text-white mb-4" style="background: linear-gradient(150deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 25%, rgba(0,212,255,1) 100%); border: none;">
                                    <div class="card-body"><h2>Jabatan</h2>
                                    <?php
                                    echo "<p>".ucfirst($_SESSION["user"]["cred"])."</p>";
                                    

                                    ?>
                                </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="card text-white mb-4" style="background: linear-gradient(150deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 25%, rgba(0,212,255,1) 100%); border: none;">
                                    <div class="card-body"><h2>Waktu login</h2>
                                    <?php
                                    echo "<p>".ucfirst($_SESSION["user"]["time"])."</p>";
                                    

                                    ?>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </main>

<?php include 'footer.php'; ?>

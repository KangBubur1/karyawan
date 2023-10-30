<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- MATERIAL -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

     <!-- Font Family -->
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
   

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Healthy Food!</title>
  </head>
  <body>

    <section class="container-fluid ">
        <div class="row" style="height: 100vh;" >

        <!-- SIDEBAR START -->
        <?php
            require('Require/SideBar.php');
        ?>
        <!-- SIDEBAR END -->

        <!-- MAIN & HEADER START -->
            <div class="col-md-9 col-xl-10 ">
                
                <!-- HEADER START -->
                <?php
                require('Require/Header.php');
                ?>
                <!-- HEADER END -->

                <!-- MAIN START -->
                <main class="row custom-main  main overflow-y-auto" >

                    <div class="col-12   mt-4 d-flex justify-content-between">
                        <div class="p-3">
                            <h4>DASHBOARD</h4>
                        </div>
                        <div class="p-3">
                            <button>ICON KALENDER</button>
                        </div>
                    </div>

                    <div class="col-12  mb-5">
                        <div class="container custom-container-home-main ">

                            <!-- CARD START -->
                            <div class="row row-cols-1 row-cols-xl-3 justify-content-between  ps-5 pe-5 ps-xl-0 pe-xl-0">
                                <div class="col col-xl-3 mb-4 cust-card d-flex flex-column justify-content-between pt-2 pb-3 ps-3 overflow-y-auto">
                                    <div class="d-flex justify-content-between">
                                        <h2>Jumlah Karyawan</h2>
                                        <span class="material-symbols-outlined">
                                            group
                                        </span>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-12">
                                            [Date picker]
                                        </div>
                                        <div class="col-12">
                                            Jumlah
                                        </div>
                                        <div class="col-12">
                                            Karyawan Tetap
                                        </div>
                                        <div class="col-12">
                                            Karyawan Tidak Tetap
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-xl-3 mb-4 cust-card d-flex flex-column justify-content-between pt-2 pb-3 ps-3 overflow-y-auto">
                                    <div class="d-flex justify-content-between">
                                    <h2>Jumlah Karyawan</h2>
                                        <span class="material-symbols-outlined">
                                            bolt
                                        </span>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-12">
                                            [Date picker]
                                        </div>
                                        <div class="col-12">
                                            Jumlah
                                        </div>
                                        <div class="col-12">
                                            Karyawan Tetap
                                        </div>
                                        <div class="col-12">
                                            Karyawan Tidak Tetap
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-xl-3 mb-4 cust-card d-flex flex-column justify-content-between pt-2 pb-3 ps-3 overflow-y-auto">
                                    <div class="d-flex justify-content-between">
                                        <h2>Jumlah Karyawan</h2>
                                        <span class="material-symbols-outlined">
                                            bolt
                                        </span>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-12">
                                            [Date picker]
                                        </div>
                                        <div class="col-12">
                                            Jumlah
                                        </div>
                                        <div class="col-12">
                                            Karyawan Tetap
                                        </div>
                                        <div class="col-12">
                                            Karyawan Tidak Tetap
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- CARD END -->

                        </div> 
                    </div>

                    
                    <div class="col-12  mt-3">
                        <div class="container custom-container-home-main ">
                            <!-- TABLE START -->
                             <div class="row">
                                <div class="col ">
                                    <h2>Performance Karyawan Tetap C & D</h2>
                                    <table class="table table-hover text-center">
                                        <tr class="text-center">
                                            <th class="table-primary">Foto</th>
                                            <th class="table-primary">NIK</th>
                                            <th class="table-primary">Nama</th>
                                            <th class="table-primary">Position</th>
                                        </tr>
                                        <?php
                                            require('Require/connection.php');

                                            $sql = 'SELECT foto, nik, nama, position FROM performance WHERE status_kerja = "Tetap" AND grade IN ("C", "D")';
                                            $result = mysqli_query($con, $sql);

                                            if (!$result) {
                                                die('Query Error: ' . mysqli_error($con));
                                            }

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($data = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td><?= "<img src='image/" . $data['foto'] . "' width='100' height='100' title='" . $data['nik'] . "'/>"; ?></td>
                                                        <td><?= $data['nik']; ?></td>
                                                        <td><?= $data['nama']; ?></td>
                                                        <td><?= $data['position']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo 'No data found';
                                            }

                                            mysqli_close($con);
                                            ?>
                                    </table>
                                </div>
                                <div class="col ">
                                <h2>Performance Karyawan Tidak Tetap C & D</h2>
                                    <table class="table table-hover text-center">
                                        <tr class="text-center">
                                            <th class="table-primary">Foto</th>
                                            <th class="table-primary">NIK</th>
                                            <th class="table-primary">Nama</th>
                                            <th class="table-primary">Position</th>
                                        </tr>
                                        <?php
                                            require('Require/connection.php');

                                            $sql = 'SELECT foto, nik, nama, position FROM performance WHERE status_kerja = "Tidak Tetap" AND grade IN ("C", "D")';
                                            $result = mysqli_query($con, $sql);

                                            if (!$result) {
                                                die('Query Error: ' . mysqli_error($con));
                                            }

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($data = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <tr>
                                                        <td><?= "<img src='image/" . $data['foto'] . "' width='100' height='100' title='" . $data['nik'] . "'/>"; ?></td>
                                                        <td><?= $data['nik']; ?></td>
                                                        <td><?= $data['nama']; ?></td>
                                                        <td><?= $data['position']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo 'No data found';
                                            }

                                            mysqli_close($con);
                                            ?>
                                    </table>
                                </div>
                             </div>   
                            <!-- TABLE END -->
                        </div> 
                    </div>
                </main>
                <!-- MAIN END -->
                
            </div>
        <!-- MAIN & HEADER END -->

        </div>
    </section>


    <!-- Optional JavaScript -->
    <script src="js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>



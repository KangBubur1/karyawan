<!doctype html>
<html lang="en" >
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
  <body style="overflow-y:hidden;">

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



                    <div class="col-12 mt-4 d-flex justify-content-between">
                        <div class="p-3">
                            <h4>List Karyawan</h4>
                        </div>
                        <div class="p-3">
                            <span class="material-symbols-outlined">
                            calendar_month
                            </span>
                        </div>
                    </div>

                    <div class="container ps-5 mt-4 ">
                        <form action="" method="POST">
                            <div class="d-flex ">
                                <input type="text" name="keyword" id="keyword" placeholder="Cari..." class="search-Input  me-4"  autocomplete="off">
                            </div>
                        </form>
                    </div>
                    <div class="col-12  mb-5">
                        <div class="container custom-container-home-main" >
                            <div class="row overflow-x-auto" id="container">
                                <?php
                                    require 'Require/connection.php';
                                    $query = "SELECT * FROM performance";
                                    $result = mysqli_query($con, $query);
                                ?>
                                <table class="table table-hover text-center">
                                        <thead class="sticky-top">
                                            <tr class="text-center">
                                                <th class="table-secondary">NIK</th>
                                                <th class="table-secondary">Foto</th>
                                                <th class="table-secondary">Nama</th>
                                                <th class="table-secondary">Status Kerja</th>
                                                <th class="table-secondary">Position</th>
                                                <th class="table-secondary">Tanggal Penilaian</th>
                                                <th class="table-secondary">Responsibility</th>
                                                <th class="table-secondary">Teamwork</th>
                                                <th class="table-secondary">Management Time</th>
                                                <th class="table-secondary">Total</th>
                                                <th class="table-secondary">Grade</th>
                                            </tr>                                    
                                        </thead>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['nik']; ?></td>
                                                <td><?= "<img src='image/" . $row['foto'] . "' width='100' height='100' title='" . $row['nik'] . "'/>"; ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['status_kerja']; ?></td>
                                                <td><?= $row['position']; ?></td>
                                                <td><?= date("d M Y", strtotime($row['tgl_penilaian'])); ?></td>
                                                <td><?= $row['responsibility']; ?></td>
                                                <td><?= $row['teamwork']; ?></td>
                                                <td><?= $row['management_time']; ?></td>
                                                <td><?= $row['total']; ?></td>
                                                <td><?= $row['grade']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    
                </main>
                <!-- MAIN END -->
                
            </div>
        <!-- MAIN & HEADER END -->

        </div>
    </section>

    
    <button class="custom-theme" onclick="toggleTheme()" id="theme">
        <span class="material-symbols-outlined" id="theme-icon">lightbulb</span>
    </button>                
    
    <!-- Optional JavaScript -->
    <script>
        // Dark mode
        let theme = localStorage.getItem('theme') || 'light';
        
        function toggleTheme() {
        if (theme === 'light') {
            theme = 'dark';
        } else {
            theme = 'light';
        }
        
        localStorage.setItem("theme", theme);
        document.body.dataset.bsTheme = theme;
        
        // Update the theme icon
        const themeIcon = document.getElementById("theme-icon");
        themeIcon.innerText = theme === "light" ? "lightbulb" : "dark_mode";
        
        }
        
        // Check for the user's preferred color scheme
        if (localStorage.getItem('theme') === null && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        theme = 'dark';
        }
        
        document.body.dataset.bsTheme = theme;
    </script>
    <script src="js/script.js"></script>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


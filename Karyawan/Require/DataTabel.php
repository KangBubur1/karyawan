
<?php
    //TABEL 1

    include 'Require/connection.php';
    
    // Query to total count of "Tetap" 
    $sqlTetap = "SELECT COUNT(status_kerja) AS total_tetap FROM performance WHERE status_kerja = 'Tetap'";
    $resultTetap = mysqli_query($con, $sqlTetap);
    $dataTetap = mysqli_fetch_assoc($resultTetap);
    $totalTetap = $dataTetap['total_tetap'];
    
    // Query to total count of "Tidak Tetap" 
    $sqlTidakTetap = "SELECT COUNT(status_kerja) AS total_tidak_tetap FROM performance WHERE status_kerja = 'Tidak Tetap'";
    $resultTidakTetap = mysqli_query($con, $sqlTidakTetap);
    $dataTidakTetap = mysqli_fetch_assoc($resultTidakTetap);
    $totalTidakTetap = $dataTidakTetap['total_tidak_tetap'];
    ?>
<?php
    //TABEL 2

    include 'Require/connection.php';
    // Query to get the total count of "A" records
    $sqlA = "SELECT COUNT(grade) AS totalA FROM performance WHERE grade = 'A' AND status_kerja='Tetap'";
    $resultA = mysqli_query($con, $sqlA);
    $dataA = mysqli_fetch_assoc($resultA);
    $totalA = $dataA['totalA'];
    
    // Query to get the total count of "B" records
    $sqlB = "SELECT COUNT(grade) AS totalB FROM performance WHERE grade = 'B' AND status_kerja='Tetap'";
    $resultB = mysqli_query($con, $sqlB);
    $dataB = mysqli_fetch_assoc($resultB);
    $totalB = $dataB['totalB'];

     // Query to get the total count of "C" records
     $sqlC = "SELECT COUNT(grade) AS totalC FROM performance WHERE grade = 'C' AND status_kerja='Tetap'";
     $resultC = mysqli_query($con, $sqlC);
     $dataC = mysqli_fetch_assoc($resultC);
     $totalC = $dataC['totalC'];

      // Query to get the total count of "D" records
    $sqlD = "SELECT COUNT(grade) AS totalD FROM performance WHERE grade = 'D' AND status_kerja='Tetap'";
    $resultD = mysqli_query($con, $sqlD);
    $dataD = mysqli_fetch_assoc($resultD);
    $totalD = $dataD['totalD'];
?>

<?php
    //TABEL 3


    include 'Require/connection.php';
    // Query to get the total count of "A" records
    $sqlA = "SELECT COUNT(grade) AS totalA FROM performance WHERE grade = 'A' AND status_kerja='Tidak Tetap'";
    $resultA = mysqli_query($con, $sqlA);
    $dataA = mysqli_fetch_assoc($resultA);
    $totalAtt = $dataA['totalA'];
    
    // Query to get the total count of "B" records
    $sqlB = "SELECT COUNT(grade) AS totalB FROM performance WHERE grade = 'B' AND status_kerja='Tidak Tetap'";
    $resultB = mysqli_query($con, $sqlB);
    $dataB = mysqli_fetch_assoc($resultB);
    $totalBtt = $dataB['totalB'];

     // Query to get the total count of "C" records
     $sqlC = "SELECT COUNT(grade) AS totalC FROM performance WHERE grade = 'C' AND status_kerja='Tidak Tetap'";
     $resultC = mysqli_query($con, $sqlC);
     $dataC = mysqli_fetch_assoc($resultC);
     $totalCtt = $dataC['totalC'];

      // Query to get the total count of "D" records
    $sqlD = "SELECT COUNT(grade) AS totalD FROM performance WHERE grade = 'D' AND status_kerja='Tidak Tetap'";
    $resultD = mysqli_query($con, $sqlD);
    $dataD = mysqli_fetch_assoc($resultD);
    $totalDtt = $dataD['totalD'];
    ?>

<?php
    include 'Require/connection.php';
    // Query to get the total count of all records
    $query = "SELECT COUNT(nik) AS total_records FROM performance";
    $resultTotal = mysqli_query($con, $query);
    $dataTotal = mysqli_fetch_assoc($resultTotal);
    $totalKaryawan = $dataTotal['total_records'];
?>
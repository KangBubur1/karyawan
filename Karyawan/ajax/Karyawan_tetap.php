<?php
require '../Require/connection.php';
$keyword = $_GET["keyword"];
var_dump($keyword);

$query = "SELECT * FROM performance 
          WHERE status_kerja = 'Tetap' AND (
              nik LIKE '%$keyword%'
              OR nama LIKE '%$keyword%'
              OR position LIKE '%$keyword'
              OR tgl_penilaian LIKE '%$keyword'
              OR responsibility LIKE '%$keyword'
              OR teamwork LIKE '%$keyword'
              OR management_time LIKE '%$keyword'
              OR total LIKE '%$keyword'
              OR grade LIKE '%$keyword')";

$result = mysqli_query($con, $query);
?>

<table class="table table-hover text-center">
    <tr class="text-center">
        <th class="table-primary">NIK</th>
        <th class="table-primary">Foto</th>
        <th class="table-primary">Nama</th>
        <th class="table-primary">Status Kerja</th>
        <th class="table-primary">Position</th>
        <th class="table-primary">Tanggal Penilaian</th>
        <th class="table-primary">Responsibility</th>
        <th class="table-primary">Teamwork</th>
        <th class="table-primary">Management Time</th>
        <th class="table-primary">Total</th>
        <th class="table-primary">Grade</th>
    </tr>
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

<?php
require '../Require/connection.php';
$keyword = $_GET["keyword"];

$query = "SELECT * FROM performance 
          WHERE (
              nik LIKE '%$keyword%'
              OR status_kerja LIKE '%$keyword'
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

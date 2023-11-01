
<?php
    function add($con){
?>
        <!-- INSERT -->
        <form action="" name="performa" method="POST" enctype="multipart/form-data">
            <div class="container  mt-3 ">

                <!-- INPUT TOP ROW -->
                <div class="row overflow-x-auto">
                <div class="col-12 col-sm-6 pt-4 pb-4 ">
                    <div class="d-flex align-items-center justify-content-between">
                    <label for="foto" class="fw-bold fs-3">Foto</label>
                    <input type="file"
                            name="foto"
                            accept=".png, .jpg, .jpeg, .jfif, .gif"
                            required
                            class="custom-Input">
                    </div>
                </div>
                <div class="col-12  col-sm-6 d-flex justify-content-sm-end align-items-center">
                    <input type="submit" 
                    name="insert" 
                    value="Simpan" 
                    class="btn custom-btn me-4"/>
                    <input type="button" 
                    value="Clear" 
                    onclick="window.location.href='performance.php'"
                    class="btn btn-outline-danger">
                </div>
                </div>

                <!-- INPUT BOTTOM ROW -->
                <div class="row overflow-x-auto">
                    <!-- LEFT COLUMN -->
                    <div class="col-12 col-sm-6">           
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="tgl_penilaian">Tanggal Penilaian</label>
                            <input  type="date" 
                                    name="tgl_penilaian" 
                                    placeholder="Tanggal Penilaian"  
                                    required 
                                    class="custom-Input
                                    "/>
                        </div>
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="Nik">NIK</label>
                            <input  type="text" 
                                    name="nik" 
                                    placeholder="Nomor Induk Karyawan"  
                                    required 
                                    class="custom-Input
                                    "/>
                        </div>
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="Nama">Nama</label>
                            <input  type="text" 
                                    name="nama" 
                                    placeholder="Nama"  
                                    required 
                                    class="custom-Input
                                    "/>
                        </div>
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="Status_kerja">Status Kerja</label>
                            <select name="status_kerja" >
                                <option value="Unspecified">Status Kerja</option>
                                <option value="Tetap">Tetap</option>
                                <option value="Tidak Tetap">Tidak Tetap</option>
                            </select>
                        </div>
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="posisi">Posisi</label>
                            <input  type="text" 
                                    name="position" 
                                    placeholder="Posisi"  
                                    required 
                                    class="custom-Input
                                    "/>
                        </div>
                    </div>
                    <!-- RIGHT COLUMN -->
                    <div class="col-12 col-sm-6">    
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="responsibility">Responsibility</label>
                            <input  type="number" 
                                    name="responsibility"
                                    min="0" 
                                    placeholder="Responsibility"
                                    onfocus="start_count()"
                                    onblur="stop_count()"  
                                    required 
                                    class="custom-Input
                                    "/>
                        </div>
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="teamwork">Teamwork</label>
                            <input  type="number" 
                                    name="teamwork"
                                    min="0" 
                                    placeholder="teamwork"
                                    onfocus="start_count()"
                                    onblur="stop_count()"  
                                    required 
                                    class="custom-Input
                                    "/>
                        </div>
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="management_time">Management Time</label>
                            <input  type="number" 
                                    name="management_time"
                                    min="0" 
                                    placeholder="management_time"
                                    onfocus="start_count()"
                                    onblur="stop_count()"  
                                    required 
                                    class="custom-Input
                                    "/>
                        </div>
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="total">Total</label>
                            <input  type="number" 
                                    name="total"
                                    min="0" 
                                    placeholder="total" 
                                    required 
                                    class="custom-Input custom-yellow
                                    "/>
                        </div>
                        <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                            <label for="grade">Grade</label>
                            <input  type="text" 
                                    name="grade"
                                    placeholder="grade"
                                    required 
                                    class="custom-Input custom-merah
                                    "/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        include('connection.php');
        if (isset($_POST['insert'])) {
            $nik = $_POST['nik'];
            $loc = $_FILES['foto']['tmp_name'];
            $nama = $_POST['nama'];
            $status_kerja = $_POST['status_kerja'];
            $position = $_POST['position'];
            $tgl_penilaian = $_POST['tgl_penilaian'];
            $responsibility = $_POST['responsibility'];
            $teamwork = $_POST['teamwork'];
            $management_time = $_POST['management_time'];
            $total = $_POST['total'];
            $grade = $_POST['grade'];

            $filenm = $nama . '-' . uniqid() . '.png';
            move_uploaded_file($loc, 'image/'. $filenm);

            $sql = "INSERT INTO performance (nik, foto, nama, status_kerja, position, tgl_penilaian, responsibility, teamwork, management_time, total, grade) 
                    VALUES ('$nik', '$filenm', '$nama', '$status_kerja', '$position', '$tgl_penilaian', '$responsibility', '$teamwork', '$management_time', '$total', '$grade')";

            $result = mysqli_query($con, $sql);
            
            if ($result) {
                // Insert successful
                echo '<script type="text/javascript">toastr.success("Data Inputed")</script>';
            } else {
                // Insert failed
                echo '<script type="text/javascript">toastr.error("Failed to Input")</script>';
            }
        }       
        ?>
<?php
    }
?>

<?php
    // VIEW
    function view($con){
    ?>
        <div class="container">
            <div class="row overflow-x-auto">
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
                        <th class="table-secondary">Aksi</th>
                    </tr>
                            <?php
                    include 'connection.php';
                    $sql = "SELECT * FROM performance";
                    $result = mysqli_query($con,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($data = mysqli_fetch_array($result)){	
                    ?>
                    <tr>
                        <td><?= $data['nik']; ?></td>
                        <td><?= "<img src='image/".$data['foto']."' width='100' height='100' title='".$data['nik']."'/>"; ?></td>
                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['status_kerja']; ?></td>
                                        <td><?= $data['position']; ?></td>
                        <td><?= date("d M Y",strtotime($data['tgl_penilaian'])); ?></td>
                                        <td><?= $data['responsibility']; ?></td>
                                        <td><?= $data['teamwork']; ?></td>
                                        <td><?= $data['management_time']; ?></td>
                                        <td><?= $data['total']; ?></td>
                                        <td><?= $data['grade']; ?></td>
                        <td>
                        <a href="performance.php?aksi=viewing&id=<?= $data['nik']; ?>">view</a> |
                        <a href="performance.php?aksi=edit&id=<?= $data['nik']; ?>">edit</a> |
                        <a href="performance.php?aksi=hapus&id=<?= $data['nik']; ?>&img=<?= $data['foto']; ?>" onclick="return confirm('Yakin Hapus?')">delete</a>
                        </td>
                    </tr>
                    <?php 
                            } 
                        }
                        else{
                        ?>
                            <tr>
                            <td colspan="12" align="center"><i>Data Belum Ada</i></td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>
        </div>
<?php
    }
?>

<?php
    // EDIT
    function edit($con){
        include 'connection.php';
        $id 	= $_GET['id'];
        $sql 	= "SELECT * FROM performance WHERE nik ='$id'";
        $result = mysqli_query($con,$sql);
        while($data = mysqli_fetch_array($result)){
            $status_kerja = $data['status_kerja']; 
        
?>
    <form action="" name="performa" method="POST" enctype="multipart/form-data" >
        <div class="container mt-3 ">

            <!-- INPUT TOP ROW -->
            <div class="row overflow-x-auto">
            <div class="col-12 col-sm-6 pt-4 pb-4 ">
                <div class="d-flex align-items-center justify-content-between">
                <input type="hidden" name="old" value="<?= $data['foto']; ?>">
                <span><?="<img src='image/".$data['foto']."' width='100' height='100' title='".$data['nama']."'/>"; ?></span>
                <input type="file"
                        name="foto"
                        accept=".png, .jpg, .jpeg, .jfif, .gif"
                        class="custom-Input">
                </div>
            </div>
            <div class="col-12  col-sm-6 d-flex justify-content-sm-end align-items-center">
                <input type="submit" 
                    name="Update" 
                    value="Update"
                    onclick="window.location.href='performance.php'"
                    class="btn custom-btn me-4"
                    />
                <input type="button" 
                        value="Clear" 
                        onclick="window.location.href='performance.php'"
                        class="btn btn-outline-danger">
            </div>
            </div>

        <!-- INPUT BOTTOM ROW -->
        <div class="row overflow-x-auto">
            <!-- LEFT COLUMN -->
            <div class="col-12 col-sm-6">           
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <label for="tgl_penilaian">Tanggal Penilaian</label>
                    <input  type="date" 
                            name="tgl_penilaian" 
                            placeholder="Tanggal Penilaian"
                            value="<?= $data['tgl_penilaian']; ?>"
                             
                            class="custom-Input
                            "/>
                </div>
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <label for="Nik">NIK</label>
                    <input  type="text" 
                            name="id" 
                            placeholder="Nomor Induk Karyawan"  
                            value="<?= $data['nik'];?>"
                             
                            class="custom-Input
                            "
                            readonly/>
                </div>
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <label for="Nama">Nama</label>
                    <input  type="text" 
                            name="nama"
                            value="<?= $data['nama']; ?>"
                            placeholder="Nama"  
                             
                            class="custom-Input
                            "/>
                </div>
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                 <?php
                    include 'connection.php';

                    // Query untuk mengambil nilai enum dari tabel
                    $query = "SHOW COLUMNS FROM performance WHERE Field = 'status_kerja'";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $enum_str = $row['Type'];
                    // Mengambil nilai enum dari string
                        preg_match_all("/'([^']+)'/", $enum_str, $matches);
                        $enum_values = $matches[1];
                    }
                    ?>
                    <label for="Status_kerja">Status Kerja</label>
                    <select name="status_kerja" >
                    <?php
    						foreach ($enum_values as $value) {
        						$selected = ($value == $status_kerja) ? 'selected' : '';
        						echo '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
    						}
    			    ?>
                    </select>
                </div>
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <label for="posisi">Posisi</label>
                    <input  type="text" 
                            name="position" 
                            placeholder="Posisi"  
                            value="<?= $data['position']; ?>"  
                            class="custom-Input
                            "/>
                </div>
            </div>
            <!-- RIGHT COLUMN -->
            <div class="col-12 col-sm-6">    
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <label for="responsibility">Responsibility</label>
                    <input  type="number" 
                            name="responsibility"
                            min="0" 
                            placeholder="Responsibility"
                            onfocus="start_count()"
                            onblur="stop_count()"  
                            value="<?= $data['responsibility']; ?>"
                            class="custom-Input
                            "/>
                </div>
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <label for="teamwork">Teamwork</label>
                    <input  type="number" 
                            name="teamwork"
                            min="0" 
                            placeholder="teamwork"
                            onfocus="start_count()"
                            onblur="stop_count()"  
                            value="<?= $data['teamwork']; ?>"
                            class="custom-Input
                            "/>
                </div>
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <label for="management_time">Management Time</label>
                    <input  type="number" 
                            name="management_time"
                            min="0" 
                            placeholder="management_time"
                            onfocus="start_count()"
                            onblur="stop_count()"  
                            value="<?= $data['management_time']; ?>" 
                            class="custom-Input
                            "/>
                </div>
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <label for="total">Total</label>
                    <input  type="number" 
                            name="total"
                            min="0" 
                            placeholder="total" 
                            value="<?= $data['grade']; ?>"
                            readonly
                            class="custom-Input
                            "/>
                </div>
                <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <label for="grade">Grade</label>
                    <input  type="text" 
                            name="grade"
                            placeholder="grade"
                            value="<?= $data['grade']; ?>"
                            readonly
                            class="custom-Input
                            "/>
                </div>
            </div>
        </div>
        </div>
    </form>
<?php
        }
        if(isset($_POST['Update'])){
            $id 				= $_POST['id'];
            $fotoold			= $_POST['old'];
            $fotobaru			= $_FILES['foto']['tmp_name'];
            $nama 				= $_POST['nama'];
            $status_kerja 		= $_POST['status_kerja'];
            $position 			= $_POST['position'];
            $tgl_penilaian 		= $_POST['tgl_penilaian'];
            $responsibility 	= $_POST['responsibility'];
            $teamwork	 		= $_POST['teamwork'];
            $management_time	= $_POST['management_time'];
            $total 				= $_POST['total'];
            $grade 				= $_POST['grade'];
            
            if($fotobaru==""){
                $sql 	= "UPDATE performance SET 
                            nama='$nama', 
                            status_kerja='$status_kerja',
                            position='$position',
                            tgl_penilaian ='$tgl_penilaian ',
                            responsibility='$responsibility',
                            teamwork='$teamwork',
                            management_time='$management_time',
                            total='$total',
                            grade='$grade'
                            WHERE nik='$id'";
                $result = mysqli_query($con,$sql);

            }
            else{
                unlink('image/'.$fotoold);
                $loc	= $_FILES['foto']['tmp_name'];
                $filenm = $nama.'-'.uniqid().'.png';
                move_uploaded_file($loc, 'image/'.$filenm);
                $sql 	= "UPDATE performance SET 
                            foto ='$filenm',
                            nama='$nama', 
                            status_kerja='$status_kerja',
                            position='$position',
                            tgl_penilaian ='$tgl_penilaian ',
                            responsibility='$responsibility',
                            teamwork='$teamwork',
                            management_time='$management_time',
                            total='$total',
                            grade='$grade'
                            WHERE nik='$id'";
                $result = mysqli_query($con,$sql);
            }
            echo '<script>window.location.href = "performance.php";</script>';
    }
}
?>

<?php
    // LIHAT
    function lihat($con){
        $id 	= $_GET['id'];
        $sql 	= "SELECT * FROM performance WHERE nik ='$id'";
        $result = mysqli_query($con,$sql);
        while($data = mysqli_fetch_array($result)){
            $status_kerja = $data['status_kerja']; 
        
?> 
    <form action="" name="performa" method="POST" enctype="multipart/form-data">
        <div class="container  mt-3 ">

            <!-- INPUT TOP ROW -->
                <div class="row overflow-x-auto">
                    <div class="col-12 col-sm-6 pt-4 pb-4 ">
                        <div class="d-flex align-items-center justify-content-between">
                        <input type="hidden" name="old" value="<?= $data['foto']; ?>">
                        <span><?="<img src='image/".$data['foto']."' width='200' height='200' title='".$data['nama']."'/>"; ?></span>
                        <input type="file"
                                name="foto"
                                accept=".png, .jpg, .jpeg, .jfif, .gif"
                                class="custom-Input"
                                hidden>
                        </div>
                    </div>
                    <div class="col-12  col-sm-6 d-flex justify-content-sm-end align-items-center">
                        <input type="submit" 
                                name="insert" 
                                value="Simpan" 
                                class="btn custom-btn me-4"
                                hidden/>
                        <input type="submit" 
                                name="Update" 
                                value="Update" 
                                class="btn custom-btn me-4"
                                hidden/>
                        <input type="button" 
                                value="Clear" 
                                onclick="window.location.href='performance.php'"
                                class="btn btn-outline-danger"
                                >
                    </div>
                </div>

                <!-- INPUT BOTTOM ROW -->
                <div class="row overflow-x-auto">
                <!-- LEFT COLUMN -->
                <div class="col-12 col-sm-6">           
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                        <label for="tgl_penilaian">Tanggal Penilaian</label>
                        <input  type="date" 
                                name="tgl_penilaian" 
                                placeholder="Tanggal Penilaian"
                                value="<?= $data['tgl_penilaian']; ?>"
                                readonly
                                class="custom-Input
                                "/>
                    </div>
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                        <label for="Nik">NIK</label>
                        <input  type="text" 
                                name="id" 
                                placeholder="Nomor Induk Karyawan"  
                                value="<?= $data['nik'];?>"
                                class="custom-Input
                                "
                                readonly/>
                    </div>
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                        <label for="Nama">Nama</label>
                        <input  type="text" 
                                name="nama"
                                value="<?= $data['nama']; ?>"
                                placeholder="Nama"  
                                readonly
                                class="custom-Input
                                "/>
                    </div>
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                    <?php
                        include 'connection.php';

                        // Query untuk mengambil nilai enum dari tabel
                        $query = "SHOW COLUMNS FROM performance WHERE Field = 'status_kerja'";
                        $result = mysqli_query($con, $query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $enum_str = $row['Type'];
                        // Mengambil nilai enum dari string
                            preg_match_all("/'([^']+)'/", $enum_str, $matches);
                            $enum_values = $matches[1];
                        }
                        ?>
                        <label for="Status_kerja">Status Kerja</label>
                        <select name="status_kerja" disabled>
                        <?php
                                foreach ($enum_values as $value) {
                                    $selected = ($value == $status_kerja) ? 'selected' : '';
                                    echo '<option readonly value="' . $value . '"' . $selected . '>' . $value . '</option>';
                                }
                        ?>
                        </select>
                    </div>
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                        <label for="posisi">Posisi</label>
                        <input  type="text" 
                                name="position" 
                                placeholder="Posisi"  
                                value="<?= $data['position']; ?>"  
                                class="custom-Input
                                "
                                readonly/>
                    </div>
                </div>
                <!-- RIGHT COLUMN -->
                <div class="col-12 col-sm-6">    
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                        <label for="responsibility">Responsibility</label>
                        <input  type="number" 
                                name="responsibility"
                                min="0" 
                                placeholder="Responsibility"
                                onfocus="start_count()"
                                onblur="stop_count()"  
                                value="<?= $data['responsibility']; ?>"
                                class="custom-Input
                                "
                                readonly/>
                    </div>
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                        <label for="teamwork">Teamwork</label>
                        <input  type="number" 
                                name="teamwork"
                                min="0" 
                                placeholder="teamwork"
                                onfocus="start_count()"
                                onblur="stop_count()"  
                                value="<?= $data['teamwork']; ?>"
                                class="custom-Input
                                "
                                readonly/>
                    </div>
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                        <label for="management_time">Management Time</label>
                        <input  type="number" 
                                name="management_time"
                                min="0" 
                                placeholder="management_time"
                                onfocus="start_count()"
                                onblur="stop_count()"  
                                value="<?= $data['management_time']; ?>" 
                                class="custom-Input
                                "
                                readonly/>
                    </div>
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                        <label for="total">Total</label>
                        <input  type="number" 
                                name="total"
                                min="0" 
                                placeholder="total" 
                                value="<?= $data['grade']; ?>"
                                readonly
                                class="custom-Input
                                "/>
                    </div>
                    <div class="d-flex align-items-center  mt-3 p-3 justify-content-between">
                        <label for="grade">Grade</label>
                        <input  type="text" 
                                name="grade"
                                placeholder="grade"
                                value="<?= $data['grade']; ?>"
                                readonly
                                class="custom-Input
                                "/>
                    </div>
                </div>
                </div>
        </div>
    </form>
<?php  
        }  
    }
?>
<?php   
    // HAPUS
    function hapus($con){
        $id		= $_GET['id'];
			$img	= $_GET['img'];
			unlink('image/'.$img);
			$sql	=  "DELETE FROM performance WHERE nik='$id'";
			$result = mysqli_query($con,$sql);

			if($result) {
				header("location:performance.php");
				
			}
			else{
				echo "Query Error : ".mysqli_error($con);
			
		}
    }
?>


<?php
require("Require/CRUD.php");
?>

<?php
    //Connection
    $con = mysqli_connect("localhost","root","","karyawan_kel6");
    //hapus function
    
    //Main
    if (isset($_GET['aksi'])){
      switch($_GET['aksi']){
        case "hapus":
          hapus($con);
          break;
      }
    }

?>

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

    <!-- Function Hitung Start -->
    <script>
      function start_count(){
              interval = setInterval("calculateTotal()",1);
          }
      function calculateTotal() {
        a = document.performa.responsibility.value;
              b = document.performa.teamwork.value;
              c = document.performa.management_time.value;
        
        total = parseInt((a*0.3)+(b*0.3)+(c*0.4));


        if(total<40){
                  grade="D";
                }else if(total<=59){
                  grade="C";
                }else if(total<=79){
                  grade="B";
                }else if(total<=100){
                  grade="A";
                }else if(total>100){
                  grade="Input nilai terlalu lebih"
                }
        document.performa.total.value = total;
              document.performa.grade.value = grade;
        console.log(total);
        
      }
      function stop_count(){
              clearInterval(interval);
          }
      </script>;
		<!-- Function Hitung End -->

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
            <div class="col-md-9 col-xl-10 border">
                
                <!-- HEADER START -->
                <?php
                require('Require/Header.php');
                ?>
                <!-- HEADER END -->

                <!-- MAIN START -->
                <main class="main overflow-y-auto">

                  <div class="col-12 d-flex justify-content-between">
                          <div class="p-3">
                              <h4>PERFORMANCE</h4>
                          </div>
                          <div class="p-3">
                              <button>ICON KALENDER</button>
                          </div>
                  </div>


                  <?php
                      //Connection
                      $con = mysqli_connect("localhost","root","","karyawan_kel6");
                      //hapus function
                      
                      //Main
                      if (isset($_GET['aksi'])){
                        switch($_GET['aksi']){
                          case "viewing":
                            lihat($con);
                            view($con);
                            break;
                          case "edit":
                            edit($con);
                            view($con);
                            break;
                          case "hapus":
                            hapus($con);
                            break;
                          default:
                            echo "<h3>Aksi <i>".$_GET['aksi']."</i> Belum Tersedia</h3>";
                            add($con);
                            view($con);
                        }
                      }
                      else{
                        add($con);
                        view($con);
                      } 
                  ?>


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



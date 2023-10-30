<?php
  include 'Require/login.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">

     <!-- Font Family -->
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
     
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Healthy Food!</title>
  </head>
  <body>

    <section class="custom-bg-body d-flex flex-column align-items-center 
    justify-content-center text-center" style="height:100vh;">

    <!-- MAIN CONTAINER START -->
      <main class="container custom-container-main shadow-lg">
          <div class="row h-100">
            
            <!-- LEFT SIDE START -->
            <div class="col-12 col-sm-4 pt-3 custom-bg-left d-flex flex-column justify-content-lg-center justify-content-start">
              <h1 class="custom-h1 fw-bold pb-3 ">Healthy <span class="text-light">Food</span></h1>
              <img src="image/home.png" alt="" class="img-fluid ">
            </div>
            <!-- LEFT SIDE END -->

            <!-- RIGHT SIDE START -->
            <div class="col-12 col-sm-8 p-5 p-sm-3 custom-bg-right text-light shadow-lg d-flex flex-column justify-content-center ">
              <form action="Require/login.php" method="post" class="custom-bounce-right">
                <h1 class="custom-h1 fw-bold pb-3 mt-2 mt-sm-0 text-light ">Sign In</h1>
                <div class="d-flex flex-column w-75 mx-auto">
                  <label for="username" class="mb-2 text-start custom-label">Username</label>
                  <input type="text" name="username" id="username" class="mb-2 custom-Input">
                </div>
                <div class="d-flex flex-column w-75 mx-auto">
                  <label for="password" class="mb-2 text-start custom-label ">Password</label>
                  <input type="password" name="password" id="password" class="mb-2 custom-Input">
                </div>
                <button type="submit" name="login" class="btn custom-btn mt-4">Login</button>
              </form>
            </div>
          </div>
          <!-- RIGHT SIDE END -->
          
      </main>
   <!-- MAIN CONTAINER END -->
  
    </section>

    <!-- Optional JavaScript -->
    <script src="js/script.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
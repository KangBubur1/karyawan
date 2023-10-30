<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["username"]) && isset($_POST['password'])) {
        require 'connection.php';
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sanitized_username = mysqli_real_escape_string($con, $username);
        $sanitized_password = mysqli_real_escape_string($con, $password);

        $sql = "SELECT * FROM akun  WHERE username = '" . $sanitized_username . "' AND password = '" . md5($sanitized_password) ."'";
        

        $result = mysqli_query($con, $sql)  
        or die(mysqli_error($con)); 
        
            $num = mysqli_fetch_array($result); 
                
            if($num > 0) { 
                header("Location:../home.php");
            } 
            else { 
                echo "Wrong User id or password"; 
            }
    } else {
        echo "Form data not submitted";
    }
}
?>
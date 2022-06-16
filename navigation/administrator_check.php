<?php
    include("connect.php");
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $sql="SELECT * FROM `administrator` WHERE `username`='$username' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)){
        echo "Uspješna prijava! Preuspjeravanje na rezervacije...";
        echo "<script>
            var timer = setTimeout(function() {
            window.location='administrator1.php'
            }, 3000);
            </script>";
            return;
    }
    else{
        echo "<h1>Neuspješna prijava! Pokušajte ponovo...</h1>";
        echo "<script>
            var timer = setTimeout(function() {
            window.location='login.html'
            }, 3000);
            </script>";
            return;
    }
?>
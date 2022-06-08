
<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
        <?php
        include("connect.php");
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $telephone = $_REQUEST['telephone'];
        $group = $_REQUEST['group'];
        $treatment = $_REQUEST['treatment'];
        $date = $_REQUEST['date'];
        $time = $_REQUEST['time'];
        //echo "$name, $email, $telephone, $group, $treatment, $date, $time";
        $sql = "SELECT * FROM `tretmani` WHERE `treatment`='$treatment'";
        if($result = mysqli_query($conn, $sql)){
            echo "$name, $email, $telephone, $group, $treatment, $date, $time";
        }
        else{
            echo "Group and treatment don't match";
            return;
        }
        $row = $result->fetch_assoc();
        $duration = $row['duration'];
        $sql = "INSERT INTO `rezervacije` (`date`, `start_time`, `duration`, `treatment`, `name`, `email`, `number`) VALUES ('$date','$time','$duration','$treatment','$name', '$email', '$telephone')";
        if(mysqli_query($conn, $sql)){
            echo "Rezervacija uspješna! Preusmjeravanje na početnu...";
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
         
        // Close connection
        mysqli_close($conn);
        ?>
    <script>
        var timer = setTimeout(function() {
           window.location='index.html'
        }, 3000);
    </script>

</body>
 
</html>
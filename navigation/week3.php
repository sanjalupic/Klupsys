<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="356353610861-7bn2jbgc7g6deda9gaod33ldh1ucuco5.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Weeks</title>
</head>


<body>

<?php
echo "<h1>Todays date: " .date('Y-m-d') . ", " .date('D') ."</h1>";
$week = date('w') + 2*7;
$first_day_of_week = date('Y-m-d', strtotime("-". (1-$week) ." days"));
?>
<div class="content">
    <a href="week2.php"> Previous week</a>
    <a href="week4.php"> Next week</a>
<?php
for($i=0; $i<5; $i++){
    $temp_date = date('Y-m-d', strtotime($first_day_of_week ."+" .$i ."days"));
    //echo "<div class='item" .($i+1) ."'>" .$temp_date .", " .date('D', strtotime($temp_date)) ."<div>";  
    echo $temp_date .", " .date('D', strtotime($temp_date)) ."<br>";
}
?>
<div>

</body>
</html>
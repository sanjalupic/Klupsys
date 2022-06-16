<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="schedule.css">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="356353610861-7bn2jbgc7g6deda9gaod33ldh1ucuco5.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <title>Rezervacije</title>
</head>


<body>
    <header>
        <div class="navbar" class="navbar-top">
            <h1>Klupsys</h1>
            <nav>
                <ul>
                    <li><a href="../navigation/index.html">Home</a></li>
                    <li><a href="../navigation/tretmani.html">Tretmani</a></li>
                    <li><a href="../navigation/rezervacija.php">Rezervacija</a></li>
                    <li><a href="../navigation/cjenik.html">Cjenik</a></li>
                    <li><a href="../navigation/kontakt.html">Kontakt</a></li>
                    <li><a href="../navigation/login.html"><i class="fas fa-user-circle"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="left-right">
        <span></span>
        <a href="administrator2.php"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
        <?php
            $week = date('w') + 2*7;
            $first_day_of_week = date('d.m.Y', strtotime("+". (intval($week/7)*7-($week%7-1)) ." days"));
            $last_day_of_week = date('d.m.Y', strtotime("+". (intval($week/7)*7-($week%7-1)+4) ."days"));
            echo "<span>" .$first_day_of_week ." - " .$last_day_of_week ."</span>"
        ?>
        <a href="administrator4.php"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
        <span></span>
  </div>


<div class = "calendar-container">

<div class="calendar-header">
  <ul class="weekdays">
      <li>PON</li>
      <li>UTO</li>
      <li>SRI</li>
      <li>ČET</li>
      <li>PET</li>
  </ul>
  <ul class = "dates">
  <?php
      $first_day_of_week = date('Y-m-d', strtotime("+". (intval($week/7)*7-($week%7-1)) ." days"));
      $last_day_of_week = date('Y-m-d', strtotime("+". (intval($week/7)*7-($week%7-1)+4) ."days"));
      for($i=0; $i<5; $i++){
          $temp_date = date('d.m.Y.', strtotime($first_day_of_week ."+" .$i ."days"));
          echo "<li>" .$temp_date ."</li>";
      }
  ?>
  </ul>
</div>
<div class= "timeslots-container">
  <ul class="timeslots">
      <li>13<sup>00</li>
      <li>14<sup>00</li>
      <li>15<sup>00</li>
      <li>16<sup>00</li>
      <li>17<sup>00</li>
      <li>18<sup>00</li>
      <li>19<sup>00</li>
  </ul>
</div>
<div class="event-container">
  <div class="slot pauza">
      <span>PAUZA</span><br>
      <span>16:00-16:30</span>
  </div>
  <?php
      include("connect.php");
      $sql = "SELECT * FROM `rezervacije`";
      $rezervacije = mysqli_query($conn, $sql);
      while($row = $rezervacije->fetch_assoc()){
          if($row['date']>=$first_day_of_week && $row['date']<=$last_day_of_week){
              $start = strtotime($row['start_time']);
              $roww = (date("H", $start)-13)*60/5 + date("i", $start)/5;
              $column = date('w', strtotime($row['date']));
              $duration = $row['duration'];
              $end = date("H:i",strtotime('+' .$duration .' minutes', $start));
              $start = date("H:i", $start);
              $group = $row['group'];
              switch($group) {
                  case "Tretmani lica":
                      $color = "#ECDB54";
                      break;
                  case "Depilacija voskom":
                      $color = "#6CA0DC";
                      break;
                  case "Depilacija šećernom pastom":
                      $color = "#944743";
                      break;
                  case "SHR trajna depilacija za žene":
                      $color = "#DBB2D1";
                      break;
                  case "SHR trajna depilacija za muškarce":
                      $color = "#EC9787";
                      break;
                  case "Fibroblast (plazma) tretman: nekirurško zatezanje kože":
                      $color = "#00A68C";
                      break;
                  case "Pedikura":
                      $color = "#645394";
                      break;
                  case "Obrve":
                      $color = "#6C4F3D";
                      break;
                  case "Trepavice":
                      $color = "#EBE1DF";
                      break;
                  case "HIFU tretmani":
                      $color = "#BC6CA7";
                      break;
                  case "Tretmani tijela":
                      $color = "#BFD833";
                      break;
              }
              $from_to = $start ."-" .$end;
              $style = "height:" .$duration . "px; grid-row:" .$roww ."; grid-column:" .$column ."/" .$column ."; background: " .$color .";";
              $additional_info = $row['name'] .", " .$row['email'] .", " .$row['number'];
              echo "<div class='slot' style='" .$style ."'><a href='' style='text-decoration:none; color=black;' title='" .$additional_info ."'>" .$row['treatment'] ."(" .$from_to .")</a></div>";
          }
      }
  ?>
</div>
</div>


<footer class="footer">
        <div class="social">
            <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
        <div class="desc">Copyright &copy; 2022 - Kozmetički salon Klupsy</div>
    </footer>

    <script src="index.js"></script>
</body>

</html>
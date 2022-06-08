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
    <title>Rezervacija</title>
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

    <?php
        include("connect.php");
    ?>

    <form action="insert.php" method="post" class="content">
      <div>
          <label>Ime i prezime:<input name="name" id="name" type="text" required></label>
      </div>
      <div>
          <label>E-mail:<input name="email" id="email" type="email"></label>
      </div>
      <div>
          <label>Broj telefona:<input name="telephone" id="telephone" type="tel" required></label>
      </div>
      <script>
      //function groupChange(str){
       /* if(window.XMLHttpRequest){
            xmlHttp = new XMLHttpRequest();
        }
        else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
            if (this.readyState==4 & this.status==200){
                document.getElementById('treatment').innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "helper.php?value="+str, true);
        xmlhttp.send();*/
        /*sql = "SELECT * FROM tretmani WHERE group="+str;
        $.ajax({
            url: "rezervacija.php",
            method: "GET",
            data: { "sql": sql }
        })*/

        // onchange = "groupChange(this.value)" u group select
      //}
      </script>

      <div>
          <label>Vrsta tretmana:
              <select name="group" id="group">
                  <option value="select">Odaberi vrstu tretmana</option>
                  <?php
                    $sql = "SELECT * FROM tretmani";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                    if($old_res != $row['group']) echo "<option value='". $row['group']. "'>" . $row['group']. "</option>";
                    $old_res = $row['group'];
                }
                    ?>
              </select>
          </label>
      </div>
      <div>
          <label>Tretman:
            <select name="treatment" id="treatment">
                <option value>Odaberi tretman</option>
                <?php
                    //$group = $_REQUEST['group'];
                    //$sql = "SELECT * FROM tretmani WHERE group=$group"; //$_GET["sql"];
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='". $row['treatment']. "'>" . $row['treatment']. "</option>";
                    }
                ?>
            </select>
          </label>
      </div>
      <div>
          <label>Datum:<input name="date" id="date" type="date" required></label>
      </div>
      <div>
          <label>Vrijeme:<input name="time" id="time" type="time" required></label>
      </div>
      <button type="submit">Rezerviraj</button>
  </form>

</html>
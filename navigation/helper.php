<?php
include("connect.php");
$sql = $_GET["sql"];
echo "$sql";
//$val_M = mysql_real_escape_string($conn, $val);
//echo "$val_M";
//$sql = "SELECT * FROM tretmani WHERE group='$val_M'";
$result = mysqli_query($conn, $sql);
if (mysql_num_rows($result)>0){
    echo "<div>";
    echo "<label>Tretman:";
    echo "<select name='treatment' id='treatment'>";
    echo "<option value='select'>Odaberi tretman</option>";
    while($row = $result->fetch_assoc()) {
        echo "<option value='". $row['treatment']. "'>" . $row['treatment']. "</option>";
    }
    echo "</select>";
    echo "</label>";
    echo "</div>";
}
else{
    echo "No results!!!!!!";
}
?>
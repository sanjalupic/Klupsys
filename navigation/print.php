<?php
include("connect.php");
$sql = "SELECT * FROM tretmani";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "group: " . $row["group"]. " - Treatment: " . $row["treatment"]. ", duration: " . $row["duration"]. "<br>";
    echo "\n";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
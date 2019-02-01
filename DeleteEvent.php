<?php
# Connection data
$server = "ix.cs.uoregon.edu";
$user = "guest";
$pass = "guest";
$dbname = "calendar";
$port = "3728";

# Open database connection
$conn = mysqli_connect($server, $user, $pass, $dbname, $port) or die('Error connecting to MySQL server.');

# Start new session
session_start();


$query = "SELECT * FROM calendar.event WHERE event_id = ".$_SESSION["event_id"];
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$event1 = mysqli_fetch_array($result, MYSQLI_BOTH);

echo "<p align='left'>".$event1['event_id']."  ".$event1['name']."  "."</p>";

?>
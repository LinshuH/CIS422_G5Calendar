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

echo "SESSION['event_id'] is: ".$_SESSION["event_id"];

$query = "SELECT * FROM calendar.event LIMIT 10";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));


//echo "<p align='left'>".$event1['event_id']."  ".$event1['name']."  "."</p>";
# https://stackoverflow.com/questions/17114975/finding-the-id-of-the-clicked-element

while($event1 = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    echo '<div class = "list_item_class" id="'.$event1['event_id'].'">'.$event1['event_id']."  ".$event1['name'].'</li><br />';

}
?>

<html>
<p> Testing transfering data </p>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

    $('.list_item_class').click(function(){
    console.log(this.id);
    });

</script>
</head>
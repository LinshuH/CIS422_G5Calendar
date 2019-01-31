<!DOCTYPE html>
<!-- Authors: Holly -->
<!-- This PHP file gets information for editing an event -->
<!-- Reference: URL: https://www.w3schools.com/html/html_tables.asp -->
<!-- Reference: URL: https://blackswan.ch/archives/811 -->
<html>
<body>

<!-- Style for calendar -->
<style>
table { width:75%; height:75%; border-collapse: collapse; }
th { text-align: right; }
td { width:100px; height:100px; text-align: right; border: 1px solid black; border-collapse: collapse; vertical-align: top; }
</style>

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
header('Cache-Control: no cache'); 
session_cache_limiter('private_no_expire'); 
session_start();
# Query to get current month info
$current_index = $_SESSION['current_index'];
$_SESSION['current_index'] = $current_index;
# Display the list of events to edit
echo "<font size ='16'><b>Edit Event</b></font>";
echo "<form action='EditEvent.php' method ='POST'>
<br>Choose an event to edit:<br>";
$query = "SELECT * FROM calendar.event";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$event = mysqli_fetch_array($result, MYSQLI_BOTH);
echo "<select name='event_id'>";
while ($event = mysqli_fetch_array($result, MYSQLI_BOTH))
{
	echo "<option value='".$event['event_id']."'>".$event['name']."</option>";
}
echo "</select><br><input type='submit' value='submit'></form>";
# Close database connection
mysqli_free_result($result);
mysqli_close($conn);
?>

</body>
</html>

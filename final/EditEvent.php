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
session_start();
# Get event id for database purposes
$event_id = $_POST['event_id'];
$event_id = mysqli_real_escape_string($conn, $event_id);
$_SESSION['event_id'] = $event_id;
$query = "SELECT * FROM calendar.event WHERE event_id = ".$event_id;
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$event = mysqli_fetch_array($result, MYSQLI_BOTH);
# Query to get current month info
header('Cache-Control: no cache'); 
session_cache_limiter('private_no_expire'); 
$current_index = $_SESSION['current_index'];
$_SESSION['current_index'] = $current_index;
# Display the event's current information
echo "<font size ='16'><b>Edit Event</b></font>";
echo "<br>Current event name: ".$event['name'];
echo "<br>Current event start date: ".$event['start_date'];
if ($event['start_minute'] < '10')
   echo "<br>Current event start time (24 Hour Clock): ".$event['start_hour'].":0".$event['start_minute'];
else
   echo "<br>Current event start time: ".$event['start_hour'].":".$event['start_minute'];
echo "<br>Current event end date (24 Hour Clock): ".$event['start_date'];
if ($event['end_minute'] < '10')
   echo "<br>Current event end time (24 Hour Clock): ".$event['end_hour'].":0".$event['end_minute'];
else
   echo "<br>Current event end time (24 Hour Clock): ".$event['end_hour'].":".$event['end_minute'];
echo "<br>Current event description: ".$event['description'];
echo "<br>Current event priority: ".$event['priority'];
echo "<br>Current event category: ".$event['categories'];

# Close database connection
mysqli_free_result($result);
mysqli_close($conn);
?>

<?php
# Include input to get edited event's info
include 'geteditinfo.php';
?>

</body>
</html>

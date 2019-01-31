<!DOCTYPE html>
<!-- Authors: Holly -->
<!-- This PHP file gets information for deleting an event -->
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
# Get event id for database purposes
$event_id = $_POST['event_id'];
$event_id = mysqli_real_escape_string($conn, $event_id);
$_SESSION['event_id'] = $event_id;
$query = "SELECT * FROM calendar.event WHERE event_id = ".$event_id;
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$event = mysqli_fetch_array($result, MYSQLI_BOTH);
# Query to get current month info
$current_index = $_SESSION['current_index'];
$_SESSION['current_index'] = $current_index;
# Display the event's current information
echo "<font size ='16'><b>Delete Event</b></font>";
echo "<br>Event name: ".$event['name'];
echo "<br>Event start date: ".$event['start_date'];
if ($event['start_minute'] < '10')
   echo "<br>Event start time: ".$event['start_hour'].":0".$event['start_minute'];
else
   echo "<br>Event start time: ".$event['start_hour'].":".$event['start_minute'];
echo "<br>Event end date: ".$event['start_date'];
if ($event['end_minute'] < '10')
   echo "<br>Event end time: ".$event['end_hour'].":0".$event['end_minute'];
else
   echo "<br>Event end time: ".$event['end_hour'].":".$event['end_minute'];
echo "<br>Event description: ".$event['description'];
echo "<form action='DeleteEventToDatabase.php' method ='POST'><input type='submit' value='submit'></form><br>";
# Close database connection
mysqli_free_result($result);
mysqli_close($conn);

# Include buttons (next month, previous month, add event, edit event, delete event
include 'buttons.php';
?>

</body>
</html>

<!DOCTYPE html>
<!-- Authors: Holly -->
<!-- This PHP file adds information to the database -->
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
# Create an event id for database purposes
$query = "SELECT MAX(event_id) AS event_id FROM calendar.event";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$event_id = $row['event_id'] + 1;
# Get information from previous page
include 'getinfo.php';
# Insert event into table
include 'addquery.php';
# Close database connection
mysqli_close($conn);
?>

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
$current_query = "SELECT * FROM calendar.month WHERE month_id = ".$current_index;
$current_result = mysqli_query($conn, $current_query) or die (mysqli_error($conn));
$current_month = mysqli_fetch_array($current_result, MYSQLI_BOTH);
# Query to get previous month info
$prev_index = $current_index - 1;
$prev_query = "SELECT * FROM calendar.month WHERE month_id = ".$prev_index;
$prev_result = mysqli_query($conn, $prev_query) or die (mysqli_error($conn));
$prev_month = mysqli_fetch_array($prev_result, MYSQLI_BOTH);
# Query to get next month info
$next_index = $current_index + 1;
$next_query = "SELECT * FROM calendar.month WHERE month_id = ".$next_index;
$next_result = mysqli_query($conn, $next_query) or die (mysqli_error($conn));
$next_month = mysqli_fetch_array($next_result, MYSQLI_BOTH);
# Include the calendar
include 'calendar.php';
# Include buttons (next month, previous month, add event, edit event, delete event
include 'buttons.php';
?>

</body>
</html>

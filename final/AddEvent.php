<!DOCTYPE html>
<!-- Authors: Holly -->
<!-- This PHP file gets information for adding an event -->
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
echo "<font size ='16'><b>Add Event</b></font>";
?>

<?php
# Include input to get event info
include 'getaddinfo.php';
# Include buttons (next month, previous month, add event, edit event, delete event
include 'buttons.php';
?>

</body>
</html>

<!DOCTYPE html>
<!-- Authors: Holly -->
<!-- This PHP file gets information for adding an event -->
<!-- [0]: Reference. URL: https://www.w3schools.com/html/html_tables.asp -->
<!-- [1]: Reference. URL: https://blackswan.ch/archives/811 -->
<html>
<body>

<!-- Style for calendar [0] -->
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
# Open database connection to MySQL server
$conn = mysqli_connect($server, $user, $pass, $dbname, $port) or die('Error connecting to MySQL server.');
# Start new session [1]
header('Cache-Control: no cache'); 
session_cache_limiter('private_no_expire'); 
session_start();
# Pass along the index of the current month being displayed
$current_index = $_SESSION['current_index'];
$_SESSION['current_index'] = $current_index;
# Display the purpose of the page (Add Event)
echo "<font size ='16'><b>Add Event</b></font>";
# Include input to get event info
include 'getaddinfo.php';
?>

</body>
</html>

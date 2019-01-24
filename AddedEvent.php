<!DOCTYPE html>
<!-- Reference: URL: https://www.w3schools.com/html/html_tables.asp -->
<!-- Reference: Egerton, John. URL: https://stackoverflow.com/questions/7992198/html-how-to-make-2-tables-with-different-css -->
<html>
<body>

<!-- Style for calednar 'table' -->
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
$conn = mysqli_connect($server, $user, $pass, $dbname, $port) or die('Error connecting to MySQL server.');
session_start();


$id = 1;
$query = "SELECT * FROM calendar.event";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
	$id = $id + 1;
}

$name = $_POST['name'];
$name = mysqli_real_escape_string($conn, $name);
$start_date = $_POST['start_date'];
$start_date = mysqli_real_escape_string($conn, $start_date);
$end_date = $_POST['end_date'];
$end_date = mysqli_real_escape_string($conn, $end_date);
$start_hour = $_POST['start_hour'];
$start_hour = mysqli_real_escape_string($conn, $start_hour);
$start_minute = $_POST['start_minute'];
$start_minute = mysqli_real_escape_string($conn, $start_minute);
$end_hour = $_POST['end_hour'];
$end_hour = mysqli_real_escape_string($conn, $end_hour);
$end_minute = $_POST['end_minute'];
$end_minute = mysqli_real_escape_string($conn, $end_minute);
$description = $_POST['description'];
$description = mysqli_real_escape_string($conn, $description);

$sql = "INSERT INTO `calendar`.`event` (`event_id`, `name`, `start_date`, `start_hour`, `start_minute`, `end_date`, `end_hour`, `end_minute`, `description`) VALUES ('$id', '$name', '$start_date', '$start_hour', '$start_minute', '$end_date', '$end_hour', '$end_minute', '$description');";

$conn->query($sql);
?>

<?php
# Connection data
$server = "ix.cs.uoregon.edu";
$user = "guest";
$pass = "guest";
$dbname = "calendar";
$port = "3728";
$conn = mysqli_connect($server, $user, $pass, $dbname, $port) or die('Error connecting to MySQL server.');
session_start();

# Query to get previous month info
$pm = $_SESSION['pm'];
$_SESSION['cm'] = $cm;
$_SESSION['pm'] = $pm;
$pm = $_SESSION['pm'];
$query = "SELECT * FROM calendar.month WHERE month_id = ".$pm;
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$prev_month = mysqli_fetch_array($result, MYSQLI_BOTH);

# Query to get next month info
$cm = $_SESSION['cm'];
$_SESSION['cm'] = $cm;
$cm = $_SESSION['cm'];
$query = "SELECT * FROM calendar.month WHERE month_id = ".$cm;
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$month = mysqli_fetch_array($result, MYSQLI_BOTH);

# Display the month and year
echo "<font size ='16'><b>".$month['name']."</b> ".$month['year']."</font>";

# Display the day names
echo "<table>";
echo "<tr>";
echo "<th>Sun</th>";
echo "<th>Mon</th>";
echo "<th>Tue</th>";
echo "<th>Wed</th>";
echo "<th>Thu</th>";
echo "<th>Fri</th>";
echo "<th>Sat</th>";
echo"</tr>";

# Display the days in the previous month
echo "<tr>";
for ($i = ($prev_month['num_days'] - $month['days_before']) + 1; $i <= $prev_month['num_days']; $i++)
{
	echo "<td><font color='grey'>".$i."</font></td>";
}
# Display the days in the current month
for ($i = 1; $i <= $month['num_days']; $i++)
{
	if (($month['days_before'] + $i - 1) % 7 == 0)
	{
		echo "</tr>";
		echo "<tr>";
	}
	echo "<td>".$i."</td>";
}
# Display the days in the next month
for ($i = 1; $i <= $month['days_after']; $i++)
{
	echo "<td><font color='grey'>".$i."</font></td>";
}
echo "</tr>";
echo "</table>";

mysqli_free_result($result);
mysqli_close($conn);
?>

<!-- Possible interactions with user -->
<form action="NextMonth.php" method ="POST">
<input type="submit" value="Next Month">
</form>
<form action="PreviousMonth.php" method ="POST">
<input type="submit" value="Previous Month">
</form>
<form action="AddEvent.php" method ="POST">
<input type="submit" value="Add Event">
</form>
<form action="EditEvent.php" method ="POST">
<input type="submit" value="Edit Event">
</form>
<form action="DeleteEvent.php" method ="POST">
<input type="submit" value="Delete Event">
</form>

</body>
</html>

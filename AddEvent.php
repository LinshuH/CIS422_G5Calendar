<!DOCTYPE html>
<!-- Authors: Holly -->
<!-- This PHP file displays a calendar and adds an event -->
<!-- Reference: URL: https://www.w3schools.com/html/html_tables.asp -->
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

# Query to get previous month info
$pm = $_SESSION['pm'];
$_SESSION['pm'] = $pm;
$query = "SELECT * FROM calendar.month WHERE month_id = ".$pm;
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$prev_month = mysqli_fetch_array($result, MYSQLI_BOTH);

# Query to get current month info
$cm = $_SESSION['cm'];
$_SESSION['cm'] = $cm;
$query = "SELECT * FROM calendar.month WHERE month_id = ".$cm;
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$month = mysqli_fetch_array($result, MYSQLI_BOTH);

# Query to get next month info
$nm = $_SESSION['nm'];
$_SESSION['nm'] = $nm;
$query = "SELECT * FROM calendar.month WHERE month_id = ".$nm;
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$next_month = mysqli_fetch_array($result, MYSQLI_BOTH);

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
echo  "</tr>";

# Display the days in the previous month
echo "<tr>";
for ($i = ($prev_month['num_days'] - $month['days_before']) + 1; $i <= $prev_month['num_days']; $i++)
{
    echo "<td><font color='grey'>".$i;

    $query1 = "SELECT * FROM calendar.event WHERE start_date = '".$prev_month['year']."-".$prev_month['month']."-".$i."'";
    $result1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
    while ($event1 = mysqli_fetch_array($result1, MYSQLI_BOTH))
    {
        echo "<p align='left'>".$event1['name']."</p>";
    }
    echo "</font></td>";
}

# Display the days in the current month
for ($i = 1; $i <= $month['num_days']; $i++)
{
    if (($month['days_before'] + $i - 1) % 7 == 0)
    {
        echo "</tr>";
        echo "<tr>";
    }
    echo "<td>".$i;

    $query1 = "SELECT * FROM calendar.event WHERE start_date = '".$month['year']."-".$month['month']."-".$i."'";
    $result1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
    while ($event1 = mysqli_fetch_array($result1, MYSQLI_BOTH))
    {
        echo "<p align='left'>".$event1['name']."</p>";
    }
    echo "</td>";
}

# Display the days in the next month
for ($i = 1; $i <= $month['days_after']; $i++)
{
    echo "<td><font color='grey'>".$i;
    $query1 = "SELECT * FROM calendar.event WHERE start_date = '".$next_month['year']."-".$next_month['month']."-".$i."'";
    $result1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
    while ($event1 = mysqli_fetch_array($result1, MYSQLI_BOTH))
    {
        echo "<p align='left'>".$event1['name']."</p>";
    }
    echo "</font></td>";
}
echo "</tr>";
echo "</table>";

# Close database connection
mysqli_free_result($result);
mysqli_close($conn);
?>

<!-- Get Information for Adding an Event -->
<form action="AddedEvent.php" method ="POST">
New Event:<br><input type="text" name="name"><br>
Starting Date (YYYY/MM/DD):<br><input type="text" name="start_date"><br>
Start Time: <br>
<select name="start_hour">
  <option value="00">12 AM</option>
  <option value="1">1 AM</option>
  <option value="2">2 AM</option>
  <option value="3">3 AM</option>
  <option value="4">4 AM</option>
  <option value="5">5 AM</option>
  <option value="6">6 AM</option>
  <option value="7">7 AM</option>
  <option value="8">8 AM</option>
  <option value="9">9 AM</option>
  <option value="10">10 AM</option>
  <option value="11">11 AM</option>
  <option value="12">12 PM</option>
  <option value="13">1 PM</option>
  <option value="14">2 PM</option>
  <option value="15">3 PM</option>
  <option value="16">4 PM</option>
  <option value="17">5 PM</option>
  <option value="18">6 PM</option>
  <option value="19">7 PM</option>
  <option value="20">8 PM</option>
  <option value="21">9 PM</option>
  <option value="22">10 PM</option>
  <option value="23">11 PM</option>
</select>
<select name="start_minute">
  <option value="00">00</option>
  <option value="15">15</option>
  <option value="30">30</option>
  <option value="45">45</option>
</select>
<br>
Ending Date (YYYY/MM/DD):<br><input type="text" name="end_date"><br>
End Time: <br>
<select name="end_hour">
  <option value="00">12 AM</option>
  <option value="1">1 AM</option>
  <option value="2">2 AM</option>
  <option value="3">3 AM</option>
  <option value="4">4 AM</option>
  <option value="5">5 AM</option>
  <option value="6">6 AM</option>
  <option value="7">7 AM</option>
  <option value="8">8 AM</option>
  <option value="9">9 AM</option>
  <option value="10">10 AM</option>
  <option value="11">11 AM</option>
  <option value="12">12 PM</option>
  <option value="13">1 PM</option>
  <option value="14">2 PM</option>
  <option value="15">3 PM</option>
  <option value="16">4 PM</option>
  <option value="17">5 PM</option>
  <option value="18">6 PM</option>
  <option value="19">7 PM</option>
  <option value="20">8 PM</option>
  <option value="21">9 PM</option>
  <option value="22">10 PM</option>
  <option value="23">11 PM</option>
</select>
<select name="end_minute">
  <option value="00">00</option>
  <option value="15">15</option>
  <option value="30">30</option>
  <option value="45">45</option>
</select>
<br>
Description:<br><input type="text" name="description"><br>
<input type="submit" value="submit">
</form>
<br><br>

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


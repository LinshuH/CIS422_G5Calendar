<!DOCTYPE html>
<html>
<body>

<!-- Reference: 'sandre89' https://stackoverflow.com/questions/1184334/get-number-days-in-a-specified-month-using-javascript -->
<script>
function DaysInMonth(month, year)
{
  return new Date(year, month, 0).getDate();
}
var numDays = DaysInMonth(1, 2019);
</script>

<!--  Display current month -->
<!-- Reference: 'Teh' @ https://stackoverflow.com/questions/1643320/get-month-name-from-date -->
<header>
<font size="16">
<b>
<script>
const MonthNames = ["January", "February", "March", "April", "May", "June", "July",
                   "August", "September", "October", "Novmeber", "December"];
var d = new Date();
var month = MonthNames[d.getMonth()];
document.write(month);
document.write(" ");
</script>
</b>

<!-- Display current year -->
<!-- Reference: https://www.w3schools.com/jsref/jsref_getfullyear.asp -->
<script>
var d = new Date();
var year = d.getFullYear();
document.write(year);
</script>
</font>
</header>

<!-- Style for table -->
<!-- Reference: https://www.w3schools.com/html/html_tables.asp -->
<style>
table { width:75%; height:75%; border-collapse: collapse; }
</style>

<!-- Style for header cells -->
<!-- Reference: https://www.w3schools.com/html/html_tables.asp -->
<style>
th { text-align: right; }
</style>

<!-- Style for cells -->
<!-- Reference: https://www.w3schools.com/html/html_tables.asp -->
<style>
td { width:100px; height:100px; text-align: right; border: 1px solid black; border-collapse: collapse; vertical-align: top; }
</style>

<!--  Table for day names -->
<!-- Reference: https://www.w3schools.com/html/html_tables.asp -->
<table>
  <tr>
    <th>Sun</th>
    <th>Mon</th>
    <th>Tue</th>
    <th>Wed</th>
    <th>Thu</th>
    <th>Fri</th>
    <th>Sat</th>
  </tr>
  <tr>
    <td><font color="grey">30</font></td>
    <td><font color="grey">31</font></td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
  </tr>
  <tr>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
  </tr>
  <tr>
    <td>13</td>
    <td>14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>
    <td>19</td>
  </tr>
  <tr>
    <td>20</td>
    <td>21</td>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
  </tr>
  <tr>
    <td>27</td>
    <td>28</td>
    <td>29</td>
    <td>30</td>
    <td>31</td>
    <td><font color="grey">1</font></td>
    <td><font color="grey">2</font></td>
  </tr>
</table>

<!-- Code from Yiming -->
<form action="">
New Event:<br>
<input type="text" name="name">
<br>
Starting Date (YYYY/MM/DD):<br>
<input type="text" name="start_date">
<br>
Starting Time (Hour):<br>
<input type="text" name="start_hour">
<br>
Starting Time (Minutes):<br>
<input type="text" name="start_minute">
<br>
Ending Date (YYYY/MM/DD):<br>
<input type="text" name="end_date">
<br>
Ending Time (Hour):<br>
<input type="text" name="end_hour">
<br>
Ending Time (Minutes):<br>
<input type="text" name="end_minute">
<br>
Description:<br>
<input type="text" name="description">
<br>
</form>
<input type="submit" value="submit"><br>
<br><br>

<?php
$server = "ix.cs.uoregon.edu";
$user = "guest";
$pass = "guest";
$dbname = "calendar";
$port = "3728";
$conn = mysqli_connect($server, $user, $pass, $dbname, $port) or die('Error connecting to MySQL server.');

$query = "SELECT * FROM calendar.month";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
echo "Months:<br>";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
	echo $row['name'];
	echo "<br>";
}
echo "<br>";

$query = "SELECT * FROM calendar.event";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
echo "Events:<br>";
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH))
{
	echo "Event name: ";
	echo $row['name'];
	echo "<br>Start date: ";
	echo $row['start_date'];
	echo "<br>";
	echo "Start time: ";
	echo $row['start_hour'];
	echo ":";
	if ($row['start_minute'] == 0)
		echo "00";
	else
		echo $row['start_minute'];
	echo "<br>";
	echo "End date: ";
	echo $row['end_date'];
	echo "<br>";
	echo "End time: ";
	echo $row['end_hour'];
	echo ":";
	echo $row['end_minute'];
	echo "<br>";
	echo "Description: ";
	echo $row['description'];
}
echo "<br>";

mysqli_free_result($result);
mysqli_close($conn);
?>

</body>
</html>

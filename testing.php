<!DOCTYPE html>
<!-- Authors: Holly -->
<!-- This PHP file displays a calendar and displays events -->
<!-- Reference: URL: https://www.w3schools.com/html/html_tables.asp -->
<!-- Copied exact code from: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_js_dropdown for drop down menu -->
<html>
<body>

<!-- Style for calendar -->
<style>
table { width:75%; height:75%; border-collapse: collapse; }
th { text-align: right; }
td { width:100px; height:100px; text-align: right; border: 1px solid black; border-collapse: collapse; vertical-align: top; }
</style>

<style>
.dropbtn
{
  background-color: lightgray;
  color: black;
  padding: 3px;
  border: none;
  cursor: pointer;
}

.dropdown
{
  float: right;
  position: absolute;
  display: inline-block;
}

.dropdown-content
{
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  right: 0;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 3px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block; display:relative; }
</style>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

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
$pm = 0;
$query = "SELECT * FROM calendar.month WHERE month_id = ".$pm;
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$prev_month = mysqli_fetch_array($result, MYSQLI_BOTH);

# Query to get current month info
$cm = 1;
$_SESSION['cm'] = $cm;
$query = "SELECT * FROM calendar.month WHERE month_id = ".$cm;
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$month = mysqli_fetch_array($result, MYSQLI_BOTH);

# Query to get next month info
$nm = 2;
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
    echo "<td><font color='grey'>".$i."<br>";

    $query1 = "SELECT * FROM calendar.event WHERE start_date = '".$prev_month['year']."-".$prev_month['month']."-".$i."'";
    $result1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
    while ($event1 = mysqli_fetch_array($result1, MYSQLI_BOTH))
    {
         echo "<div class='dropdown'><button onclick='myFunction()' class='dropbtn'>".$event1['name']."</button>
                 <div id='myDropdown' class='dropdown-content'>
                 <a href='http://ix.cs.uoregon.edu/~dbeeman/422/CIS422_G5Calendar/EditEvent.php'>Edit</a>
                 <a href='http://ix.cs.uoregon.edu/~dbeeman/422/CIS422_G5Calendar/DeleteEvent.php'>Delete</a>
               </div>
               </div><br>";    
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
    echo "<td>".$i."<br>";

    $query1 = "SELECT * FROM calendar.event WHERE start_date = '".$month['year']."-".$month['month']."-".$i."'";
    $result1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
    while ($event1 = mysqli_fetch_array($result1, MYSQLI_BOTH))
    {
   	    echo "<div class='dropdown'><button onclick='myFunction()' class='dropbtn'>".$event1['name']."</button>
                 <div id='myDropdown' class='dropdown-content'>
                 <a href='http://ix.cs.uoregon.edu/~dbeeman/422/CIS422_G5Calendar/EditEvent.php'>Edit</a>
                 <a href='http://ix.cs.uoregon.edu/~hhardin/CIS422_G5Calendar/DeleteEvent.php'>Delete</a>
               </div>
               </div><br>";    
    }
    echo "</td>";
}

# Display the days in the next month
for ($i = 1; $i <= $month['days_after']; $i++)
{
    echo "<td><font color='grey'>".$i."<br>";
    $query1 = "SELECT * FROM calendar.event WHERE start_date = '".$next_month['year']."-".$next_month['month']."-".$i."'";
    $result1 = mysqli_query($conn, $query1) or die (mysqli_error($conn));
    while ($event1 = mysqli_fetch_array($result1, MYSQLI_BOTH))
    {
   	    echo "<div class='dropdown'><button onclick='myFunction()' class='dropbtn'>".$event1['name']."</button>
                 <div id='myDropdown' class='dropdown-content'>
                 <a href='http://ix.cs.uoregon.edu/~dbeeman/422/CIS422_G5Calendar/EditEvent.php'>Edit</a>
                 <a href='http://ix.cs.uoregon.edu/~hhardin/CIS422_G5Calendar/DeleteEvent.php'>Delete</a>
               </div>
               </div><br>";    
    }
    echo "</font></td>";
}
echo "</tr>";
echo "</table>";

# Close database connection
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

<!DOCTYPE html>
<!-- 
Authors: Holly Linshu
Generate Date: 1/30/2019
Function:
    This PHP file mainly read the current month events from the database. 
    Meanwhile, the calendar grid may contain few days from the last month and this month. This file also handle these considerations.
Citation:
    [0]: Reference. URL:  https://www.w3schools.com/html/html_tables.asp 
-->

<!-- Style for calendar -->
<style>
table { width:75%; height:75%; border-collapse: collapse; }
th { text-align: right; }
td { width:100px; height:100px; text-align: right; border: 1px solid black; border-collapse: collapse; vertical-align: top; }
re { width:100px; height:100px; text-align: right; float:right; margin-top:0px;}
</style>

<?php
# Display the month and year
echo "<font size ='16'><b>".$current_month['name']."</b> ".$current_month['year']."</font>";
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

echo "<re><p align='left' style='background-color:red;'>High Priority</p></re>";
echo "<re><p align='left' style='background-color:orange;'>Medium Priority</p></re>";
echo "<re><p align='left' style='background-color:lightsalmon;'>Low Priority</p></re>";

# Display the days in the previous month
echo "<tr>";
for ($i = ($prev_month['num_days'] - $current_month['days_before']) + 1; $i <= $prev_month['num_days']; $i++)
{
    echo "<td><font color='grey'>".$i;
    $query = "SELECT * FROM calendar.event WHERE start_date = '".$prev_month['year']."-".$prev_month['month']."-".$i."'";
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
    while ($event = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        if ($event['priority'] == 'High') {
            echo "<p align='left' style='background-color:red;'>".$event['name']. "</p><br>";
        }
        elseif($event['priority'] == 'Medium') {
            echo "<p align='left' style='background-color:orange;'>".$event['name']. "</p><br>";
        }
        elseif($event['priority'] == 'Low') {
            echo "<p align='left' style='background-color:lightsalmon;'>".$event['name']. "</p><br>";
        }    
    }
    echo "</font></td>";
    mysqli_free_result($result);
}
# Display the days in the current month
for ($i = 1; $i <= $current_month['num_days']; $i++)
{
    if (($current_month['days_before'] + $i - 1) % 7 == 0)
    {
        echo "</tr>";
        echo "<tr>";
    }
    echo "<td>".$i;
    $query = "SELECT * FROM calendar.event WHERE start_date = '".$current_month['year']."-".$current_month['month']."-".$i."'";
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
    while ($event = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        if ($event['priority'] == 'High') {
            echo "<p align='left' style='background-color:red;'>".$event['name']. "</p><br>";
        }
        elseif($event['priority'] == 'Medium') {
            echo "<p align='left' style='background-color:orange;'>".$event['name']. "</p><br>";
        }
        elseif($event['priority'] == 'Low') {
            echo "<p align='left' style='background-color:lightsalmon;'>".$event['name']. "</p><br>";
        }
    }
    echo "</td>";
    mysqli_free_result($result);
}
# Display the days in the next month
for ($i = 1; $i <= $current_month['days_after']; $i++)
{
    echo "<td><font color='grey'>".$i;
    $query = "SELECT * FROM calendar.event WHERE start_date = '".$next_month['year']."-".$next_month['month']."-".$i."'";
    $result = mysqli_query($conn, $query) or die (mysqli_error($conn));
    while ($event = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        if ($event['priority'] == 'High') {
            echo "<p align='left' style='background-color:red;'>".$event['name']. "</p><br>";
        }
        elseif($event['priority'] == 'Medium') {
            echo "<p align='left' style='background-color:orange;'>".$event['name']. "</p><br>";
        }
        elseif($event['priority'] == 'Low') {
            echo "<p align='left' style='background-color:lightsalmon;'>".$event['name']. "</p><br>";
        }    
    }
    echo "</font></td>";
    mysqli_free_result($result);
}
echo "</tr>";
echo "</table>";
# Close database connection
mysqli_free_result($prev_result);
mysqli_free_result($current_result);
mysqli_free_result($next_result);
mysqli_close($conn);

?>

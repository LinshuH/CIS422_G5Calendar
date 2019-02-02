<!DOCTYPE html>
<html>
<body>

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

echo "SESSION['event_id'] is: ".$_SESSION["event_id"];

$query = "SELECT * FROM calendar.event LIMIT 10";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));


//echo "<p align='left'>".$event1['event_id']."  ".$event1['name']."  "."</p>";
# https://stackoverflow.com/questions/17114975/finding-the-id-of-the-clicked-element

while($event1 = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    echo '<div class = "list_item_class" id="'.$event1['event_id'].'"><button>'.$event1['name']."</button> </div>";
    /*
    echo "<div class='dropdown' id='".$event1['event_id']."'><button onclick='myFunction()' class='dropbtn'>".$event1['name']."</button>
                 <div id='myDropdown' class='dropdown-content'>
                 <a href='EditEvent.php'>Edit</a>
                 <a href='DeleteEvent.php'>Delete</a>
               </div>
               </div><br>";
    */
    //https://stackoverflow.com/questions/20738329/how-to-call-a-php-function-on-the-click-of-a-button
}
?>

<html>
<p> Testing transfering data </p>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

    $('.list_item_class').click(function(){
    console.log(this.id);
    });

</script>
</head>

</body>
</html>
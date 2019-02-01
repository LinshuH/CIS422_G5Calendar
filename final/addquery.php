<!-- Authors: Holly -->
<!-- [0]: Reference. URL: https://www.w3schools.com/php/php_mysql_insert.asp ->

<?php
# Query to insert an event into the database
$sql = "INSERT INTO `calendar`.`event` (`event_id`, `name`, `start_date`, `start_hour`, `start_minute`, `end_date`, `end_hour`, `end_minute`, `description`, `priority`, `categories`) VALUES ('$event_id', '$name', '$start_date', '$start_hour', '$start_minute', '$end_date', '$end_hour', '$end_minute', '$description', '$priority', '$category');";
# Send query to database [0]
$conn->query($sql);
?>

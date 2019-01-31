<?php
$sql = "INSERT INTO `calendar`.`event` (`event_id`, `name`, `start_date`, `start_hour`, `start_minute`, `end_date`, `end_hour`, `end_minute`, `description`) VALUES ('$event_id', '$name', '$start_date', '$start_hour', '$start_minute', '$end_date', '$end_hour', '$end_minute', '$description');";
$conn->query($sql);
?>

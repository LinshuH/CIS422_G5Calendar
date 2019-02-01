<?php
$sql = "INSERT INTO `calendar`.`event` (`event_id`, `name`, `start_date`, `start_hour`, `start_minute`, `end_date`, `end_hour`, `end_minute`, `description`, `priority`, `categories`) VALUES ('$event_id', '$name', '$start_date', '$start_hour', '$start_minute', '$end_date', '$end_hour', '$end_minute', '$description', '$priority', '$category');";
$conn->query($sql);
?>

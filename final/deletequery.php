<?php
$sql = "DELETE FROM `calendar`.`event` WHERE (`event_id` = '$event_id');";
$conn->query($sql);
?>

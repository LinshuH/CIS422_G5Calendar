<!-- 
Authors: Holly 
Generate Date: 1/30/2019
Function: 
    This is the Mysql query is called by "EditEventToDatabase.php".
    It delete event from database first for achieve the "Edit" moduel function.
->

<?php
$sql = "DELETE FROM `calendar`.`event` WHERE (`event_id` = '$event_id');";
$conn->query($sql);
?>

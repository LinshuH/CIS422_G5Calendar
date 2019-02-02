<?php
$name = $_POST['name'];
$name = mysqli_real_escape_string($conn, $name);
$start_year = $_POST['start_year'];
$start_year = mysqli_real_escape_string($conn, $start_year);
$start_month = $_POST['start_month'];
$start_month = mysqli_real_escape_string($conn, $start_month);
$start_day = $_POST['start_day'];
$start_day = mysqli_real_escape_string($conn, $start_day);
$start_date = $start_year."-".$start_month."-".$start_day;
$start_hour = $_POST['start_hour'];
$start_hour = mysqli_real_escape_string($conn, $start_hour);
$start_minute = $_POST['start_minute'];
$start_minute = mysqli_real_escape_string($conn, $start_minute);
$description = $_POST['description'];
$description = mysqli_real_escape_string($conn, $description);
$category = $_POST['category'];
$category = mysqli_real_escape_string($conn, $category);
$priority = $_POST['priority'];
$priority = mysqli_real_escape_string($conn, $priority);
?>

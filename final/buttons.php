<!DOCTYPE html>
<!-- Authors: Holly -->
<!-- This PHP file displays a calendar and displays events -->
<!-- Reference: URL: https://www.w3schools.com/html/html_tables.asp -->
<?php
echo
"<form action='NextMonth.php' method ='POST'>
<input type='submit' value='Next Month'>
</form>
<form action='PreviousMonth.php' method ='POST'>
<input type='submit' value='Previous Month'>
</form>
<form action='AddEvent.php' method ='POST'>
<input type='submit' value='Add Event'>
</form>
<form action='ChooseEventToEdit.php' method ='POST'>
<input type='submit' value='Edit Event'>
</form>
<form action='ChooseEventToDelete.php' method ='POST'>
<input type='submit' value='Delete Event'>
</form>";
?>

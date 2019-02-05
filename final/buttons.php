<!DOCTYPE html>
<!-- 
Authors: Holly 
Generate Date: 1/30/2019
Function: 
    This php file display the function moduel in the whole program. 
    These modeul are displayed in the button forms. Click the button would involke the specific module function.
Citation:
    [0]: Reference. URL: https://www.w3schools.com/html/html_tables.asp 
-->
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

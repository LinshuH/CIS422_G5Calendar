<!-- Authors -->
<!-- [0]: Reference. URL: https://www.w3schools.com/tags/att_button_formmethod.asp -->

<?php
# Display button for going to the next month [0]
echo "<form action='NextMonth.php' method ='POST'><input type='submit' value='Next Month'></form>";
# Display button for going to the previous month [0]
echo "<form action='PreviousMonth.php' method ='POST'><input type='submit' value='Previous Month'></form>";
# Display button for adding an event [0]
echo "<form action='AddEvent.php' method ='POST'><input type='submit' value='Add Event'></form>";
# Display button for choosing an event to edit [0]
echo "<form action='ChooseEventToEdit.php' method ='POST'><input type='submit' value='Edit Event'></form>";
# Display button for choosing an event to delete [0]
echo "<form action='ChooseEventToDelete.php' method ='POST'><input type='submit' value='Delete Event'></form>";
?>

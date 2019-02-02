<?php
echo
"<!-- The information is sent to EditEventToDatabase.php -->
<form action='EditEventToDatabase.php' method ='POST'>
<!-- A text field to allow the user input the name of an event -->
<br>Event Name:<br><input type='text' name='name'>
<br>
<<<<<<< HEAD
<br>Starting Date (YYYY/MM/DD):<br>
<!-- A drop down menu allowing the user select a year -->
=======
<br>Date (YYYY/MM/DD):<br>
>>>>>>> Daniel
<select name='start_year'>
  <option value='2019'>2019</option>
  <option value='2020'>2020</option>
  <option value='2021'>2021</option>
  <option value='2022'>2022</option>
</select>
<!-- A drop down menu allowing the user select a month -->
<select name='start_month'>
  <option value='01'>January</option>
  <option value='02'>February</option>
  <option value='03'>March</option>
  <option value='04'>April</option>
  <option value='05'>May</option>
  <option value='06'>June</option>
  <option value='07'>July</option>
  <option value='08'>August</option>
  <option value='09'>September</option>
  <option value='10'>October</option>
  <option value='11'>November</option>
  <option value='12'>December</option>
</select>
<!-- A drop down menu allowing the user select a day -->
<select name='start_day'>
  <option value='01'>1</option>
  <option value='02'>2</option>
  <option value='03'>3</option>
  <option value='04'>4</option>
  <option value='05'>5</option>
  <option value='06'>6</option>
  <option value='07'>7</option>
  <option value='08'>8</option>
  <option value='09'>9</option>
  <option value='10'>10</option>
  <option value='11'>11</option>
  <option value='12'>12</option>
  <option value='13'>13</option>
  <option value='14'>14</option>
  <option value='15'>15</option>
  <option value='16'>16</option>
  <option value='17'>17</option>
  <option value='18'>18</option>
  <option value='19'>19</option>
  <option value='20'>20</option>
  <option value='21'>21</option>
  <option value='22'>22</option>
  <option value='23'>23</option>
  <option value='24'>24</option>
  <option value='25'>25</option>
  <option value='26'>26</option>
  <option value='27'>27</option>
  <option value='28'>28</option>
  <option value='29'>29</option>
  <option value='30'>30</option>
  <option value='31'>31</option>
</select>
<<<<<<< HEAD
<br>Start Time: <br>
<!-- A drop down menu allowing the user select a starting hour of the event -->
=======
<br>Time: <br>
>>>>>>> Daniel
<select name='start_hour'>
  <option value='00'>12 AM</option>
  <option value='1'>1 AM</option>
  <option value='2'>2 AM</option>
  <option value='3'>3 AM</option>
  <option value='4'>4 AM</option>
  <option value='5'>5 AM</option>
  <option value='6'>6 AM</option>
  <option value='7'>7 AM</option>
  <option value='8'>8 AM</option>
  <option value='9'>9 AM</option>
  <option value='10'>10 AM</option>
  <option value='11'>11 AM</option>
  <option value='12'>12 PM</option>
  <option value='13'>1 PM</option>
  <option value='14'>2 PM</option>
  <option value='15'>3 PM</option>
  <option value='16'>4 PM</option>
  <option value='17'>5 PM</option>
  <option value='18'>6 PM</option>
  <option value='19'>7 PM</option>
  <option value='20'>8 PM</option>
  <option value='21'>9 PM</option>
  <option value='22'>10 PM</option>
  <option value='23'>11 PM</option>
</select>
<!-- A drop down menu allowing the user select a starting minute of the event -->
<select name='start_minute'>
  <option value='00'>00</option>
  <option value='15'>15</option>
  <option value='30'>30</option>
  <option value='45'>45</option>
</select>
<br>
<<<<<<< HEAD
<br>Ending Date (YYYY/MM/DD):<br>
<!-- A drop down menu allowing the user select an ending year of the event -->
<select name='end_year'>
  <option value='2019'>2019</option>
  <option value='2020'>2020</option>
  <option value='2021'>2021</option>
  <option value='2022'>2022</option>
</select>
<!-- A drop down menu allowing the user select an ending month of the event -->
<select name='end_month'>
  <option value='01'>January</option>
  <option value='02'>February</option>
  <option value='03'>March</option>
  <option value='04'>April</option>
  <option value='05'>May</option>
  <option value='06'>June</option>
  <option value='07'>July</option>
  <option value='08'>August</option>
  <option value='09'>September</option>
  <option value='10'>October</option>
  <option value='11'>November</option>
  <option value='12'>December</option>
</select>
<!-- A drop down menu allowing the user select an ending day of the event -->
<select name='end_day'>
  <option value='01'>1</option>
  <option value='02'>2</option>
  <option value='03'>3</option>
  <option value='04'>4</option>
  <option value='05'>5</option>
  <option value='06'>6</option>
  <option value='07'>7</option>
  <option value='08'>8</option>
  <option value='09'>9</option>
  <option value='10'>10</option>
  <option value='11'>11</option>
  <option value='12'>12</option>
  <option value='13'>13</option>
  <option value='14'>14</option>
  <option value='15'>15</option>
  <option value='16'>16</option>
  <option value='17'>17</option>
  <option value='18'>18</option>
  <option value='19'>19</option>
  <option value='20'>20</option>
  <option value='21'>21</option>
  <option value='22'>22</option>
  <option value='23'>23</option>
  <option value='24'>24</option>
  <option value='25'>25</option>
  <option value='26'>26</option>
  <option value='27'>27</option>
  <option value='28'>28</option>
  <option value='29'>29</option>
  <option value='30'>30</option>
  <option value='31'>31</option>
</select>
<!-- A drop down menu allowing the user select an ending hour of the event -->
<br>End Time: <br>
<select name='end_hour'>
  <option value='00'>12 AM</option>
  <option value='1'>1 AM</option>
  <option value='2'>2 AM</option>
  <option value='3'>3 AM</option>
  <option value='4'>4 AM</option>
  <option value='5'>5 AM</option>
  <option value='6'>6 AM</option>
  <option value='7'>7 AM</option>
  <option value='8'>8 AM</option>
  <option value='9'>9 AM</option>
  <option value='10'>10 AM</option>
  <option value='11'>11 AM</option>
  <option value='12'>12 PM</option>
  <option value='13'>1 PM</option>
  <option value='14'>2 PM</option>
  <option value='15'>3 PM</option>
  <option value='16'>4 PM</option>
  <option value='17'>5 PM</option>
  <option value='18'>6 PM</option>
  <option value='19'>7 PM</option>
  <option value='20'>8 PM</option>
  <option value='21'>9 PM</option>
  <option value='22'>10 PM</option>
  <option value='23'>11 PM</option>
</select>
<!-- A drop down menu allowing the user select an ending minute of the event -->
<select name='end_minute'>
  <option value='00'>00</option>
  <option value='15'>15</option>
  <option value='30'>30</option>
  <option value='45'>45</option>
</select>
=======
>>>>>>> Daniel
<br>
<!-- A text field to allow the user to enter a description for the event -->
<br>Description:<br><input type='text' name='description'>
<br><br>Priority:<br>
<!-- A drop down menu allowing the user to select a priority for the event -->
<select name='priority'>
  <option value='Low'>Low</option>
  <option value='Medium'>Medium</option>
  <option value='High'>High</option>
</select>
<br>Category:<br>
<!-- A drop down menu allowing the user to select a category for the event -->
<select name='category'>
  <option value='Work'>Work</option>
  <option value='Home'>Home</option>
  <option value='Play'>Play</option>
</select>
<br><br><input type='submit' value='submit'>
</form>
<br><br>";

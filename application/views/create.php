<?php echo validation_errors(); ?>

<?php echo form_open('http://localhost:8080/index.php/User_details/create'); ?>

<label for="FIRST_NAME">First Name</label>
<input type="text" name="FIRST_NAME" /><br />

<label for="LAST_NAME">Last Name</label>
<input type="text" name="LAST_NAME" /><br />

<label for="PHONE_NUMBER">Phone Number</label>
<input type="number" name="PHONE_NUMBER" min="100000000" max="999999999" /><br />

<label for="EMAIL">E-mail</label>
<input type="text" name="EMAIL" /><br />

<label for="POSITION_ID">Position ID</label>
<?php
 echo form_dropdown ('POSITION_ID',$PositionArray);
 ?>
<label for="supervisor_id">Supervisor </label>
<?php

$supervisors[NULL] = 'Brak przelozonego';
 echo form_dropdown ('supervisor_id',$supervisors);
 ?>

<input type="submit" name="submit" value="Create Employee" />

<?php echo form_close(); ?>
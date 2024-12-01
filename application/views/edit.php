<?php echo validation_errors(); ?>

<?php echo form_open('http://localhost:8080/index.php/User_details/edit/'.$user['ID']); ?>
<h1>Choose what do you want to edit</h1>


<label for="FIRST_NAME">First Name</label>
<input type="text" name="FIRST_NAME" value="<?php echo set_value('FIRST_NAME', $user['FIRST_NAME']); ?>" /><br />

<label for="LAST_NAME">Last Name</label>
<input type="text" name="LAST_NAME" value="<?php echo set_value('LAST_NAME', $user['LAST_NAME']); ?>" /><br />

<label for="PHONE_NUMBER">Phone Number</label>
<input type="number" name="PHONE_NUMBER" value="<?php echo set_value('PHONE_NUMBER', $user['PHONE_NUMBER']); ?>" min="100000000" max="999999999" /><br />

<label for="EMAIL">E-mail</label>
<input type="text" name="EMAIL" value="<?php echo set_value('EMAIL', $user['EMAIL']); ?>" /><br />

<label for="POSITION_ID">Current Position</label>
<p><?php echo isset($PositionArray[$user['POSITION_ID']]) ? $PositionArray[$user['POSITION_ID']] : 'Brak pozycji'; ?></p><br />
<label for="POSITION_ID">Position </label>

<?php
 echo form_dropdown ('POSITION_ID',$PositionArray);
 ?>

<label for="supervisor_id">Supervisor </label>
<?php
$supervisors[NULL] = 'Brak przelozonego';
 echo form_dropdown ('supervisor_id',$supervisors);
 ?>

<input type="submit" name="submit" value="Edit Employee" />

<?php echo form_close(); ?>
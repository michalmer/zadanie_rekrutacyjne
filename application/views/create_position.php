<?php echo validation_errors(); ?>

<?php echo form_open('http://localhost:8080/index.php/Position_details/create'); ?>

<label for="name">Position Name</label>
<input type="text" name="name" /><br />


<input type="submit" name="submit" value="Create Position" />

<?php echo form_close(); ?>
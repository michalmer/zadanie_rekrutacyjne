<?php echo validation_errors(); ?>

<?php echo form_open('http://localhost:8080/index.php/Position_details/edit/'.$Position['ID']); ?>


<label for="name">Position Name</label>
<input type="text" name="name" value="<?php echo set_value('name', $Position['name']); ?>" /><br />

<input type="submit" name="submit" value="Edit Position" />

<?php echo form_close(); ?>
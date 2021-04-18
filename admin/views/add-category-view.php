<?php

$obj_adminBack = new adminBack();
if (isset($_POST['submit'])) {
	$return_mes = $obj_adminBack->add_category($_POST);
	



}

?>


<h1>Add Category</h1><br>

<form action="" method="POST">
	<div class="form-group">
		<label for="ctg_name">Category Name</label>
		<input type="text" name="ctg_name" class="form-control">
		
	</div>
		<div class="form-group">
		<label for="ctg_des">Category Description</label>
		<input type="text" name="ctg_des" class="form-control">
		
	</div>
		<div class="form-group">
		<label for="ctg_stat">Category Status</label>
		<select name="ctg_stat" class="form-control">
			<option value="1">Published</option>
			<option value="0">Unpublished</option>
		</select>
		
	</div>
	<input type="submit" name="submit" value="Add Category" class="btn btn-primary">
	<?php
		if (isset($return_mes)) {
			echo $return_mes;
		}

	?>
	
</form>
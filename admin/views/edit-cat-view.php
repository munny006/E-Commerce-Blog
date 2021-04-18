<?php

$obj_adminBack = new adminBack();
if (isset($_GET['status'])) {
	$get_id = $_GET['id'];
	if ($_GET['status'] == 'edit') {
		$return_data = $obj_adminBack->getCatinfo_toupdate($get_id);
	}
}
if (isset($_POST['u_update_category'])) {
	$return_msg = $obj_adminBack->update_category($_POST);

}
?>

<form action="" method="POST">
<?php
if (isset($return_msg)) {
	echo $return_msg;
}



?>
	<div class="form-group">
	
		<input hidden type="text" name="u_ctg_id" class="form-control" value="<?php echo $return_data['ctg_id'];?>">
		
	</div>
	<div class="form-group">
		<label for="u_ctg_name">Category Name</label>
		<input type="text" name="u_ctg_name" class="form-control" value="<?php echo $return_data['ctg_name'];?>">
		
	</div>
		<div class="form-group">
		<label for="u_ctg_des">Category Description</label>
		<input type="text" name="u_ctg_des" class="form-control"value="<?php echo $return_data['ctg_des'];?>">
		
	</div>
	<input type="submit" name="u_update_category" value="Update Category" class="btn btn-dark">

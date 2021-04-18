<?php
$obj_adminBack = new adminBack();
$ctg_info = $obj_adminBack->display_category();
if (isset($_GET['prostat'])) {
	$id = $_GET['id'];
	if ($_GET['prostat'] == 'edit') {
		$pdt_info = $obj_adminBack->getEditProduct_info($id);

	}

}
if (isset($_POST['u_pdt_btn'])) {

	$update_msg = $obj_adminBack->update_product($_POST);
}


?>
<?php

if (isset($update_msg)) {
	echo $update_msg;
}

?>
<form class="form" method="POST" action="" enctype="multipart/form-data">
	<div class="form-group">
	
		<input hidden type="text" name="u_pdt_id" class="form-control" value="<?php echo $pdt_info['pdt_id'];?>">
		
	</div>
	<div class="form-group">
		<label for="u_pdt_name">Product Name</label>
		<input type="text" name="u_pdt_name" class="form-control" value="<?php echo $pdt_info['pdt_name'];?>">
	</div>
		<div class="form-group">
		<label for="u_pdt_price">Product Price</label>
		<input type="number" name="u_pdt_price" class="form-control" value="<?php echo $pdt_info['pdt_price'];?>">
	</div>
	<div class="form-group">
		<label for="u_pdt_des">Product Description</label>
		<input type="form-control" name="u_pdt_des" class="form-control" value="<?php echo $pdt_info['pdt_des'];?>">
		
	</div>
<div class="form-group">
		<label for="u_pdt_ctg">Product Category</label>
		<select name="u_pdt_ctg" class="form-control">
			<option>Please Select a Category</option>
			<?php 
			while ($ctg = mysqli_fetch_Assoc($ctg_info)) {
			
			?>
			<option value="<?php echo $ctg['ctg_id'];?>"><?php echo $ctg['ctg_name'];?></option>
		<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label for="u_pdt_img">Product Image</label>
		<input type="file" name="u_pdt_img" class="form-control">
	</div>
		<div class="form-group">
		<label for="u_pdt_stat">Product Status</label>
		<select name="u_pdt_stat" class="form-control">
			<option value="1">Published</option>
			<option value="0">Unpublished</option>
		</select>
		
	</div>
	<input type="submit" name="u_pdt_btn" value="Update Product" class="btn btn-success">
	
</form>
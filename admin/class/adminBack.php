


<?php

class adminBack{

	private $conn;
	public function __construct(){
		$dbhost = "localhost";
		$dbuser ="root";
		$dbpass ="";
		$dbname ="login";
		$this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		if (!$this->conn) {
			die("Database connection Error!");
		}
	}

//Login function
	function admin_login($data){
		$email = $data['email'];
		$password = md5($data['password']);
		$query = "SELECT  * FROM information WHERE email='$email' AND password='$password'";
		if (mysqli_query($this->conn,$query)) {
			$result = mysqli_query($this->conn,$query);
			$admin_info = mysqli_fetch_assoc($result);
			if ($admin_info) {
				header('location:dashboard.php');
				session_start();
				$_SESSION['id'] =$admin_info['id'];
				$_SESSION['email'] =$admin_info['email'];
				$_SESSION['password'] =$admin_info['password'];
			}
			else
			{
				$errmsg = "Your Username  or password incorrect";
				return $errmsg;
			}
		}

	}


	//Logout function

	function adminLogout(){
		unset($_SESSION['id']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		header('location:index.php');

	}
	function add_category($data){
		$ctg_name = $data['ctg_name'];
	$ctg_des = $data['ctg_des'];
	$ctg_stat = $data['ctg_stat'];
	
		$query= "INSERT INTO category(ctg_name,ctg_des,ctg_stat) VALUES('$ctg_name','$ctg_des',$ctg_stat)";
	if (mysqli_query($this->conn,$query)) {
		$message = "category added successfully!";
			return $message;
	}
	else
	{
		$message = "category not added !";
			return $message;
		
	}
	}

	function display_category(){
		$query ="SELECT * FROM category";
		if (mysqli_query($this->conn,$query)) {
			$return_ctg = mysqli_query($this->conn,$query);
			return $return_ctg;
		}
	}
	function p_display_category(){
		$query ="SELECT * FROM category WHERE ctg_stat=1";
		if (mysqli_query($this->conn,$query)) {
			$return_ctg = mysqli_query($this->conn,$query);
			return $return_ctg;
		}
	}


	function publish_category($id){
		$query = "UPDATE category SET ctg_stat=1 WHERE ctg_id=$id";
		mysqli_query($this->conn,$query);
	}

	function unpublish_category($id){
		$query = "UPDATE category SET ctg_stat=0 WHERE ctg_id=$id";
		mysqli_query($this->conn,$query);
	}

	  function delete_category($id){
        $query = "DELETE FROM category WHERE ctg_id=$id";
        if(mysqli_query($this->conn, $query)){
            $msg = "Category Deleted Successfully";
            return $msg;
        }
    }


	function getCatinfo_toupdate($id){
		$query = "DELETE FROM category  WHERE ctg_id=$id";
		if(mysqli_query($this->conn,$query)){

			$msg = "Delete successfully!!";
			return $msg;
		}
		else{

			$msg = "Delete  not successfully!!";
			return $msg;
		}
	}


	

	function update_category($receive_data){

		$ctg_name =$receive_data['u_ctg_name'] ;
		$ctg_des =$receive_data['u_ctg_des'] ;
		$ctg_id =$receive_data['u_ctg_id'] ;
		$query = "UPDATE category SET ctg_name='$ctg_name',ctg_des='$ctg_des'WHERE ctg_id=$ctg_id";
		if (mysqli_query($this->conn,$query)) {
			$return_msg = "category updated succesfully!";
			return $return_msg;
		}
		

	}
	function add_product($data){
		$pdt_name = $data['pdt_name'];
		$pdt_price = $data['pdt_price'];
		$pdt_des = $data['pdt_des'];
		$pdt_ctg = $data['pdt_ctg'];
		$pdt_img_name = $_FILES['pdt_img']['name'];
		$pdt_img_size = $_FILES['pdt_img']['size'];
		$pdt_tmp_name = $_FILES['pdt_img']['tmp_name'];
		$pdt_ext = pathinfo($pdt_img_name,PATHINFO_EXTENSION);
		$pdt_stat = $data['pdt_stat'];
		if ($pdt_ext == 'jpg' or $pdt_ext == 'png' or $pdt_ext == 'jpeg') {
			if ($pdt_img_size <=2097152) {
				$query = "INSERT INTO product(pdt_name,pdt_price,pdt_des,pdt_ctg,pdt_img,pdt_stat) VALUES('$pdt_name',$pdt_price,'$pdt_des',$pdt_ctg,'$pdt_img_name',$pdt_stat)";
				if (mysqli_query($this->conn,$query)) {
					move_uploaded_file($pdt_tmp_name,"uploads/".$pdt_img_name);
					$msg = "Product added successfully!";
					return $msg;
					
				}
			}
			else{
				$msg="Your file size should be less or equal 2MB!";
			}
		}
		else{
			$msg="Your file mustbe a jpg/png file";
			return $msg;
		}


	}
	function display_product(){
		$query = "SELECT * FROM product_info_ctg";
		if (mysqli_query($this->conn,$query)) {
			$product = mysqli_query($this->conn,$query);
			return $product;
			 
		}
	}

	function delete_product($id){
		$query = "DELETE FROM product WHERE pdt_id=$id";
		if (mysqli_query($this->conn,$query)) {
			$msg = "product Deleted successfully!";
			return $msg;
		}

	}
	function getEditProduct_info($id){
		$query = "SELECT * FROM product_info_ctg WHERE pdt_id = $id";
		if (mysqli_query($this->conn,$query)) {
				$product_info=mysqli_query($this->conn,$query);
				$pdt_data = mysqli_fetch_Assoc($product_info);
				return $pdt_data;
		}


	}
	
function update_product($data){
$pdt_id = $data['u_pdt_id'];	
$pdt_name = $data['u_pdt_name'];
		$pdt_price = $data['u_pdt_price'];
		$pdt_des = $data['u_pdt_des'];
		$pdt_ctg = $data['u_pdt_ctg'];
		$pdt_img_name = $_FILES['u_pdt_img']['name'];
		$pdt_img_size = $_FILES['u_pdt_img']['size'];
		$pdt_tmp_name = $_FILES['u_pdt_img']['tmp_name'];
		$pdt_ext = pathinfo($pdt_img_name,PATHINFO_EXTENSION);
		$pdt_stat = $data['u_pdt_stat'];
		if ($pdt_ext == 'jpg' or $pdt_ext == 'png' or $pdt_ext == 'jpeg') {
			if ($pdt_img_size <=2097152) {
				$query = "UPDATE product SET pdt_name='$pdt_name',pdt_price=$pdt_price,pdt_des='$pdt_des',pdt_ctg=$pdt_ctg,pdt_img='$pdt_img_name',pdt_stat=$pdt_stat WHERE pdt_id =$pdt_id";
				if (mysqli_query($this->conn,$query)) {
					move_uploaded_file($pdt_tmp_name,"uploads/".$pdt_img_name);
					$msg = "Product added successfully!";
					return $msg;
					
				}
			}
			else{
				$msg="Your file size should be less or equal 2MB!";
			}
		}
		else{
			$msg="Product updated successfully";
			return $msg;
		}

}
function product_by_ctg($id){
$query = "SELECT * FROM product_info_ctg WHERE ctg_id =$id";
if (mysqli_query($this->conn,$query)) {
	$proinfo = mysqli_query($this->conn,$query);
	return $proinfo;
}
}
	 
}

?>
<?php 
/*
Author: Mr. Kalio Tamunotonye
Program: Medical Equipment Market
Date: 14th November, 2021
*/


// Including constant
include_once("constants.php");

// start MyRetailers Class Diagram

// create class
class MyRetailers {

	// create variables/properties/attributes 
	public $retailers_firstname;
	public $retailers_lastname;
	public $retailers_phone;
	public $retailers_company;
	public $retailers_email;
	public $retailers_password;
	public $retailers_address;
	public $dbcon; //database connection handler

	// create method/function/operation
	function __construct() {
		$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

		if ($this->dbcon->connect_error) {
			die("connection failed".$this->dbcon->connect_error)."<br>";
		}
		// else {
		// 	echo "Connection successful";
		// }
	}

	function addRetailers($retailers_firstname, $retailers_lastname, $retailers_phone, $retailers_company, $retailers_email, $retailers_password, $retailers_address) {

		// encrypt pasword
		$retailers_password = md5($retailers_password);

		$sql = "INSERT INTO retailers(retailers_firstname, retailers_lastname, retailers_phone, retailers_company, retailers_email, retailers_password, retailers_address) VALUES('$retailers_firstname', '$retailers_lastname', '$retailers_phone', '$retailers_company', '$retailers_email', '$retailers_password', '$retailers_address')";

		$result = $this->dbcon->query($sql);

		if ($this->dbcon->affected_rows == 1) {
			// instead of returning true, let's create session since we want to proceed to dashboard
				// so create session variables
				$_SESSION['retailer_id'] = $this->dbcon->insert_id;
				$_SESSION['retailers_company'] = $retailers_company;
				$_SESSION['retailers_firstname'] = $retailers_firstname;
				$_SESSION['retailers_lastname'] = $retailers_lastname;
				$_SESSION['retailers_email'] = $retailers_email;
				$_SESSION['retailers_phone'] = $retailers_phone;
				$_SESSION['retailers_address'] = $retailers_address;
				// to go a step further, add a special key to authenticate who is in session.
				$_SESSION['mem'] = "@@Exec_2090%";
			
		}
		else {
			return "Contact could not be added".$this->dbcon->error."<br>";
		}
	}


	function loginRetailer($retailers_email, $retailers_password) {

		$retailers_password = md5($retailers_password);

		$sql = "SELECT retailers_email FROM retailers WHERE retailers_email='$retailers_email' AND retailers_password='$retailers_password'";

		$result = $this->dbcon->query($sql);

		if ($result->num_rows==1) {
			return true;
		}
		else {
			return false;
		}
	}


		// check if email address exists
		function checkEmail($retailers_email) {

			// write query
			$sql = "SELECT retailers_email FROM retailers WHERE retailers_email='$retailers_email'";
			 // run the query
			$result = $this->dbcon->query($sql);
			if ($this->dbcon->affected_rows == 1) {
				return false;
			}
			else {
				return false;
			}
		}


		// Get retailers id
		function getAllRetailers() {
	
			// write the query
			$sql = "SELECT equipments.equip_name, equipments.equip_brand, equipments.equip_price, retailers.retailers_code, equipments.equip_avail, retailers.retailers_company, retailers.retailers_phone, retailers.retailers_address, equipments.created_at, equipments.updated_at FROM equipments JOIN retailers ON equipments.retailers_code = retailers.retailers_code ORDER BY equipments.retailers_code";

			$rows = array();
			// run the query
			$result = $this->dbcon->query($sql);
			if($this->dbcon->affected_rows > 0) {
				while($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
					return $rows;
				}
		}



		// Get specific retailers
		function getSpecificRetailer($retailers_code) {
			$sql = "SELECT equipments.equip_name, equipments.equip_brand, equipments.equip_price, retailers.retailers_code, equipments.equip_avail, retailers.retailers_company, retailers.retailers_phone, retailers.retailers_address, equipments.created_at, equipments.updated_at FROM equipments JOIN retailers ON equipments.retailers_code = retailers.retailers_code WHERE equipments.retailers_code='$retailers_code'";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}



		// Publish specific retailers details
		function publishSpecificRetailer($equip_id) {
			$sql = "SELECT retailers.*, equipments.equip_id FROM `retailers`JOIN equipments ON retailers.retailers_code=equipments.retailers_code WHERE equipments.equip_id='$equip_id'";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}

}
// End MyRetailers Class Diagram

// Start My Customers Class Diagram

// create class
	class MyCustomers {

		// create variables/properties/attributes
		public $cust_firstname;
		public $cust_lastname;
		public $cust_phone;
		public $cust_email;
		public $cust_username;
		public $cust_password;
		public $cust_gender;
		public $cust_address;
		public $dbcon; //database connection handler


		//create method/function/operation
		function __construct() {
			$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if ($this->dbcon->connect_error){
				die("Connection failed".$this->dbcon->connect_error)."<br>";
			}
			// else {
			// 	echo "Connection successful";
			// }
		}


		function addCustomers($cust_firstname, $cust_lastname, $cust_phone, $cust_email, $cust_username, $cust_password, $cust_gender, $cust_address) {

		// encrypt password
		$encr_pswd = md5($cust_password);

		$sql = "INSERT INTO customers(cust_firstname, cust_lastname, cust_phone, cust_email, cust_username, cust_password, cust_gender, cust_address) VALUES('$cust_firstname', '$cust_lastname', '$cust_phone', '$cust_email', '$cust_username', '$encr_pswd', '$cust_gender', '$cust_address')";

		// check result
		$result = $this->dbcon->query($sql);

			if ($this->dbcon->affected_rows == 1) {
				// instead of returning true, let's create session since we want to proceed to dashboard
				// so create session variables
					
					$_SESSION['cust_id'] = $this->dbcon->insert_id;
					$_SESSION['cust_firstname'] = $cust_firstname;
					$_SESSION['cust_lastname'] = $cust_lastname;
					$_SESSION['cust_phone'] = $cust_phone;
					$_SESSION['cust_email'] = $cust_email;
					$_SESSION['cust_username'] = $cust_username;
					$_SESSION['cust_gender'] = $cust_gender;
					$_SESSION['cust_address'] = $cust_address;
					// to go a step further, add a special key to authenticate who is in session.
					$_SESSION['mem'] = "@@Exec_2090%";

				// next is to redirect to dashboard
				return true;
			}
			else {
				return "Contact could not be added <br>";
			}

		}


		// check if email address exists
		function checkemailaddress($cust_email) {

			// write query
			$sql = "SELECT cust_email FROM customers WHERE cust_email='$cust_email'";
			 // run the query
			$result = $this->dbcon->query($sql);
			if ($this->dbcon->affected_rows == 1) {
				return false;
			}
			else {
				return false;
			}
		}


		// Get all Users information
		function getCustomers() {
			$sql = "SELECT * FROM customers";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}


		function login($cust_email, $cust_password) {

			$encr_pswd = md5($cust_password);
			$sql = "SELECT cust_email FROM customers WHERE cust_email='$cust_email' AND cust_password='$cust_password'";
			$result = $this->dbcon->query($sql);
			
			if ($result->num_rows==1) {
				return true;
			} 
			else {
				return false;
			}
			
		}


	}

// End  MyCustomers Class Diagram




// Start MyEquipment Class Diagram

// create class
	class MyEquipment {

		// create variables/properties/attributes
		public $equip_name;
		public $equip_brand;
		public $category_id;
		public $equip_price;
		public $equip_avail;
		public $equip_photo;
		public $retailers_code;
		public $dbcon; //database coonection handler

		// create method/functions/operations

		function __construct() {
			$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if ($this->dbcon->connect_error) {
				die("Connection failed".$this->dbcon->connect_error)."<br>";
			}
			// else {
			// 	echo "Connection Successful";
			// }
		}


		function getEquipmentById($id) {
			$sql = "SELECT * FROM equipments where equip_id='$id'";
			$details=[];
			$result = $this->dbcon->query($sql);
			
			if ($this->dbcon->affected_rows > 0) {
					$details=$result->fetch_assoc();
			}
			return $details;
		}


		function getEquipment() {
			$sql = "SELECT * FROM equipments ORDER BY rand()";

			$result = $this->dbcon->query($sql);
			$rows = array();
			if ($this->dbcon->affected_rows > 0) {
				while($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
		}



		function searchEquipment($searchdata) {
			$sql = "SELECT * FROM equipments WHERE equip_name LIKE '%$searchdata%' OR equip_brand LIKE '%$searchdata%'";
			// var_dump($sql);
			
			$result = $this->dbcon->query($sql);
			$rows = array();
			if($this->dbcon->affected_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}
				return $rows;
			}
			return $rows;
		}



		public function uploadPhoto($equip_name, $equip_brand, $category_id, $equip_price, $equip_avail, $equip_photo, $retailers_code) {
		
		// first define variables
		$file_name = $_FILES['equip_photo']['name'];
		$file_type = $_FILES['equip_photo']['type'];
		$file_tmp_name = $_FILES['equip_photo']['tmp_name'];
		$file_error = $_FILES['equip_photo']['error'];
		$file_size = $_FILES['equip_photo']['size'];

		// validate
		$error = array();

		if ($file_error > 0) {
			$error[] = "You are yet to upload a file";
		}

		if ($file_size > 2097512) {
			$error[] = "Max file size is 2MB";
		}

		$extensions = array("jpeg", "jpg", "png", "svg");

		$file_ext = explode(".", $file_name);

		$file_ext = end($file_ext);

		if (!in_array(strtolower($file_ext), $extensions)) {
			$error[] = $file_ext." file format not supported!";
		}
		if (!empty($error)) {
			foreach ($error as $key => $value) {
				return "<div class='alert alert-danger'>$value</div>";
			}
		}
		
		$folder = "uploads/";

		$newfilename = time().rand().".".$file_ext;

		$destination = $folder.$newfilename;

		if(move_uploaded_file($file_tmp_name, $destination)) {

			$sql = "INSERT INTO equipments(equip_name, equip_brand, category_id, equip_price, equip_avail, equip_photo, retailers_code) VALUES('$equip_name', '$equip_brand', '$category_id', '$equip_price', '$equip_avail', '$newfilename', '$retailers_code')";
			// var_dump($sql);
			$result = $this->dbcon->query($sql);
			 if($this->dbcon->affected_rows == 1) {
			 	// echo "<p>Equipment added successfuly</p>";
			 	// return true;
			 }
			 else {
			 	echo "could not be added".$this->dbcon->error;
			 	// return false;
			 }
		}
	}



		// update equipment
		public function updateEquipment($equip_name, $equip_brand, $category_id, $equip_price, $equip_avail, $equip_photo, $retailers_code) {


			// first define variables
		$file_name = $_FILES['equip_photo']['name'];
		$file_type = $_FILES['equip_photo']['type'];
		$file_tmp_name = $_FILES['equip_photo']['tmp_name'];
		$file_error = $_FILES['equip_photo']['error'];
		$file_size = $_FILES['equip_photo']['size'];

		// validate
		$error = array();

		if ($file_error > 0) {
			$error[] = "You are yet to upload a file";
		}

		if ($file_size > 2097512) {
			$error[] = "Max file size is 2MB";
		}

		$extensions = array("jpeg", "jpg", "png", "svg");

		$file_ext = explode(".", $file_name);

		$file_ext = end($file_ext);

		if (!in_array(strtolower($file_ext), $extensions)) {
			$error[] = $file_ext." file format not supported!";
		}
		if (!empty($error)) {
			foreach ($error as $key => $value) {
				return "<div class='alert alert-danger'>$value</div>";
			}
		}
		
		$folder = "uploads/";

		$newfilename = time().rand().".".$file_ext;

		$destination = $folder.$newfilename;

		if(move_uploaded_file($file_tmp_name, $destination)) {

			// write the query
			$sql = "UPDATE equipments SET equip_name='$equip_name', equip_brand='$equip_brand', category_id='$category_id', equip_price='$equip_price', equip_avail='$equip_avail', equip_photo='$newfilename' WHERE equip_name='$equip_name'";

			// run the query
			$result =$this->dbcon->query($sql);

			$output = array();
			if ($this->dbcon->affected_rows==1) {
				$output['success'] = "Equipment details was successfully updated";
			} 
			elseif ($this->dbcon->affected_rows==0) {
				$output['success'] = "No changes made!";
			}
			else {
				$output['error'] = "An error occured!".$this->dbcon->error;
			}
			return $output;
			}
		}

}


// End MyEquipment Class Diagram



// Start MyLogistics Class Diagram


// create class diagram
	class MyLogistics {

		// create variables/properties/attributes
		public $logistics_name;
		public $logistics_phone;
		public $logistics_email;
		public $logistics_password;
		public $logistics_bank;
		public $logistics_acount_no;
		public $logistics_address;
		public $dbcon; //database connection handler


		// create methods/functions/operation

		function __construct() {
			$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if ($this->dbcon->connect_error) {
				die("Connection failed".$this->dbcon->conect_error)."<br>";
			}
			else {
				echo "Connection Successful <br>";
			}
		}


		function addLogistics($logistics_name, $logistics_phone, $logistics_email, $logistics_password, $logistics_bank, $logistics_acount_no, $logistics_address) {

			// encrypt password
			$encr_pswd = md5($logistics_password);

			$sql = "INSERT INTO logistics(logistics_name, logistics_phone, logistics_email, logistics_password, logistics_bank, logistics_account_no, logistics_address) VALUES('$logistics_name', '$logistics_phone', '$logistics_email', '$encr_pswd', '$logistics_bank', '$logistics_acount_no', '$logistics_address')";

			// check result
			$result = $this->dbcon->query($sql);

			if ($this->dbcon->affected_rows == 1) {
				return true;
			}
			else {
				return "Contact could not be added".$this->dbcon->error."<br>";
			}
		}

	}

// End MyLogistics Class Diagram


// Start My Admin Class Diagram

// create class
	class MyAdmin {

		// create variables/properties/attributes
		public $admin_fname;
		public $admin_lname;
		public $admin_phone;
		public $admin_email;
		public $admin_password;
		public $admin_gender;
		public $admin_staffno;
		public $dbcon; //database connection handler


		//create method/function/operation
		function __construct() {
			$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if ($this->dbcon->connect_error){
				die("Connection failed".$this->dbcon->connect_error)."<br>";
			}
			// else {
			// 	echo "Connection successful";
			// }
		}


		function addAdmin($admin_fname, $admin_lname, $admin_phone, $admin_email, $admin_password, $admin_gender, $admin_staffno) {

		// encrypt password
		$encr_pswd = md5($admin_password);

		$sql = "INSERT INTO admintable(admin_fname, admin_lname, admin_phone, admin_email, admin_password, admin_gender, admin_staffno) VALUES('$admin_fname', '$admin_lname', '$admin_phone', '$admin_email', '$encr_pswd', '$admin_gender', '$admin_staffno')";

		// check result
		$result = $this->dbcon->query($sql);

			if ($this->dbcon->affected_rows == 1) {
				$_SESSION['admin_id'] = $this->dbcon->insert_id;
				$_SESSION['admin_fname'] = $admin_fname;
				$_SESSION['admin_lname'] = $admin_lname;
				$_SESSION['admin_phone'] = $admin_phone;
				$_SESSION['admin_email'] = $admin_email;
				$_SESSION['admin_gender'] = $admin_gender;
				$_SESSION['admin_staffno'] = $admin_staffno;
				// to go a step further, add a special key to authenticate who is in session.
				$_SESSION['mem'] = "@@Exec_2090%";
			}
			else {
				return false;
			}

		}



		// Get all Users information
		function getAdmin() {
			$sql = "SELECT * FROM admintable";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}


		function adminLogin($admin_email, $admin_password) {

			$admin_password = md5($admin_password);
			$sql = "SELECT admin_email FROM admintable WHERE admin_email='$admin_email' AND admin_password='$admin_password'";
			$result = $this->dbcon->query($sql);
			
			if ($result->num_rows==1) {
				return true;
			} 
			else {
				return false;
			}
			
		}


		// check if email address exists
		function confirmemailaddress($admin_email) {

			// write query
			$sql = "SELECT admin_email FROM admintable WHERE admin_email='$admin_email'";
			 // run the query
			$result = $this->dbcon->query($sql);
			if ($this->dbcon->affected_rows == 1) {
				return false;
			}
			else {
				return false;
			}
		}


	}

// End  My Admin Class Diagram


// Start My Category Class Diagram

	class MyCategory {

		public $category_name;
		public $dbcon; //database connection handler


		//create method/function/operation
		function __construct() {
			$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if ($this->dbcon->connect_error){
				die("Connection failed".$this->dbcon->connect_error)."<br>";
			}
			// else {
			// 	echo "Connection successful";
			// }
		}



		function addCategory($category_name) {

		$sql = "INSERT INTO category(category_name) VALUES('$category_name')";

		// check result
		$result = $this->dbcon->query($sql);

			if ($this->dbcon->affected_rows == 1) {
				return true;
			}
			else {
				return false;
			}

		}



		// Get all Categories
		function getSpecificCategory($category_id) {
			$sql = "SELECT equipments.* FROM equipments JOIN category ON category.category_id=equipments.category_id WHERE equipments.category_id LIKE '$category_id' ORDER BY rand()";


			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}



		// Get all Users information
		function getCategory() {
			$sql = "SELECT * FROM category";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}



		// Get all categories and equipment information
		function getAllCategory() {
			$sql = "SELECT category.category_id, category.category_name, equipments.equip_name FROM category JOIN equipments ON category.category_id=equipments.category_id ORDER BY category.category_id";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}

	}

// End MyCategory class diagram



// Start MyCart Class Diagram

// Start My Category Class Diagram

	class MyCart {

		public $equip_name;
		public $quantity;
		public $equip_price;
		public $session_id; 
		public $dbcon; //database connection handler


		//create method/function/operation
		function __construct() {
			$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if ($this->dbcon->connect_error){
				die("Connection failed".$this->dbcon->connect_error)."<br>";
			}
			// else {
			// 	echo "Connection successful";
			// }
		}



		function addToCart($equip_name, $quantity, $equip_price, $session_id) {
			
		$sql = "INSERT INTO cart(equip_name, quantity, equip_price, session_id) VALUES('$equip_name', '$quantity', '$equip_price', '$session_id')";

		// check result
		$result = $this->dbcon->query($sql);

			if ($this->dbcon->affected_rows == 1) {
				return true;
			}
			else {
				return false;
			}

		}


		// Get all Users information
		function getFromCart($session_id) {
			$sql = "SELECT * FROM cart WHERE session_id = '$session_id'";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}



		public function editCart($quantity, $cart_id) {
			// write the query
			$sql = "UPDATE cart SET quantity='$quantity' WHERE cart_id='$cart_id'";

			// run the query
			$result =$this->dbcon->query($sql);

			$output = array();
			if ($this->dbcon->affected_rows==1) {
				$output['success'] = "Quantity was successfully updated";
			} 
			elseif ($this->dbcon->affected_rows==0) {
				$output['success'] = "No changes made!";
			}
			else {
				$output['error'] = "An error occured!".$this->dbcon->error;
			}
			
		}

		//  ?


		public function deleteItemIncart($cart_id) {
			// write the query
			$sql = "DELETE FROM `cart` WHERE cart.cart_id='$cart_id'";
			var_dump($sql);
			// run the query
			$result =$this->dbcon->query($sql);

			$output = array();
			if ($this->dbcon->affected_rows==1) {
				$output['success'] = "Equipment was successfully deleted";
			} 
			elseif ($this->dbcon->affected_rows==0) {
				$output['success'] = "No changes made!";
			}
			else {
				$output['error'] = "An error occured!".$this->dbcon->error;
			}
			
		}

	}

// End MyCart class Diagram


// Start MyOrderDetails Class Diagram

	class MyOrderDetails {

		public $session_id;
		public $amount;
		public $transref;
		public $transstatus;
		public $dueyear;
		public $datepaid;
		public $paymentmode;
		public $dbcon; //database connection handler


		//create method/function/operation
		function __construct() {
			$this->dbcon = new MySqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if ($this->dbcon->connect_error){
				die("Connection failed".$this->dbcon->connect_error)."<br>";
			}
			// else {
			// 	echo "Connection successful";
			// }
		}



		// Get all Users information
		function getFromOrderDetails() {
			$sql = "SELECT * FROM order_details";

			$result = $this->dbcon->query($sql);
			$rows = array();

			if ($this->dbcon->affected_rows > 0) {
				while ($row = $result->fetch_array()) {
					$rows[] = $row;
				}
				return $rows;
			}
			else {
				return $rows;
			}
			
		}


	}

// End MyOrderDetails class Diagram
?>
?>
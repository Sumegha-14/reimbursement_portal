<?php
session_start();
$name="";
$email = "";
$employeeid="";
$phonenumber = "";
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'devvsoc');

 $SESSION['PID']="";
 function gen_uuid() {
    return sprintf( '%04x%04x%04x%04x%04x%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
   
  $name = mysqli_real_escape_string($db, $_POST['name']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$employeeid=mysqli_real_escape_string($db,$_POST['employeeid']);
$phonenumber=mysqli_real_escape_string($db,$_POST['phonenumber']);
 $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

  if (empty($name)) { array_push($errors, "Your full name is required"); }
  if (empty($employeeid)) { array_push($errors, "Employee id is required"); }
  if (empty($phonenumber)) { array_push($errors, "phonenumber is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

   // a user does not already exist with the same username and/or email
 /* $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if($user['email']===$email){
      array_push($errors, "Email already exists");
    }
   
  }*/
 if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users(name,email,employeeid,phonenumber,password) VALUES('$name','$email','$employeeid','$phonenumber','$password')";
  	$reg=mysqli_query($db, $query);
if($reg){
  	$_SESSION['employeeid'] = $employeeid;
  	$_SESSION['success'] = "You are now logged in";
  //	header('location: mainindex.php');
  	header('location: index.html');
  }
  else{

    echo "Not registered";
  }
  }


}
if (isset($_POST['login_user'])) {
  $employeeid = mysqli_real_escape_string($db, $_POST['employeeid']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($employeeid)) {
  	array_push($errors, "Employee_ID is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE employeeid='$employeeid' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['employeeid'] = $employeeid;

  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.html');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>

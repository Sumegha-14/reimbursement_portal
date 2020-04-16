<?php include('serverdev.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="style.css">
 <!--<link rel="stylesheet" type="text/css" href="main.css">-->
 
     


</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php" >
  	<?php include('errors.php'); ?>
    
  	<div class="input-group">
  	  <label>Full name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
    <div class="input-group">
      <label>Employee ID</label>
      <input type="text" name="employeeid" value="<?php echo $employeeid;?>">
    </div>

  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Phone number</label>
  	  <input type="number" name="phonenumber" value="<?php echo $phonenumber; ?>">
  	</div>
  	
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>

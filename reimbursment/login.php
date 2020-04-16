<?php include('serverdev.php')?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Document</title>

</head>
<body>
	<form method="post" action="login.php" >
		<?php include('errors.php')?>
		Employee_id:
	<input type="text" name="employeeid" required maxlength=20><br>
	  Password:
	<input type="password" name="password" required maxlength=12><br>
	<button type="submit" name="login_user">Login</button>

   </form>
<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
</body>
</html>
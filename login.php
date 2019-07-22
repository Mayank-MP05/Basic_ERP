
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ERP Login</title>
<link rel="stylesheet" href="css/style.css" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">PCCOE lite ERP Login</a>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Register</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container text-center">

<form action="" method="post" name="login" class="vertical">
  <div class="form-group">
    <input type="text" name="username" placeholder="Username" required class="form-control" id="exampleInputEmail1" placeholder="username">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
  </div>
  <button type="submit" class="btn btn-success" name="submit" value="Login">Submit</button>
</form>
<br>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>


</body>
</html>

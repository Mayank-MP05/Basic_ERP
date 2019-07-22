<?php
 
require('db.php');
include("auth.php");
$user=$_SESSION["username"];
$query = "SELECT * FROM `users` where username='".$user."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Credentials</title>
<link rel="stylesheet" href="css/style.css" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="form">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">PCCOE lite ERP Login</a>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>
    </ul>
  </div>
</nav>

<?php
$status = "";
if(isset($_POST['updateCred']) && $_POST['updateCred']==1)
{
    $user=$_SESSION["username"];
    $trn_date = date("Y-m-d H:i:s");
    $name =$_POST['username'];
    $u_email =$_POST['email'];
    $update="update `users` set trn_date='".$trn_date."', username='".$name."', email='".$u_email."' where username='".$user."'";
    mysqli_query($con, $update) or die(mysqli_error($con));
    $status = "Record Updated Successfully.";
    echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>

<div class="container text-center">
<h1>Update Login Credentials</h1>
    <form name="form" action="" method="post" class="vertical">
        <input type="text" name="username" placeholder="Username" class="form-control" required />
        <input type="email" name="email" placeholder="Email" class="form-control" required />
        <input type="submit" name="updateCred" value="update" class="btn btn-dark"/>
    </form>
<br/>
<br>
</div>
<?php } ?>
</body>
</html>

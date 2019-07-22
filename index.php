<?php
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8">
<title>Welcome to PCCOE ERP Lite</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php
    include("db.php");
    $active_user = $_SESSION["username"];
    $selectQ = "SELECT * FROM `users` where username="."'".$active_user."'";
    $result = mysqli_query($con,$selectQ) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)) {
      //echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. "<br>";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">PCCOE ERP Lite</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"><p>Welcome <?php echo $row["first_name"]; ?>!</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update.php">Update Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
       
<div class="container" style="" class="align-items-center align-self-center">
    <div class="row">
        <img src="" alt="">
    </div>
    <table class="infoTable table">
        <tr>
            <th>Student Name</th>
            <td><?php echo $row["first_name"].' '.$row["last_name"]; ?></td>
        </tr>
        <tr>
            <th>Year</th>
            <td><?php echo $row["year"];?></td>
            <th>Roll No</th>
            <td><?php echo $row["roll_no"];?></td>
        </tr>
        <tr>
            <th>ERP No.</th>
            <td><?php echo $row["erp_no"];?></td>
            <th>Gender</th>
            <td><?php echo $row["gender"];?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $row["address"];?></td>
        </tr>
    </table>
</div>
    <?php }?>
</body>
</html>

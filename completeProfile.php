<?php
include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8">
<title>Complete Profile Details</title>
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
        <form class = "noneForm" action="" method="post">
    <table class="infoTable table">
        <tr>
            <th>First Name</th>
            <td><input type="text" name="scmpFname" placeholder="Enter your First Name" class="form-control" required value="<?php echo $row["first_name"]; ?>" /></td>
        </tr>

        <tr>
            <th>Last Name</th>
            <td><input type="text" name="scmp_lname" placeholder="Enter your Surname" class="form-control" required value="<?php echo $row["last_name"]; ?>" /></td>
        </tr>


        <tr>
            <th>Year</th>
            <td>

            <select class="form-control" id="select_1" name="scmp_year">
                <option value="SE">Second Year</option>
                <option value="TE">Third Year</option>
                <option value="BE">Final Year</option>
            </select>

            </td>
        </tr>
        <tr>
            <th>Roll No</th>
            <td>
              <input type="text" name="scmp_roll" placeholder="Enter Roll No." class="form-control" required value="<?php echo $row["roll_no"]; ?>" />    
          </td>
        </tr>
        <tr>
            <th>ERP No.</th>
            <td>
             <input type="text" name="scmp_erp" placeholder="Enter ERP No." class="form-control" required value="<?php echo $row["erp_no"]; ?>" />    
          </td>
          </tr>
          <tr>
            <th>Gender</th>
            <td>

            <input type="radio" name="scmp_gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
            <input type="radio" name="scmp_gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
               
          </td>
        </tr>
        <tr>
            <th>Address</th>
            <td> 

              <textarea name="address" rows="5" cols="40" class="form-control"><?php echo $row["address"];?></textarea>

              
          </td>
        </tr>
        <tr>
          <td>
            <button type="submit" class="btn btn-success" name="scmp_submit">Submit</button>
          </td>
        </tr>
    </table>
    </form>
    </div>
</div>
    <?php }
        include("sendDb.php");
    ?>
</body>
</html>

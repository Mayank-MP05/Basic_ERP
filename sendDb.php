<?php
include("db.php");


if(isset($_POST['scmpFname'])){
    if(isset($_POST["scmp_lname"])){
        if(isset($_POST["scmp_year"])){
            if(isset($_POST["scmp_roll"])){
                if(isset($_POST["scmp_erp"])){
                    if(isset($_POST["scmp_gender"])){
                        if(isset($_POST["address"])){
    if(isset($_POST['fileToUpload'])){
    if(isset($_POST['scmp_submit'])){
    //Taking data input from PHP Queries

    $status = "";
    $fname = $lname = $year = $rno = $erp = $gender = $year = $year = $address = "";

    $fname = $_POST['scmpFname'];
    $lname = $_POST["scmp_lname"];
    $year = $_POST["scmp_year"];
    $rno = $_POST["scmp_roll"];
    $erp = $_POST["scmp_erp"];
    $gender = $_POST["scmp_gender"];
    $address = $_POST["address"];

    // MySQL Query to Send Data to Database

    $sendToDB="update users set first_name='".$fname."', last_name='".$lname."', year='".$year."', roll_no='".$rno."', erp_no='".$erp."', gender='".$gender."', address='".$address."' where username='".$_SESSION["username"]."'";
    mysqli_query($con, $sendToDB) or die(mysqli_error($con));


    $status = `
    <div class="alert alert-success" role="alert">
        Details Updated  Sucessfully.
    </div>
    `;
    echo $status;
    
    }
}
}}}}}}
}

?>


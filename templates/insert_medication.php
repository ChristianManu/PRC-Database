<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "cmsc508");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$med_name = mysqli_real_escape_string($link, $_REQUEST['med_name']);




$sql = "INSERT INTO Medications (med_name) VALUES ('$med_name')";
if(mysqli_query($link, $sql)){
    echo "Medication Saved";
    header("location: Medications.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  //  header("location: Home.php");

}

// Close connection
mysqli_close($link);
?>

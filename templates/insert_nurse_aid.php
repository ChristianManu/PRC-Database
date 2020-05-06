<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "cmsc508");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$birthdate = mysqli_real_escape_string($link, $_REQUEST['birthdate']);
$set_id = mysqli_real_escape_string($link, $_REQUEST['set_id']);
$cert_id = mysqli_real_escape_string($link, $_REQUEST['cert_id']);


// Attempt insert query execution
if ($set_id == 1| $set_id == 3 | $set_id == 4) {
  $unit_manager_id = 1;
}
elseif ($set_id == 2| $set_id == 5 | $set_id == 6) {
  $unit_manager_id = 2;
}
else {
  //do nothing
}


$sql = "INSERT INTO NurseAids (first_name, last_name, email, birthdate, set_id, cert_id, unit_manager_id) VALUES ('$first_name', '$last_name', '$email', '$birthdate',  $set_id, $cert_id, $unit_manager_id)";
if(mysqli_query($link, $sql)){
    header("location: Nurse-Aides.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  //  header("location: Home.php");

}

// Close connection
mysqli_close($link);
?>

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
$room_num = mysqli_real_escape_string($link, $_REQUEST['room_num']);
$bath_time = mysqli_real_escape_string($link, $_REQUEST['bath_time']);
$med_id = mysqli_real_escape_string($link, $_REQUEST['med_id']);
$set_id = mysqli_real_escape_string($link, $_REQUEST['set_id']);

// Attempt insert query execution
if ($set_id == 1| $set_id == 3 | $set_id == 4) {
  $unit_id = 1;

}
elseif ($set_id == 2| $set_id == 5 | $set_id == 6) {
  $unit_id = 2;
}
else {
  //do nothing
}
// Attempt insert query execution

$sql = "INSERT INTO Patients (first_name, last_name, room_num, bath_time, med_id, set_id, unit_id) VALUES ('$first_name', '$last_name', $room_num,  '$bath_time', $med_id, $set_id, $unit_id)";
if(mysqli_query($link, $sql)){
    echo "Patient Saved";
    header("location: Patients.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  //  header("location: Home.php");

}

// Close connection
mysqli_close($link);
?>

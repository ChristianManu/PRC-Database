<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect('localhost', 'root', '', 'cmsc508');
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// initialize variables
  $patient_id = 0;
	$first_name = "";
	$last_name = "";
	$date_admitted = "";
  $med_id = 0;
  $bath_time = "";
  $set_id = 0;
  $unit_manager_id=0;
  $update = false;
  $room_num = 0;
?>

<?php
$update = false;
if (isset($_GET['edit'])) {
  $patient_id = $_GET['edit'];
  $update = true;
  $record = mysqli_query($link, "SELECT * FROM Patients WHERE patient_id=$patient_id");

  if (@count($record) == 1 ) {
    $n = mysqli_fetch_array($record);
    $first_name = $n['first_name'];
    $last_name = $n['last_name'];
    $date_admitted = $n['date_admitted'];
    $room_num = $n['room_num'];
    $bath_time = $n['bath_time'];
    $med_id = $n['med_id'];
    $set_id = $n['set_id'];

  }
}


?>
<?php
if (isset($_GET['del'])) {
$patient_id = $_GET['del'];
mysqli_query($link, "DELETE FROM Patients WHERE patient_id=$patient_id");
$_SESSION['message'] = "Patient deleted!";
header('location: Patients.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>PRC Database</title>
  <link rel="stylesheet" href="../stylesheets/login.css">
  <link rel="stylesheet" href="../stylesheets/Add.css">
  <link rel="stylesheet" type="text/css" href="../stylesheets/style.css">

</head>

<body>
<?php $results = mysqli_query($link, "SELECT * FROM Patients"); ?>

  <h1>Patients</h1>

    <a href="logout.php">
      <button class="button logout">LOGOUT</button>
    </a>
    <a href="Home.php">
      <button class="buttont logout">BACK</button>
    </a>
    <img src="../Img/AegisX.png"  alt="Logo" height="250px" width="250px">



<table>
	<thead>
		<tr>
			<th>id</th>
			<th>First Name</th>
      <th>Last Name</th>
			<th>Date Admitted</th>
      <th>Room Number</th>
      <th>Bath Time</th>
      <th>Medication</th>
      <th>Set</th>
			<th colspan="8">Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['patient_id']; ?></td>
			<td><?php echo $row['first_name']; ?></td>
      <td><?php echo $row['last_name']; ?></td>
			<td><?php echo $row['date_admitted']; ?></td>
      <td><?php echo $row['room_num']; ?></td>
      <td><?php echo $row['bath_time']; ?></td>
      <td><?php echo $row['med_id'] ?></td>
      <td><?php echo $row['set_id']; ?></td>

			<td>
				<a href="Patients.php?edit=<?php echo $row['patient_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="Patients.php?del=<?php echo $row['patient_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table><br><br><br>


<div class="flex-container2">
  <form  method="post">

    <div class="namelable">
      <label for="fname">First name</label><br>
      <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" ><br><br>
      <label for="lname">Last name</label><br>
      <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" ><br><br>

      <label for="date_admitted"> Date Admitted (yyyy-mm-dd) </label><br>
      <input type="date" id="date_admitted" name="date_admitted" value="<?php echo $date_admitted; ?>"><br><br>

      <label for="room_num"> Room Number </label><br>
      <input type="number" id="room_num" name="room_num" value="<?php echo $set_id; ?>"><br><br>

      <label for="unit">Bath Time Preference</label><br>
      <select id="bath_time" name="bath_time">d
        <option value="Morning">Morning</option>
        <option value="Afternoon">Afternoon</option>
        <option value="Night">Night</option>
      </select><br><br>

      <label for="certification">Medication</label><br>
      <select id="med_id" name="med_id" value="<?php echo $med_id; ?>">
        <option value=0></option>
        <option value=1>Lipitor</option>
        <option value=2>Synthroid</option>
        <option value=3>Zestril</option>
        <option value=4>Neurontin</option>
        <option value=5>Norvasc</option>
        <option value=6>Vicodin</option>
        <option value=7>Amoxil</option>
        <option value=8>Prilosec</option>
        <option value=9>Glucophage</option>
        <option value=10>Cozaar</option>
      </select><br><br>

       <label for="set">Set</label><br>
        <select id="set_id" name="set_id">
          <option value=0></option>
          <option value=1>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
        </select><br><br>

      <input type="hidden" name="patient_id" value="<?php echo $patient_id;?>">


    <a href="Add-Patient.php" class="btn" >Add New</a>

    <?php if ($update == true): ?>
	     <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button><br>
      <?php if(isset($_POST['update'])){
         // Escape user inputs for security
         $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
         $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
         $date_admitted = mysqli_real_escape_string($link, $_REQUEST['date_admitted']);
         $room_num = mysqli_real_escape_string($link, $_REQUEST['room_num']);
         $bath_time = mysqli_real_escape_string($link, $_REQUEST['bath_time']);
         $med_id = mysqli_real_escape_string($link, $_REQUEST['med_id']);
         $set_id = mysqli_real_escape_string($link, $_REQUEST['set_id']);




        //Attempt query
       $sql = "UPDATE Patients SET first_name='$first_name', last_name='$last_name', date_admitted='$date_admitted' room_num=$room_num, bath_time='$bath_time', med_id=$med_id, set_id=$set_id WHERE patient_id=$patient_id";
       if(mysqli_query($link, $sql)){
           echo "Patient Saved";

       } else{
           echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
         //  header("location: Home.php");

       }
     } ?>
     <br>
     <br>
     <?php else: ?>
	      <button class="btn" type="submit" name="save" >Save</button>
      <?php endif ?>

      <a href="Patients.php" class="btn" >Done</a>



  </body>

</html>

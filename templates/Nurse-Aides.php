<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect('localhost', 'root', '', 'cmsc508');
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// initialize variables
$nurse_aid_id = 0;
$first_name = "";
$last_name = "";
$email = "";
$date_added = "";
$set_id = 0;
$unit_manager_id=0;
$cert_id = 0;
$update = false;
?>

<?php
$update = false;
if (isset($_GET['edit'])) {
  $nurse_aid_id = $_GET['edit'];
  $update = true;
  $record = mysqli_query($link, "SELECT * FROM NurseAids WHERE nurse_aid_id=$nurse_aid_id ORDER BY nurse_aid_id");

  if (@count($record) == 1 ) {
    $n = mysqli_fetch_array($record);
    $first_name = $n['first_name'];
    $last_name = $n['last_name'];
    $email = $n['email'];
    $set_id = $n['set_id'];
    $cert_id = $n['cert_id'];
  }
}


?>
<?php
if (isset($_GET['del'])) {
$nurse_aid_id = $_GET['del'];
mysqli_query($link, "DELETE FROM NurseAids WHERE nurse_aid_id=$nurse_aid_id");
$_SESSION['message'] = "Nurse Aide deleted!";
header('location: Nurse-Aides.php');
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
<?php $results = mysqli_query($link, "SELECT * FROM NurseAids"); ?>
  <h1>Nurse Aides</h1>

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
    			<th>Email</th>
          <th>Set</th>
    			<th colspan="5">Action</th>
    		</tr>
    	</thead>

    	<?php while ($row = mysqli_fetch_array($results)) { ?>
    		<tr>
    			<td><?php echo $row['nurse_aid_id']; ?></td>
    			<td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
    			<td><?php echo $row['email']; ?></td>
          <td><?php echo $row['set_id']; ?></td>

    			<td>
    				<a href="Nurse-Aides.php?edit=<?php echo $row['nurse_aid_id']; ?>" class="edit_btn" >Edit</a>
    			</td>
    			<td>
    				<a href="Nurse-Aides.php?del=<?php echo $row['nurse_aid_id']; ?>" class="del_btn">Delete</a>
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



      <label for="email">Email Address </label><br>
      <input type="text" id="email" name="email" value="<?php echo $email; ?>" ><br><br>

      <label for="birthdate"> Date Added </label><br>
      <input type="text" id="date_added" name="date_added" value="<?php echo $date_added; ?>"><br><br>

      <label for="set"> SET </label><br>
      <input type="number" id="set_ID" name="set_id" value="<?php echo $set_id; ?>"><br><br>

      <label for="certification">Cerfication</label><br>
      <select id="cert_id" name="cert_id" value="<?php echo $cert_id; ?>">
        <option value=0>N/A</option>
        <option value=1>RN</option>
        <option value=3>CNA</option>
      </select><br><br>
      <input type="hidden" name="id" value="<?php echo $nurse_aid_id;?>">


    <a href="Add-Nurse-Aide.php" class="btn" >Add New</a>

    <?php if ($update == true): ?>
	     <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button><br>
      <?php if(isset($_POST['update'])){
         // Escape user inputs for security
         $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
         $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
         $email = mysqli_real_escape_string($link, $_REQUEST['email']);
         $set_id = mysqli_real_escape_string($link, $_REQUEST['set_id']);
         $cert_id = mysqli_real_escape_string($link, $_REQUEST['cert_id']);

         // Auo-set unit unit_manager_id
         if ($set_id == 1| $set_id == 3 | $set_id == 4) {
           $unit_manager_id = 1;
         }
         elseif ($set_id == 2| $set_id == 5 | $set_id == 6) {
           $unit_manager_id = 2;
         }
         else {
           //do nothing
         }

        //Attempt query
       $sql = "UPDATE NurseAids SET first_name='$first_name', last_name='$last_name', email='$email', unit_manager_id=$unit_manager_id, set_id=$set_id, cert_id=$cert_id WHERE nurse_aid_id=$nurse_aid_id";
       if(mysqli_query($link, $sql)){
           echo "Nurse Aide Saved";

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

      <a href="Nurse-Aides.php" class="btn" >Done</a>



  </body>

</html>

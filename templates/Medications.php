<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect('localhost', 'root', '', 'cmsc508');
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// initialize variables
  $med_id = 0;
  $med_name  = "";

?>

<?php
$update = false;
if (isset($_GET['edit'])) {
  $med_id = $_GET['edit'];
  $update = true;
  $record = mysqli_query($link, "SELECT * FROM Medications  WHERE med_id=$med_id");

  if (@count($record) == 1 ) {
    $n = mysqli_fetch_array($record);
    $med_name = $n['med_name'];

  }
}


?>
<?php
if (isset($_GET['del'])) {
$med_id = $_GET['del'];
mysqli_query($link, "DELETE FROM Medications WHERE med_id=$med_id");
$_SESSION['message'] = "Medication deleted!";
header('location: Medications.php');
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
<?php $results = mysqli_query($link, "SELECT * FROM Medications ORDER BY med_id"); ?>
  <h1>Medications</h1>

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
			<th>Medication</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['med_id']; ?></td>
			<td><?php echo $row['med_name']; ?></td>

			<td>
				<a href="Medications.php?edit=<?php echo $row['med_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="Medications.php?del=<?php echo $row['med_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table><br><br><br>


<div class="flex-container2">
  <form  method="post">

    <div class="namelable">
      <label for="medication">Medication</label><br>
      <input type="text" id="med_name" name="med_name" value="<?php echo $med_name; ?>" ><br><br>





      <input type="hidden" name="id" value="<?php echo $med_id;?>">


    <a href="Add-Medication.php" class="btn">Add New Med</a>

    <?php if ($update == true): ?>
	     <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button><br>
      <?php if(isset($_POST['update'])){
         // Escape user inputs for security
         $med_name = mysqli_real_escape_string($link, $_REQUEST['med_name']);




        //Attempt query
       $sql = "UPDATE Medications SET med_name='$med_name' WHERE med_id=$med_id";
       if(mysqli_query($link, $sql)){
           echo "Medication Saved";

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

      <a href="Medications.php" class="btn" >Done</a>



  </body>

</html>

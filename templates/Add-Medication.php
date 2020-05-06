<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>PRC Database</title>
  <link rel="stylesheet" href="../stylesheets/login.css">
  <link rel="stylesheet" href="../stylesheets/Add.css">
  <link rel="stylesheet" href="../stylesheets/style.css">

</head>

<body>
  <h1>ADD A NEW MEDICATION PRESCRIPTION</h1>

    <a href="logout.php">
      <button class="button logout">LOGOUT</button>
    </a>
    <a href="Medications.php">
      <button class="button logout">BACK</button>
    </a>
    <img src="../Img/AegisX.png" alt="Logo" height="350px" width="350px">
    <div class="flex-container2">
      <form action="insert_medication.php" method="post">

        <div class="namelable">
          <label for="med_name">Medication</label><br>
          <input type="text" id="med_name" name="med_name" ><br><br>


          <input type="submit" value="Submit">

        </div>


      </form>
    </div>


  </body>

</html>

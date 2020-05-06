
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>PRC Database</title>
  <link rel="stylesheet" href="../stylesheets/login.css">
  <link rel="stylesheet" href="../stylesheets/Home.css">
  <link rel="stylesheet" href="../stylesheets/style.css">


</head>

<body>
  <h1>WELCOME TO THE PRC DATABASE</h1>

  <a href="logout.php">
    <button class="logout_btn">LOGOUT</button>
  </a>

  <img src="../Img/AegisX.png" alt="Logo" height="350px" class="image"width="350px">

  <h3>Select One To View</h3>
  <div class="flex-container2">
    <a href="Nurses.php">
      <button class="button search">Nurses</button>
    </a>
    <a href="Patients.php">
      <button class="button add">Patients</button>
    </a>
  </div>

  <div class="flex-container2">
    <a href="Nurse-Aides.php">
      <button class="button update">Nurse Aides</button>
    </a>
    <a href="Medications.php">
      <button class="button delete">Medications</button>
    </a>
  </div>
</body>

</html>

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
  <h1>ADD A NEW NURSE AID</h1>

    <a href="logout.php">
      <button class="button logout">LOGOUT</button>
    </a>
    <a href="Nurse-Aides.php">
      <button class="button logout">BACK</button>
    </a>
    <img src="../Img/AegisX.png" alt="Logo" height="350px" width="350px">
    <div class="flex-container2">
      <form action="insert_nurse_aid.php" method="post">

        <div class="namelable">
          <label for="fname">First name</label><br>
          <input type="text" id="first_name" name="first_name" ><br><br>
          <label for="lname">Last name</label><br>
          <input type="text" id="last_name" name="last_name" ><br><br>



          <label for="email">Email Address </label><br>
          <input type="email" id="email" name="email"><br><br>

          <label for="date_added"> Date Added </label><br>
          <input type="date" id="date_added" name="date_added"><br><br>


          <label for="set"> Set </label><br>
          <input type="number" id="set_ID" name="set_id"><br><br>

          <label for="certification">Cerfication</label><br>
          <select id="cert_id" name="cert_id">
            <option value=4>N/A</option>
            <option value=1>RN</option>
            <option value=2>LPN</option>
            <option value=3>CNA</option>
          </select><br><br>

          <input type="submit" value="Submit">

        </div>


      </form>
    </div>


  </body>

</html>

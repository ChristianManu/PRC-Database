
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
  <h1>ADD A New Patient</h1>

    <a href="logout.php">
      <button class="button logout">LOGOUT</button>
    </a>
    <a href="Patients.php">
      <button class="buttont logout">BACK</button>
    </a>
    <img src="../Img/AegisX.png" alt="Logo" height="350px" width="350px">
    <div class="flex-container2">
      <form action="insert_patient.php" method="post">

        <div class="namelable">
          <label for="fname">First Name</label><br>
          <input type="text" id="first_name" name="first_name" ><br><br>
          <label for="lname">Last Name</label><br>
          <input type="text" id="last_name" name="last_name" ><br><br>


          <label for="date_admitted"> Date Admitted </label><br>
          <input type="date" id="date_admitted" name="birthdate"><br><br>

          <label for="room_num"> Room Number </label><br>
          <input type="number" id="room_num" name="room_num"><br><br>

          <label for="unit">Bath Time Preference</label><br>
          <select id="bath_time" name="bath_time">d
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
            <option value="Night">Night</option>
          </select><br><br>

          <label for="med_id">Medication</label><br>
          <select id="med_id" name="med_id">
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

          <label for="set"> SET </label><br>
          <input type="number" id="set_id" name="set_id"><br><br>


          <input type="submit" value="Submit">

        </div>


      </form>
    </div>


  </body>

</html>

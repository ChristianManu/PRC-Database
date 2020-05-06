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
  <h1>ADD A NEW NURSE</h1>

    <a href="logout.php">
      <button class="button logout">LOGOUT</button>
    </a>
    <a href="Nurses.php">
      <button class="buttont logout">BACK</button>
    </a>
    <img src="../Img/AegisX.png" alt="Logo" height="350px" width="350px">
    <div class="flex-container2">
      <form action="insert_nurse.php" method="post">

        <div class="namelable">
          <label for="fname">First name</label><br>
          <input type="text" id="first_name" name="first_name" ><br><br>
          <label for="lname">Last name</label><br>
          <input type="text" id="last_name" name="last_name" ><br><br>



          <label for="email">Email Address</label><br>
          <input type="email" id="email" name="email"><br><br>

          <label for="birthdate"> Birthdate (yyyy-mm-dd) </label><br>
          <input type="date" id="birthdate" name="birthdate"><br><br>



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

          <label for="certification">Cerfication</label><br>
          <select id="cert_id" name="cert_id">
            <option value=4>N/A</option>
            <option value=1>RN</option>
            <option value=2>LPN</option>
          </select><br><br>

          <input type="submit" value="Submit">

        </div>


      </form>
    </div>


  </body>

</html>

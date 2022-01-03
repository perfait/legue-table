<?php
  require_once("php/db.php");
  require_once("php/operations.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBL</title>
    <!-- add icon link -->
    <link rel = "icon" href = "assets/logo.png" 
        type = "image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark w-auto">
<div id="logo"> 
	<img src="assets/logo2.png" height="30" width ="120" style="margin-left: 30px;"> 
</div> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav" style=" width: 100%; text-align: center; margin-left: 100px; height:100%;">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Standings </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="top-scorers.php">Top Scorers</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="update-scores.php">Update Scores</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add-teams.php">Add Teams</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add-players.php">Add Players</span></a>
      </li>
    </ul>
  </div>
</nav>



<div class="d-flex justify-content-center pt-5">
<form action="" method="post" class="w-50">


<h3>Match Scores</h3>
<div class="form-group">
<select class="browser-default custom-select" name = "homeSelect">
    <option disabled selected>-- Select home team --</option>
    <?php
        $records = mysqli_query($con, "SELECT team_name FROM `teams` ORDER BY team_name ASC");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['team_name'] ."'>" .$data['team_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>

<label for="scores" style="padding-top: 1em;">Enter its score</label>
  <input type="text" class="form-control" name="homeTeamScore">
</div>


<div class="form-group">
<select class="browser-default custom-select" name = "awaySelect">
    <option disabled selected>-- Select away team --</option>
    <?php
        $records2 = mysqli_query($con, "SELECT team_name FROM `teams` ORDER BY team_name ASC");  // Use select query here 

        while($data2 = mysqli_fetch_array($records2))
        {
            echo "<option value='". $data2['team_name'] ."'>" .$data2['team_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
<label for="scores" style="padding-top: 1em;">Enter its score</label>
  <input type="text" class="form-control" name="awayTeamScore">
</div>
<button type="submit" class="btn btn-primary" name="scores">Submit</button>

</form>
</div>






<div class="d-flex justify-content-center pt-5">
<form action="" method="post" class="w-50">
<h3>Goal Scorers</h3>
<div class="form-group">
  <label for="scorerName">Name of Scorer:</label>
  <input type="text" class="form-control" name="scorerName" id="scorerName">

  <label for="numberOfGoals">Number of Goals</label>
  <input type="text" class="form-control" name="numberOfGoals">
</div>
<button type="submit" class="btn btn-primary" name="scorers">Submit</button>
</form>
</div>


<p style="display: block; text-align: center; font-size: 11px;">© 2021 Copyright: Perfait Akaka</p>




<script type="text/javascript">
    $(function(){
        $("#scorerName").autocomplete({
            source :'search.php'
        });
    });


</script>

</body>
</html>

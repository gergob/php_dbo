<?php

require_once('employee_repository.php');

$repo = new EmployeesRepository("localhost", "employees", "emp_user", "emp_user1234");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySQL Employee Database</title>

    <!-- Bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  	 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MySQL Employee Database</a>
        </div>
      </div>
    </nav>

  	<div class="container" style="margin-top:2.5em;">
    <h1>Employees</h1>

<?php

    $min = 150000; //this can come from input or session
    $max = 155000;

    try{
      $result = $repo->getEmployeesWithSalariesBetween($min, $max);
    }
    catch(PDOException $pdoEx){
      echo $repo->formatErrorMessage($pdoEx->getMessage());
      die();
    }
    echo "<h2>Employees with salary between:$".$min." and $".$max.":</h2>" ;

    while ($item = $result->fetch()) {
      echo "<p>[$".$item['salary']."] ".$item['first_name']." ".$item['last_name']."</p>";
    }

?>



    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  </body>
</html>


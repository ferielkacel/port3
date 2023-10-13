<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<style>
        /* Add some spacing between inputs */
        input {
            margin-bottom: 10px; /* Adjust the value to control the vertical spacing */
        }
       body{
        background-color: black;
      
  /* Center horizontally */
    text-align: center; /* Center vertically */
   
        color: rgb(230, 162, 162);
       }

       .big{
        color: white;
       }
.button{
    background-color: pink;
    color: black;
    border: 2px solid black;
    border-radius: 10px; /* Adjust the value for the desired level of roundness */
    padding: 10px 20px; /* You can adjust the padding as needed */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 2px;
    cursor: pointer;
}

   </style>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numModules = isset($_POST['numModules']) ? intval($_POST['numModules']) : 0;

    if ($numModules > 0) {
        echo "<h1 class=\"big\">Grade Report</h1>";
        $totalWeightedGrade = 0;
        $totalCoefficient=0;

        for ($i = 1; $i <= $numModules; $i++) {
            $label = isset($_POST["moduleLabel$i"]) ? $_POST["moduleLabel$i"] : "Module $i";
            $coefficient = isset($_POST["coefficient$i"]) ? floatval($_POST["coefficient$i"]) : 1;
            $grade = isset($_POST["grade$i"]) ? floatval($_POST["grade$i"]) : 0;

            $weightedGrade = $coefficient * $grade;
            $totalWeightedGrade += $weightedGrade;
            $totalCoefficient += $coefficient;

            echo "<h3>Module $i</h3>";
            echo"<br>";
            echo "Label: $label<br>";
            echo"<br>";
            echo "Coefficient: $coefficient<br>";
            echo"<br>";
            echo "Grade: $grade<br>";
            echo"<br>";
            
        }

        $weightedAverage = $totalWeightedGrade / $totalCoefficient;
        echo "calculated Average Grade: $weightedAverage<br>";
echo"<br>";
        if ($weightedAverage > 10) {
            echo "<h2 class=\"big\">You are an admin &#128512;";
            echo "<br>";
        } else {
            echo "<h2 class=\"big\">You are not an admin</h2>";
        }
        echo '<a href="grades.php" class="button">Go Back to Grades Page</a>';
    } else {
        echo " <h2 class=\"big\">Please enter a valid number of modules.</h2>";
    }
}
?>



</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Student Grade Calculator</title>
    <style>
        /* Add some spacing between inputs */
        input {
            margin-bottom: 10px; /* Adjust the value to control the vertical spacing */
        }
       body{
        background-color: black;
        
        
        color: rgb(230, 162, 162);
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
        /* Center the form elements */
        
    </style>
</head>
<script>
        function generateModuleFields() {
            const numModules = document.getElementById('numModules').value;
            const moduleFields = document.getElementById('moduleFields');

            moduleFields.innerHTML = ''; // Clear any previous fields

            for (let i = 1; i <= numModules; i++) {
                moduleFields.innerHTML += `
                    <h3>Module ${i}</h3>
                    <br>
                    <label for="moduleLabel${i}">Label:</label>
                    <input type="text" name="moduleLabel${i}" id="moduleLabel${i}" required>
                    <br>
                    <label for="coefficient${i}">Coefficient:</label>
                    <input type="number" name="coefficient${i}" id="coefficient${i}" required>
                    <br>
                    <label for="grade${i}">Grade:</label>
                    <input type="number" name="grade${i}" id="grade${i}" required>
                `;
            }
        }
    </script>
</head>
<body>
    <h1>Student Grade Calculator</h1>
    <br>
    <form action="calculate.php" method="post">
        <label for="numModules">Number of Modules:</label>
        
        <input type="number" name="numModules" id="numModules" required onchange="generateModuleFields()"><br>
        
        <div id="moduleFields"></div>
<br><br>
        <input type="submit" class="button"value="Calculate Grade Report">
    </form>

    <?php

class Module {
    protected $label;
    protected $coefficient;

    public function __construct($label, $coefficient) {
        $this->label = $label;
        $this->coefficient = $coefficient;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getCoefficient() {
        return $this->coefficient;
    }
}

class StudentGrade extends Module {
    protected $grade;

    public function __construct($label, $coefficient, $grade) {
        parent::__construct($label, $coefficient);
        $this->grade = $grade;
    }

    public function calculateWeightedGrade() {
        return $this->grade * $this->coefficient;
    }

    public function displayGradeReport() {
        echo "Module: " . $this->label . "\n";
        echo "Coefficient: " . $this->coefficient . "\n";
        echo "Grade: " . $this->grade . "\n";
        echo "Weighted Grade: " . $this->calculateWeightedGrade() . "\n";
    }
}


?>
</body>
</html>

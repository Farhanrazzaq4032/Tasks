<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPP Task 2
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">

        <form method="POST" action="">
            <label for="firstname">First Name</label><br>
            <input type="text" name="firstname" placeholder="First Name"><br>
            <label for="lasttname">Last Name</label><br>
            <input type="text" name="lastname" placeholder="Last Name"><br>
            <label for="salary">Salary</label><br>
            <input type="number" name="salary" placeholder="Salary"><br>
            <input type="submit" name="submitBtn">
        </form>

    </div>
        <?php
        class Employees{
            private $firstName;
            private $lastName;
            private $salary;

            function __construct($firstName, $lastName, $salary){
                
                $this->firstName = $firstName;
                $this->lastName = $lastName;
                $this->salary = $salary;
            }

            public function get_fullName(){
                return "Full Name:".$this->firstName. " ".$this->lastName;
            }
            public function getSalary(){
                return "Total Salary: " .$this->salary;
            }
            public function tax($salary){
                $tax = $salary * 21 /100;
                return $tax;
            }
            public function houseAlove($salary){
                $tax = $salary * 17 /100;
                return $tax;
            }
            public function health($salary){
                $tax = $salary * 10 /100;
                return $tax;
            }
            
            public function insurance ($salary){
                $tax = $salary * 7 /100;
                return $tax;
            }
            
            public function finalSalary ($salary){
                $tax = $salary * 21 /100;
                $ha = $salary * 17 /100;
                $h = $salary * 10 /100;
                $is = $salary * 7 /100;
                $total = $salary - $tax + $ha + $h - $is;
                return $total;



            }

        }
        if(isset($_POST["submitBtn"])){

            $firstName = $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $salary = $_POST["salary"];

            $obj = new Employees($firstName, $lastName, $salary);
            echo $obj->get_fullName(). "<br><hr>";
            echo $obj->getSalary(). "<br><hr>";
            echo "Tax: ".$obj->tax($salary). "<br><hr>";
            echo "House alove: ".$obj->houseAlove($salary). "<br><hr>";
            echo "Health: ".$obj->health($salary). "<br><hr>";
            echo "Insurance: ".$obj->insurance($salary). "<br><hr>";
            echo "Total Salary: ".$obj->finalSalary($salary). "<br><hr>";

            
        }
        
        ?>
        
</body>
</html>
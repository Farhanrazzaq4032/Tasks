<?php


    class Vehicle{
        public $brand = "Honda";
        public $color = "White";
        public $model = "Civic";
        public $year = "2023";


        function buyerName($name){
            return "Hello" .$name. "Vehicle brand is $this->brand color is $this->color model is $this->model and year $this->year" ;
        }

        function setValue($brand, $color, $model, $year){
            $this->brand = $brand;
            $this->color = $color;
            $this->model = $model;
            $this->year = $year;
        }

        function getValue(){    
            return $this->brand. " " .$this->color. " " .$this->model. " " .$this->year;

        }
        function displayVehicle(){
            return $this->getValue();
        }
    }
    //this used to just print class value
    $obj = new Vehicle();
    echo $obj->brand;
    echo "<hr>";
    echo $obj->color;
    echo "<hr>";
    echo $obj->model;
    echo "<hr>";
    echo $obj->year;
    echo "<hr>";
    echo "<br>";
 

    //this obj change the value 
    $brand = new Vehicle();
    $brand = "kia sportage";
    echo $brand;
    echo "<hr>";
    $color1 = new Vehicle();
    $color = "Red";
    echo $color;
    echo "<hr>";
    $model = new Vehicle();
    $model = "Kia";
    echo $model;
    echo "<hr>";
    $year = new Vehicle();
    $year = "2012";
    echo $year;
    echo "<hr>";
    echo "<br>";
     
    // this code using class Function 
    $obj1 = new Vehicle();
    echo $obj1->buyerName("farhan");
    echo "<hr>";
    echo $obj1->buyerName("Hassan");
    echo "<hr>";


    //getter and setter function to used get value and set value

    $obj2 = new Vehicle();
    $obj2->setValue("BMw", "Black", "BMD", "2025");
    echo $obj2->displayVehicle();
    echo "<hr>";
    echo "<br>";
    //Array data set to the  class properties by using function

    $arrayData = array(
        ["brand" => "Honda", "color" => "red", "model" => "Civic", "year" =>"2012"],
        ["brand" => "Kia", "color" => "black", "model" => "gv3", "year" =>"2002"],
        ["brand" => "BMW", "color" => "white", "model" => "hejf", "year" =>"2023"],
        ["brand" => "Sport Car", "color" => "blue", "model" => "jflksd", "year" =>"2000"]
    );
     echo "<h4>Array data display </h4>";
    $obj3 = new Vehicle;
    foreach($arrayData as $row){
        $obj3->setValue($row["brand"], $row["color"], $row["model"], $row["year"]);
        echo $obj3->displayVehicle();
        echo "<hr>";
    }

?>
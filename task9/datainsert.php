<?php

    class dataInsert {

        private $con;

        function con(){
        $con = mysqli_connect("localhost", "root", "", "task7");
        return $con;
        }
        function sql($sqlQuery){
            echo "hey";
            $query_run = mysqli_query($this->con(), $sqlQuery);
            if(isset($query_run)){
                echo "query Run";
            }
            else{
             echo "not run query";
            }
        }
    }

    $obj = new dataInsert();
    $sqlQuery = "INSERT INTO `user` (`id`, `name`) VALUES (NULL, 'usman')";
    $obj->sql($sqlQuery);




?>
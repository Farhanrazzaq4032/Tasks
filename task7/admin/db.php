<?php
define("DB_HOST","localhost");
define("DB_USER", "root");
define("DB_PASS","");
define("DB_NAME", "task7");

$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$con){
    echo"<h2>Database Not Connect</h2>";
}

?>
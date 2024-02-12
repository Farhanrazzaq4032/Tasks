<?php require "db.php";?>
<?php
    if(isset($_GET["buBtn"])){
        $id = $_GET["buBtn"];
        $query = "SELECT emp_status FROM employer WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($con, $query);
        
        while($row = mysqli_fetch_assoc($result)){
            $status = $row["emp_status"];
            if($status == '1'){
                $query = "UPDATE employer SET emp_status = '2' WHERE id = '$id'";
                mysqli_query($con, $query);
                header('location: index.php');
            }
            elseif($status == '2'){
                $query = "UPDATE employer SET emp_status = '1' WHERE id = '$id'";
                mysqli_query($con, $query);
                header('location: index.php');
            }
            
        }
      
    }
?>
<?php
require "header.php";
require "db.php";
?>

<?php 


    if(isset($_GET["delete"])){
        $id = $_GET["emid"];
        $query = "DELETE FROM employer WHERE id ='$id'";
        mysqli_query($con, $query);

    }
?>


<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form method="GET" action="">
                    <input type="hidden" name="emid" class="id">
                    <p>
                        You want to Delete this Employer
                    </p>
                </div>
                <div class="modal-footer">
                <button type="submit" name="delete" class="btn btn-danger">Confirm</button>
                </form>
                </div>
        </div>
    </div>
</div>
<div class = "emp_listBtn">
        <a href="addemp.php"><button>Add Employer</button></a>
    </div>
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Country</th>
        <th>City</th>
        <th>Gander</th>
        <th>Language</th>
        <th>Bio</th>
        <th>Status</th>
        <th>Action</th>
        <th>Delete</th>
    </tr>
    <tr>
        <?php
        function bu($a){
            if($a == 1){
            echo "Active";
            }
            else
            echo "Ban";
        }
        function buBtn($a){
            if($a == 1){
            echo "Ban";
            }
            else
            echo "Active";
        }


        $query = "SELECT *FROM employer ORDER BY Id DESC";
        $query_run = mysqli_query($con, $query);

        ?>

       <?php while($row = mysqli_fetch_assoc($query_run)): ?>
        
            
        <tr>
            <td><?php echo $row["emp_name"] ?></td>
            <td><?php echo $row["emp_email"] ?></td>
            <td><?php echo $row["emp_pass"] ?></td>
            <td><?php echo $row["emp_country"] ?></td>
            <td><?php echo $row["emp_city"] ?></td>
            <td><?php echo $row["emp_gander"] ?></td>
            <td><?php echo $row["language"] ?></td>
            <td><?php echo $row["emp_bio"] ?></td>
            <td><?php bu($row["emp_status"]) ?></td>
            <td>
                <form method="get" action="code.php">
                <button name="buBtn" class="btn btn-danger " value="<?php echo $row["id"]; ?>"><?php buBtn($row["emp_status"]); ?></button>
                </form>
            </td>
            <td>
            <button href="button" class="btn btn-danger btn-sm deletebtn" value="<?= $row['id']; ?>">Delete</button>
            </td>
        </tr>


        <?php endwhile; ?>
    </tr>
</table>




<?php include "footer.php" ?>
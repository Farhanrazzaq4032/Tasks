<?php
require "admin/header.php";
require "admin/db.php";

if (isset($_SESSION["check"])) {
    $id = $_SESSION["employer"];

    $query = "SELECT * FROM employer WHERE id = '$id'";
    $query_run = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $emp_name = $row["emp_name"];
        $_SESSION['emp_name'] = [
            'name'=>$emp_name
        ];

        $status_id = $row["emp_status"];
    }
    if ($status_id == 2) {
        unset($_SESSION["check"]);
        session_destroy();
        $_SESSION['messag'] = "Ban By Admin";
        header('location: index.php');
    }
}

if (!isset($_SESSION["check"])) {
    header('location: index.php');
}
if (isset($_GET["logout"])) {
    unset($_SESSION["check"]);
    session_destroy();
    header('location: index.php');
    $_SESSION['message'] = "Log Out Sucesfully";
}
?>

<h1 style="color: green; text-align: center; margin: 30px"><?= $_SESSION['emp_name']['name'];?></h1>


<div style="text-align: right;margin-right:20px;">
    <form method="GET" action="">
        <a href="edit_profile.php?action=<?php echo $_SESSION["employer"]; ?>" class="btn btn-primary">Edit</a>
        <button type="submit" class="btn btn-primary" name="logout">Log Out</button>
    </form>
</div>

<table class="table_emp">
    <?php include 'message.php' ?>
    <tr>
        <th>Name</th>
        <th>Country</th>
        <th>City</th>
        <th>Gander</th>
        <th>Language</th>
        <th>Bio</th>
    </tr>
    <tr>
        <?php
        if (isset($_SESSION["check"])) {
            $id = $_SESSION["employer"];
            $query = "SELECT * FROM employer WHERE id = '$id'";
            $query_run = mysqli_query($con, $query);
        ?>

            <?php while ($row = mysqli_fetch_assoc($query_run)) : ?>


    <tr>
        <td><?php echo $row["emp_name"] ?></td>
        <td><?php echo $row["emp_country"] ?></td>
        <td><?php echo $row["emp_city"] ?></td>
        <td><?php echo $row["emp_gander"] ?></td>
        <td><?php echo $row["language"] ?></td>
        <td><?php echo $row["emp_bio"] ?></td>
    </tr>


<?php endwhile;
        } ?>
</tr>
</table>


<?php require "admin/footer.php" ?>
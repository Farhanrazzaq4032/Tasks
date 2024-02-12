<?php
require "admin/header.php";
require "admin/db.php";

if (isset($_SESSION["check"])) {
  header('location: profile.php');
}
?>

<form method="POST">
  <?php include 'message.php' ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password">
  </div>
  <div class="form-group form-check">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>

<?php
if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $pass = md5($_POST["pass"]);

  $query = "SELECT * FROM employer WHERE emp_email = '$email' AND emp_pass = '$pass' LIMIT 1";
  $query_run = mysqli_query($con, $query);

  if (mysqli_num_rows($query_run) > 0) {

    while ($row = mysqli_fetch_assoc($query_run)) {
      $id = $row["id"];
      $status = $row["emp_status"];
    }
    if ($status == 1) {

      $_SESSION["check"] = 1;
      $_SESSION["employer"] = $id;
      $_SESSION["status"] = $status;
      header('location: profile.php');
    } else
      $_SESSION['message'] = "You are Ban by Admin";
      header('location: index.php');

  } else
    $_SESSION['message'] =  "Enter valid Email and Password";
    header('location: index.php');


}

?>

<?php require "admin/footer.php" ?>
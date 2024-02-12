<?php
    ob_start();
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: cusinvoice.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        div{
            font-size: 30px;
        }
        form{
            padding-top: 30px;
            padding-left: 100px;
        }
        label, input{
            margin: 10px;
        }
    </style>
</head>
<body>
        <?php
            if(isset($_POST["loginBtn"])){
                $user = $_POST["fname"];
                if($user == "hassan"){
                    $_SESSION["user"] = 1;
                    echo $_SESSION["fname"] = $user;
                    header("Location: cusinvoice.php");
                }
                else{
                    echo"Enter First Name";
                }
            }
        ?>

    <div>
        <form method="POST" action="">
            <label>First Name</label>
            <input type="text" name="fname"><br>
            <label>Last Name</label>
            <input type="text" name="lname"><br>
            <input type="submit" name="loginBtn">
        </form>
    </div>
</body>
</html>
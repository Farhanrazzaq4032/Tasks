<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 4</title>
    <style>
        .form {
            background: radial-gradient(circle, rgba(125, 126, 130, 1) 0%, rgba(103, 46, 69, 1) 0%, rgba(239, 239, 114, 1) 0%, rgba(239, 239, 135, 1) 0%, rgba(235, 222, 233, 1) 0%);
            margin-top: 30px;
        }

        .form form {
            padding: 20px;
            margin-left: 40%;
        }

        .form h1 {
            text-align: center;
        }

        label,
        input,
        textarea {
            margin-bottom: 10px;
            font-size: 20px;
        }
        .output {
            text-align: center;
            margin-bottom: 20px;
            font-size: 25px;
            background: radial-gradient(circle, rgba(57, 72, 133, 1) 0%, rgba(103, 46, 69, 1) 0%, rgba(239, 239, 114, 1) 0%, rgba(164, 160, 142, 1) 0%, rgba(235, 222, 233, 1) 0%, rgba(232, 186, 225, 1) 0%);
        }
    </style>
</head>

<body>
    <div class="form">
        <h1>Input Form</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username"><br>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter Email"><br>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter 12345"><br>
            <label for="comments">Comments</label><br>
            <textarea style="width: 25%; height: 100px;" name="comment" id="" cols="30" rows="10" Enter Your Comments></textarea><br>
            <input type="submit" name="submitbtn">
        </form>
    </div>

    <!-- Output coding -->
    <div class="output">

        <h1>Result</h1>
        <?php
        if(isset($_POST["submitbtn"])){

            $username = $_POST["username"];
            $email = $_POST["email"];
            $user_password = $_POST["password"];
            $comment =nl2br(htmlspecialchars($_POST["comment"]));

            $email_name = strstr($email, "@", true);
            $dp_password = "827ccb0eea8a706c4c34a16891f84e7b";
            

        
        if(md5($user_password) == $dp_password) {
            echo "Username: $username<br>";
            echo "Email Name: $email_name<br>";
            echo "Confirm_Password: $user_password<br>";
            echo (str_replace($username, "<span style=background-color:yellow>$username</span>", $comment));
        }
        else{
            echo "<span style=color:red>Wrong Password</span>";
        }
    }
        
        ?>
    </div>
</body>

</html>
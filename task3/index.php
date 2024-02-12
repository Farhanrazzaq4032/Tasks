<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
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
        select {
            margin-bottom: 10px;
        }

        .output {
            text-align: center;
            margin-bottom: 20px;
            background: radial-gradient(circle, rgba(57, 72, 133, 1) 0%, rgba(103, 46, 69, 1) 0%, rgba(239, 239, 114, 1) 0%, rgba(164, 160, 142, 1) 0%, rgba(235, 222, 233, 1) 0%, rgba(232, 186, 225, 1) 0%);
        }
    </style>
</head>

<body>
    <div class="form">
        <h1>Input Form</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname"><br>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname"><br>
            <label for="username">Username</label>
            <input type="text" name="username"><br>
            <label for="email">Email</label>
            <input type="email" name="email"><br>
            <label for="password">Password</label>
            <input type="password" name="password"><br>
            <label for="country">Country</label>
            <select name="country" id="country">
                <option value="">select country</option>
                <option value="Pakistan">Pakistan</option>
                <option value="India">India</option>
                <option value="Aus">Aus</option>
            </select><br>
            <label for="city">City</label>
            <select name="city" id="city">
                <option value="">select city</option>
                <option value="Khanewal">Khanewal</option>
                <option value="Lahore">Lahore</option>
                <option value="Lahore">Lahore</option>
            </select><br>
            <label for="file">Image</label>
            <input type="file" name="file"><br><br>
            <input type="submit" name="submitbtn">
        </form>
    </div>
    <div class="output">

        <h1>Result</h1>

        <?php
        if (isset($_POST["submitbtn"])) {
            $fnlen = strlen(trim($_POST["firstname"]));
            $lastname = $_POST["lastname"];
            $lnlen = strlen(trim($lastname));
            $username = strlen(trim($_POST["username"]));
            $email = $_POST["email"];
            $password = strlen($_POST["password"]);
            $country = trim($_POST["country"]);
            $city = trim($_POST["city"]);
            $file = $_FILES["file"];
            $file_size = $file["size"] / 1024;

            // print_r($file_size);


            if (trim($fnlen <= 5)) {

                echo "<h5 style='color: red'>First name must be greather then 5 charactors.</h5>";
            } elseif ($fnlen >= 16) {

                echo "<h5 style='color: red'>First name must be less then 16 charactors.</h5>";
            } elseif ($lnlen < 3 or $lnlen > 10) {

                echo "<h5 style='color: red'>Last name must be greather then 3 and less then 10 charactors</h5>";
            } elseif ($username <= 4 or $username >= 10) {
                echo "<h5 style='color: red'>Username must be greather then 4 and less then 10 charactors</h5>";
            } elseif ($password < 6 or $password > 10) {
                echo "<h5 style='color: red'>password must be greather then 6 and less then 10</h5>";
            } elseif (empty($country)) {

                echo "<h5 style='color: red'>Please select any country</h5>";
            } elseif (empty($city)) {
                echo "<h5 style='color: red'>Please select any city</h5>";
            } elseif ($file_size < 200 or $file_size > 1024) {
                echo "<h3 style='color: red'>Image size greather then 100kb and less then 1Mb </h3>";
            } else {
                echo "<span style='color:blue; font-size:20px;'>Full Name:</span> <span style='color:green; font-size:20px;'>" . $_POST["firstname"] . " " . $lastname . "</span><br>";
                echo "Country: " . $_POST["country"] . "<br>";
                echo "City: " . $_POST["city"] . "<br>";
                echo "Usename: " . $_POST["username"] . "<br>";
                echo "Email: " . $_POST["email"] . "<br>";
                echo "password: " . $_POST["password"] . "<br>";
                echo "Image: " . "<img src='" . $file['tmp_name'] . "'>" . "<br>";
            }
        }
        ?>
    </div>
</body>

</html>
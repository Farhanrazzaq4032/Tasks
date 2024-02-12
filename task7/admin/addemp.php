<?php
require "header.php";
require "db.php";
?>
    <div class="form">
        <h2>Enter Employer Data</h2>
        <form method="POST" action="">
            <label for="name">Employer Name</label>
            <input type="text" name="empname" placeholder="Enter Employer Name">greather then 5 and less then 20 charactors<br>
            <label for="email">Employer Email</label>
            <input type="email" name="email" placeholder="Enter Employer Email"><br>
            <label for="password">Employer Password</label>
            <input type="password" name="password" placeholder="Enter Employer Password">greather then 6 and less then 15<br>
            <label for="country">Employer Country</label>
            <select name="country" id="">
                <option value="">Select country</option>
                <option value="Pakistan">Pakistan</option>
                <option value="India">India</option>
                <option value="USA">USA</option>
            </select><br>
            <label for="city">Employer City</label>
            <select name="city" id="">
                <option value="">Select City</option>
                <option value="lahore">lahore</option>
                <option value="Khanewal">Khanewal</option>
                <option value="Karchi">Karchi</option>
            </select><br>
            <label for="gander">Gander</label>
            <input type="radio" name="gander" value="Male">
            Male
            <input type="radio" name="gander" value="Female">
            Female<br>
            <label for="language">Language</label><br>
            <input type="checkbox" name="lang[]" value="English">
            <label for="English">English</label><br>
            <input type="checkbox" name="lang[]" value="Urdu">
            <label for="urdu">Urdu</label><br>
            <input type="checkbox" name="lang[]" value="Punjabi">
            <label for="punjabi">Punjabi</label><br>
            <label for="employerBio">Employer Bio</label><br>
            <textarea style="width: 25%; height: 100px;" name="employerBio" id="" cols="30" rows="10" Enter Your Comments></textarea>Bio is 30 characters<br>
            <input type="submit" name="submitbtn">
        </form>
    </div>
    <?php
        if(isset($_POST["submitbtn"])){
            $emp_name = ($_POST["empname"]);
            $emp_email = trim($_POST["email"]);
            $emp_ipass = trim($_POST["password"]);
            $emp_pass = md5(trim($_POST["password"]));
            $emp_country = trim($_POST["country"]);
            $emp_city = trim($_POST["city"]);
            $emp_ibio = (htmlspecialchars($_POST["employerBio"]));
        

            if (strlen(trim($emp_name )) <= 5 || strlen(trim($emp_name )) >= 20) {
                echo "<h5 style='color: red'>Employer Name must be greather then 5 and less then 20 charactors</h5>";
            } elseif (empty($emp_email)) {
                echo "<h5 style='color: red'>Enter Email</h5>";
            } elseif (strlen(trim($emp_ipass)) <= 6 || strlen(trim($emp_ipass)) >= 15) {
                echo "<h5 style='color: red'>password must be greather then 6 and less then 15</h5>";
            } elseif (empty($emp_country)) {
                echo "<h5 style='color: red'>Please select any country</h5>";
            } elseif (empty($emp_city)) {
                echo "<h5 style='color: red'>Please select any city</h5>";
            } elseif (empty($_POST["gander"])) {
                echo "<h5 style='color: red'>Please select your Gander</h5>";
            } elseif (empty($_POST["lang"])) {
                echo "<h5 style='color: red'>Select Employer Language</h5>";
            } elseif (empty($emp_ibio) || strlen(trim($emp_ibio)) > 30) {
                echo "<h5 style='color: red'>Employer Bio is  30 characters</h5>";
            }
             else {
                $emp_gander = ($_POST["gander"]);
                $language = @implode(",",$_POST["lang"]);
                $emp_bio = nl2br($emp_ibio);

                $query_ev = "SELECT * FROM employer WHERE emp_email = '$emp_email'";
                $query_run_ev = mysqli_query($con, $query_ev);
                if(mysqli_num_rows($query_run_ev) > 0){
                    echo "<h4 style='color:red'>Email Already have use</h4>";
                }
                else
                {
                    $query =  "INSERT INTO employer (emp_name, emp_email, emp_pass, emp_country, emp_city, emp_gander, language, emp_bio) VALUE ('$emp_name', '$emp_email', '$emp_pass', '$emp_country', '$emp_city', '$emp_gander', '$language', '$emp_bio')";
                    $query_run = mysqli_query($con, $query); 
                    echo "<h4 style='color:green'>Data Inserted in Database</h4>";
                    header('location: index.php');

                }

            }
        }
    ?>


<?php require "footer.php" ?>

<?php
require "admin/header.php";
require "admin/db.php";

if(isset($_POST["submitbtn"])){
    $id = $_POST["id"];
    $emp_name = $_POST["empname"];
    $emp_country = $_POST["country"];
    $emp_city = $_POST["city"];
    $emp_gander = ($_POST["gander"]);
    $language =empty($_POST["lang"]);
    $emp_ibio = nl2br((htmlspecialchars($_POST["employerBio"])));

    if (strlen(trim($emp_name )) <= 5 || strlen(trim($emp_name )) >= 20) {
        echo "<h5 style='color: red'>Employer Name must be greather then 5 and less then 20 charactors</h5>";
    }
    elseif (empty($emp_ibio) || strlen(trim($emp_ibio)) > 30) {
        echo "<h5 style='color: red'>Employer Bio is  30 characters</h5>";
    }
    elseif(!$language){

        $language = @implode(",",$_POST["lang"]);
        $query = "UPDATE employer SET emp_name = '$emp_name', emp_country = '$emp_country', emp_city = '$emp_city', emp_gander = '$emp_gander', language = '$language', emp_bio = '$emp_ibio' WHERE id = '$id'";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            header('location: profile.php');
        }
    }

    else{
        
    $query = "UPDATE employer SET emp_name = '$emp_name', emp_country = '$emp_country', emp_city = '$emp_city', emp_gander = '$emp_gander', emp_bio = '$emp_ibio' WHERE id = '$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run){
        header('location: profile.php');
    }
   }
}

?>

<?php
if (isset($_SESSION["check"])) {
    $id = $_SESSION["employer"];
    $query = "SELECT * FROM employer WHERE id = '$id' LIMIT 1";
    $query_run = mysqli_query($con, $query);
?>
    <?php while ($row = mysqli_fetch_assoc($query_run)) : 
        $emp_bio = $row["emp_bio"];
        $emp_bior = (str_replace("<br />", "", $emp_bio));

        ?>

        <form style="margin: 30px;" method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $row["id"];?>">
            <label for="name">Employer Name</label>
            <input type="text" name="empname" value="<?php echo $row["emp_name"];?>">greather then 5 and less then 20 charactors<br>
            <label for="country">Employer Country</label>
            <select name="country" id="">
                <option value="<?php echo $row["emp_country"];?>"><?php echo $row["emp_country"];?></option>
                <option value="Pakistan">Pakistan</option>
                <option value="India">India</option>
                <option value="USA">USA</option>
            </select><br>
            <label for="city">Employer City</label>
            <select name="city" id="">
                <option value="<?php echo $row["emp_city"];?>"><?php echo $row["emp_city"];?></option>
                <option value="lahore">lahore</option>
                <option value="Khanewal">Khanewal</option>
                <option value="Karchi">Karchi</option>
            </select><br>
            <label for="gander">Gander:</label> <?php echo $row["emp_gander"];?><br>
            <input type="hidden" name="gander" value="<?php echo $row["emp_gander"];?>">
            <input type="radio" name="gander" value="Male">
            Male
            <input type="radio" name="gander" value="Female">
            Female<br>
            <label for="language">Language:</label><?php echo $row["language"];?><br>
            <input type="checkbox" name="lang[]" value="English">
            <label for="English">English</label><br>
            <input type="checkbox" name="lang[]" value="Urdu">
            <label for="urdu">Urdu</label><br>
            <input type="checkbox" name="lang[]" value="Punjabi">
            <label for="punjabi">Punjabi</label><br>
            <label for="employerBio">Employer Bio</label><br>
            <textarea style="width: 25%; height: 100px;" name="employerBio" id="" cols="30" rows="10" Enter Your Comments><?php echo $emp_bior;?></textarea>Employer Bio is  30 characters<br>
            <input type="submit" name="submitbtn">
        </form>

<?php endwhile;
} ?>



<?php require "admin/footer.php" ?>

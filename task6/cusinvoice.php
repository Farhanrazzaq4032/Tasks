<?php
    ob_start();
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: index.php");
    }
    if(isset($_POST["logoutBtn"])){
        unset($_SESSION["user"]);
        session_destroy();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6</title>
    <style>
        form label,
        input {
            margin: 10px;

        }

        form {
            padding-left: 100px;
            padding-top: 100px;
        }

        .form {
            background-color: rgb(168, 232, 236);
        }
        .table{
            margin-top: 30px;
            background-color: rgb(168, 232, 236);
        }
        table{
            border-collapse: collapse;
            font-size: 30px;
            padding-left: 100px;

        }
        table,th,td{
            border: 2px solid black;
        }
        .lobtn{
            margin-left: 800px;
            font-size: 15px;
            background-color: green;
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="form">
        <form method="POST">
            <div>
                <label for="product">Product</label>
                <input type="text" name="arrayData[0][product]">
                <label for="price">Price</label>
                <input type="text" name="arrayData[0][price]">
                <label for="quantity">Quantity</label>
                <input type="text" name="arrayData[0][quantity]">
            </div>
            <div>
                <label for="product">Product</label>
                <input type="text" name="arrayData[1][product]">
                <label for="price">Price</label>
                <input type="text" name="arrayData[1][price]">
                <label for="quantity">Quantity</label>
                <input type="text" name="arrayData[1][quantity]" >
            </div>
            <div>
                <label for="product">Product</label>
                <input type="text" name="arrayData[2][product]">
                <label for="price">Price</label>
                <input type="text" name="arrayData[2][price]">
                <label for="quantity">Quantity</label>
                <input type="text" name="arrayData[2][quantity]">
            </div>
            <input type="submit" name="submitBtn" value="Submit">
            <input class="lobtn" type="submit" name="logoutBtn" value="Log Out">
        </form>
    </div>
    <div class="table">
        <h1>Result</h1>
        <table>
            <tr>
                <th>name</th>
                <th colspan="6"><? echo $_SESSION["fname"]; ?></th>
            </tr>
            <tr>
                <th colspan="2">Producs</th>
                <th colspan="2">Price</th>
                <th colspan="2">Quantity</th>
                <th colspan="2">Total</th>
            </tr>
        <?php
    if (isset($_POST["submitBtn"])) {
        $user_data = $_POST["arrayData"];
        print_r($user_data);
        // $total_price = 
        $subtotal = 0;
        $discont = 20;
        $gst = 17;
        
        //Function
        function fdiscont($subtotal, $discont){
            $discont = $subtotal * $discont/100;
            return $discont;
        }
        function fgst($subtotal, $gst){
            $gst = $subtotal * $gst/100;
            return $gst;
        }
        function ffp($subtotal, $discont, $gst){
            $discont = $subtotal * $discont/100;
            $gst = $subtotal * $gst/100;
            $finalprice = $subtotal - $discont + $gst;
            return $finalprice;
        }
        foreach ($user_data as $product => $items) {
            // print_r($product[0]);
            $total_price = $items["quantity"] * $items["price"];
            $subtotal += $total_price;   
            // print_r($final_price); 
            echo "
                <tr>
                <td colspan='2'>".$items["product"]."</td>
                <td colspan='2'>".$items["price"]."</td>
                <td colspan='2'>".$items["quantity"]."</td>
                <td colspan='2'>$total_price</td>
                </tr>
            ";
        }
        echo"
        <tr>
        <th colspan='3'></th>
        <th colspan='3'>Total</th>
        <td>$subtotal</td>
        </tr>
        <tr>
        <th colspan='3'></th>
        <th colspan='3'>Discont %$discont</th>
        <td>".fdiscont($subtotal, $discont)."</td>
        </tr>
        <tr>
        <th colspan='3'></th>
        <th colspan='3'>GST %$gst</th>
        <td>".fgst($subtotal, $gst)."</td>
        </tr>
        <tr>
        <th colspan='3'></th>
        <th colspan='3'>Final Price</th>
        <td>".ffp($subtotal, $discont, $gst)."</td>
        </tr>
        ";
    }
    ?>
        </table>
    </div>
   
</body>

</html>
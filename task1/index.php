<?php
$title = "PHP 01";
$logo = "img/img.jpg";
$btn1 = "Home";
$btn2 = "ABOUT";
$elink = "https://www.w3schools.com/html/html_blocks.asp";
$semail = "send mail to DGA";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style>
        .container {
            margin: 30px;
        }
        .content{
            height: 500px;
        }

        .logo {
            text-align: center;
        }

        .logo h1 {
            padding: 20px;
            background-color: rgb(126, 126, 126);
            display: inline-block;
            border-radius: 5px;
            text-transform: uppercase;
        }

        .btn {
            text-align: center;
        }

        .btn .btn1,
        .btn2 {
            margin: 20px;
            background-color: rgb(197, 212, 214);
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            border: none;
            text-transform: uppercase;
        }

        .fdiv {
            text-align: center;
            background-color: rgb(190, 198, 199);
        }
        .fdiv a{
            text-decoration: none;
            padding: 10px 0px;
            font-size: 15px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <header>
                <div class="logo">
                    <img width="25%" height="100px" src="<?php echo $logo ?>" alt="img">
                </div>
            </header>
            <nav>
                <div class="btn">
                    <button class="btn1"><?php echo $btn1 ?></button>
                    <button class="btn2"><?php echo $btn2 ?></button>
                </div>
            </nav>
        </div>
        <footer>
            <div class="fdiv">
                <a href="<?php echo $elink ?>"><?php echo $semail ?></a>
            </div>
        </footer>
    </div>
</body>

</html>
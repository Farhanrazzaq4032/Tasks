<?php
    $title = "task 02";
    $x = 0;
    $y = 10;
    $sqe = "solve quadratic equation";
    $qe = "x^2+y^+2xy";
    $result = $x*$x+$y*$y-2*$x*$y;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title ?></title>
    <style>
        p{
            font-size: 30px;
        }
    </style>
</head>
<body>
    <h1><?php echo $sqe ?></h1>
    <p><?php echo "x =", $x?></p>
    <p><?php echo "y =", $y?></p>
    <p><?php echo $qe?> = <?php echo $result?></p>
</body>
</html>
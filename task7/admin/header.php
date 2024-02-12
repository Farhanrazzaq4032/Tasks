<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7 lec 8</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .emp_listBtn {
            align-items: center;
            justify-content: center;
            display: flex;
            gap: 30px;
            background-color: green;
            padding: 10px;
        }

        .emp_listBtn button {
            padding: 10px;
            font-size: 15px;
            color: white;
            background-color: blue;
            border: none;
            border-radius: 30px;
        }

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
        select,
        textarea {
            margin-bottom: 10px;
            font-size: 15px;
        }

        table {
            border-collapse: collapse;
            font-size: 15px;
            margin-left: 40px;
        }

        .table_emp {
            border-collapse: collapse;
            font-size: 15px;
            margin: 0 auto;
        }

        table,
        th,
        td {
            border: 3px solid;
            padding: 10px;
        }
    </style>
</head>

<body>
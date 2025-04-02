<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto', sans-serif;
        }

        /* body {
            background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%),
            linear-gradient(127deg, rgba(0,255,0,.8), rgba(0,255,0,0) 70.71%),
            linear-gradient(336deg, rgba(0,0,255,.8), rgba(0,0,255,0) 70.71%);

            background-size: cover;

            height: 100%;
            width: 100%;
        } */

        table, th, td{
            border: 2px solid black;
            border-collapse: collapse;
        }

        #create{
            height: 30px;
            width: 80px;
            margin-top: 20px;
            background-color: black;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 8px;
            padding-bottom: 8px;
            border-radius: 10px;
            margin-top: 40px;
        } 
        #create a {
            text-decoration: none;
            color: white;
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>address</th>
            <th>salary</th>
        </thead>

<?php

require_once("config.php");


$sql = "SELECT * FROM employees";
$stmt = $link->prepare($sql);

$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['salary'] . "</td>";
    echo "<td><a href=edit.php?id=" . $row['id'] . ">Edit</a>" . 
    " <a href=view.php?id=" . $row['id'] . ">View</a>" . 
    " <a href=delete.php?id=" . $row['id'] . ">Delete</a>";
    echo "</tr>";
}

$result->close();
$stmt->free_result();
$link->close();
?>
    </table>
    <div id="create"><a href="create.php">Add user</a></div>
</body>
</html>
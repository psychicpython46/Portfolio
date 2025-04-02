<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
</head>
<body>

<form action="create.php" method="post">

    <label for="name">Naam</label>
    <input required type="text" name="name" placeholder="Naam van medewerker">

    <br>

    <label for="address">address</label>
    <input required type="text" name="address" placeholder="Address van medewerker">
    
    <br>

    <label for="salary">Salaris</label>
    <input required type="text" name="salary" placeholder="Salaris van medewerker">

    <br>

    <input id="send" type="submit" value="Registreer">

</form>

<?php
    require_once "config.php";

    if($_POST != null)
    {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $salary = $_POST["salary"];

        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
        $stmt = $link->prepare($sql);

        $stmt->bind_param("sss", $param_name, $param_address, $param_salary);

        $param_name = $name;
        $param_address = $address;
        $param_salary = $salary;

        $stmt->execute();

        $stmt->free_result();   

        $link->close();
    }

?>

</body>
</html>

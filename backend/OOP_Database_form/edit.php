<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
</head>

<!-- <style>
    body {
            background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%),
            linear-gradient(127deg, rgba(0,255,0,.8), rgba(0,255,0,0) 70.71%),
            linear-gradient(336deg, rgba(0,0,255,.8), rgba(0,0,255,0) 70.71%);

            background-size: cover;

            height: 100%;
            width: 100%;
        }
</style> -->
<body>

<?php
    require_once "config.php";

    if($_POST != null)
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $salary = $_POST["salary"];

        require_once "config.php";

        $sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("sssi", $param_name, $param_address, $param_salary, $param_id);

        $param_name = $name;
        $param_address = $address;
        $param_salary = $salary;
        $param_id = $id;

        $stmt->execute();
        $stmt->free_result();
        $link->close();

        die("Item is succesvol geupdate");

    } else if($_GET != null) {
        $id = $_GET["id"];

        $sql = "SELECT * FROM employees WHERE id = ?";
        
        $stmt = $link->prepare($sql);
        
        $stmt->bind_param("i", $param_id);
        
        $param_id = trim($id);
        
        $stmt->execute();
        
        $result = $stmt->get_result();
        
        $row = $result->fetch_array(MYSQLI_ASSOC);
        
        $result->close();
        
        $stmt->free_result();   
        
        $link->close();
    } else if($_GET == null && $_POST == null) {
        die("Wat doe je hier");
    }

?>

<form action="edit.php" method="post">

    <label for="name">Naam</label>
    <input required type="text" name="name" placeholder="Naam van medewerker" value="<?php echo $row['name']?>">

    <input type="hidden" name="id" value="<?php echo $row['id']?>">

    <br>

    <label for="address">address</label>
    <input required type="text" name="address" placeholder="Address van medewerker" value="<?php echo $row['address']?>">
    
    <br>

    <label for="salary">Salaris</label>
    <input required type="text" name="salary" placeholder="Salaris van medewerker" value="<?php echo $row['salary']?>">

    <br>

    <input id="send" type="submit" value="Registreer">

</form>

</body>
</html>

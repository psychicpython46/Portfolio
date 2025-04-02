<?php
require_once "config.php";

if($_POST != null) {

    $id = $_POST["id"];
    $sql = "DELETE FROM employees WHERE id = ?";
    $stmt = $link->prepare($sql);

    $stmt->bind_param("i", $param_id);

    $param_id = trim($id);

    $stmt->execute();
    $stmt->free_result();
    $link->close();

    die("Item succesvol verwijderd");

} else if($_POST == null && $_GET == null) {
    die("Wat doe je hier");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Weet je zeker dat je dit item wilt verwijderen?</p>
    <form action="delete.php" method="post">
        <input type="submit" value="Ja">
        <?php
        if($_POST == null) {
            echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
        }
        ?>
    </form>
    <button><a href="crud.php">terug</a></button>
</body>
</html>
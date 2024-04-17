<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET["id"]) && !empty($_GET["id"])){
    $sql = "DELETE FROM `productes` WHERE id =" .  $_GET["id"];
    if ($conn->query($sql) === TRUE) {
        echo "Deleted";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

header('Location: ex1Llistat.php');
?>
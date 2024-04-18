<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        
    if(isset($_POST["nomProducte"]) && !empty($_POST["nomProducte"])){
        if($_POST["addEdit"]==0){
            $sql = "INSERT INTO productes (nom) VALUES ('" . $_POST["nomProducte"] ."')";
        }else{
            $sql = "UPDATE productes SET nom='" . $_POST["nomProducte"] . "' WHERE id=" . $_POST["addEdit"];
        }
        

        echo $sql;

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    }

    if(isset($_GET["idProdDel"]) && !empty($_GET["idProdDel"])) {
    
        $sql = "DELETE FROM productes WHERE id =" . $_GET["idProdDel"];
        
        if ($conn->query($sql) === TRUE) {
            echo "Deleted";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    
    header('Location: ex2FormLlistat.php');

?>

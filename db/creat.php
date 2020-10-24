<?php 
require ('databaseconnect.php');


function creatDb($name){

   $conn = connect();
    
    // Create database
    $sql = 'CREATE OR REPLACE DATABASE ' . $name . ";";
    if (mysqli_query($conn, $sql)) {
      echo "Database created successfully <br />";
    } else {
      echo "Error creating database: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}

function creatTableUsers ($name){

$sql = "USE " . $name . ";";
$conn = connect();
echo "DB: Criando tabela... <br />";    

$resultado = mysqli_query($conn, $sql);

if(!$resultado)

die ("Erro : Seleção database..." . mysqli_error($conn). "<br />");
echo "DB: Database selecionado... <br />";

    $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        if (mysqli_query($conn, $sql)) {
          echo "Table MyGuests created successfully";
        } else {
          echo "Error creating table: " . mysqli_error($conn);
        }
}

creatDb("Agenda");
creatTableUsers("Agenda");

?>
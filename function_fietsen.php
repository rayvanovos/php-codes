<?php
// Functie: CRUD fietsen
// Auteur: Rayvano Vos

function CrudFietsen() {
    echo "
    <h1>Crud Fietsen</h1>
    <nav>
        <a href='insert_fietsen.php'>Insert NEW Bike</a><br><br><br>
    </nav>";

    $result = getdata("fietsen");

    // Print the results in a table
    PrintCrudFietsen($result);
}

function getdata($table) {
    // Connect to database
    $conn = ConnectDb();

    // Prepare and execute query
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function ConnectDb() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ultrafietsen";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
}

function PrintCrudFietsen($result) {
    if (empty($result)) {
        echo "<p>Geen data gevonden.</p>";
        return;
    }

    $table =  "<table border='1px'>";


    // Print header table
 
    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=black>" . $header . "</th>"; 
    }
    $table .= "</tr>";


// Loop door de rijen heen
foreach ($result as $row) {
    $table .= "<tr>";

    // Loop door de cellen van de rij heen
    foreach ($row as $cell) {
        $table .= "<td>" . $cell . "</td>";
    }

    // Extra kolommen toevoegen
    // een form om bieren te wijzigen
    $table .= "<td><a href='update_fiets.php?fietscode=" . $row['fietscode'] . "'>Change</a></td>";

    $table .= "<td><a href='delete_fiets.php?fietscode=" . $row['fietscode'] . "'>Delete</a></td>";


    $table .= "</tr>";
}

// Sluit de tabel na de loop
$table .= "</table>";
echo $table;
}

function InsertFietsen($post) {
    try {
        $conn = ConnectDb();

        var_dump($post); // Dit geeft de inhoud van de $post-array weer


        $query = $conn->prepare(
            "INSERT INTO fietsen (fietscode, brouwcode, naam, land) 
            VALUES (:fietscode, :brouwcode, :naam, :land)"
        );

        $status = $query->execute([
            'fietscode' => $post['fietscode'],
            'brouwcode' => $post['brouwcode'],
            'naam' => $post['naam'],
            'land' => $post['land'],
        ]);

        echo "Insert status: " . ($status ? "Success" : "Failed");
        echo "<br>" . $query->rowCount() . " record(s) inserted.";
    } catch (PDOException $e) {
        echo "Insert failed: " . $e->getMessage();
    }
}


function DeleteFietsen($fietscode) {

    echo "Delete fietsen<br>";


    try {
        $conn = ConnectDb();

        $query = $conn->prepare("
        DELETE FROM fietsen 
        WHERE fietsen . fietscode = $fietscode");



        $status = $query->execute();

    }
    catch(PDOException $e) {
        echo "Deletion failed: " . $e->getMessage();
    }
}




function update_fietsen($post) {
    $conn = ConnectDb();

    try {
        $query = $conn->prepare("
            UPDATE fietsen 
            SET brouwcode = :brouwcode, naam = :naam, land = :land 
            WHERE fietscode = :fietscode
        ");

        $query->bindParam(':brouwcode', $post['brouwcode']);
        $query->bindParam(':naam', $post['naam']);
        $query->bindParam(':land', $post['land']);
        $query->bindParam(':fietscode', $post['fietscode']);

        $query->execute();

        echo '<script>alert("Fietsbrouwcode: ' . htmlspecialchars($post['brouwcode']) . ' is geüpdatet!")</script>';
        echo "<script>location.replace('crud_fietsen.php');</script>";
        exit;
    } catch (PDOException $e) {
        echo "Update mislukt: " . htmlspecialchars($e->getMessage());
    }
}


function GetFiets($fietscode) {
    $conn = ConnectDb();
    $sql = "SELECT * FROM fietsen WHERE fietscode = :fietscode";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['fietscode' => $fietscode]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
?>

<style>
    table {
        background-color: #000000;
        color: #ff2000;
        text-align: center;
        margin: 0 auto; 
        border-collapse: collapse;
        width: 80%;
    }

    th, td {
        padding: 10px;+
        border: 1px solid #ff2000;
    }

    input {
        background-color: #000000;
        color: #ff2000;
        border: 1px solid #ff2000;
        padding: 5px;
        cursor: pointer;
    }

    body {
        background-color: #000000;
        color: #ff2000;
        text-align: center;
    }
</style>






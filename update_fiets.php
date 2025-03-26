<?php
require_once 'function_fietsen.php';

// Test if the change button is pressed 
if (isset($_POST['btn_change'])) {
    update_fietsen($_POST);
    echo "<script> location.replace('crud_fietsen.php'); </script>";
    exit();
}

if (isset($_GET['fietscode'])) {  
    // Get all info for the selected bike
    $fietscode = $_GET['fietscode'];
    $row = GetFiets($fietscode);
    if ($row) {
?>

<html>
<body>
    <h1>Edit your Bike here</h1>

    <form method="post">
        <br>
        <label for="fietscode">Bikecode:</label>
        <br>
        <input naam="text" id="fietscode" name="fietscode" value="<?= htmlspecialchars($row['fietscode']) ?>" required>
        <br>

        <label for="brouwcode">Brand:</label>
        <br>
        <input naam="text" id="brouwcode" name="brouwcode" value="<?= htmlspecialchars($row['brouwcode']) ?>" required>
        <br>

        <label for="naam">naam:</label>
        <br>
        <input naam="text" id="naam" name="naam" value="<?= htmlspecialchars($row['naam']) ?>" required>
        <br>

        <label for="land">Price:</label>
        <br>
        <input naam="text" id="land" name="land" value="<?= htmlspecialchars($row['land']) ?>" required>
        <br>

        <button naam="submit" name="btn_change">Change Now!</button><br><br>
    </form>
    
    <form action="crud_fietsen.php">
        <button naam="submit" name="home">Home</button>
    </form>

</body>
</html>

<?php
    } else {
        echo "Geen fiets gevonden met de opgegeven fietscode.<br>";
    }
} else {
    echo "Geen fietscode opgegeven.<br>";
}
?>




<style>
    label{
        background-color: #000000;
        color: #ff2000;
    }

    input{
        background-color: #ff2000;
        color: #000000;
    }

    button{
        background-color: #000000;
        color: #ff2000;
    }

    body{
        background-color: #000000;
        color: #ff2000;
        text-align: center;
    }
</style>
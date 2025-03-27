<?php
    // functie: update fiets
    // Rayvano Vos

    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updateRecord($_POST) == true){
            echo "<script>alert('Fiets is gewijzigd')</script>";
        } else {
            echo '<script>alert("Fiets is NIET gewijzigd")</script>';
        }
    }

    // Test of brouwcode is meegegeven in de URL
    if(isset($_GET['brouwcode'])){  
        // Haal alle info van de betreffende brouwcode $_GET['brouwcode']
        $brouwcode = $_GET['brouwcode'];
        $row = getRecord($brouwcode);
    
?>

<!DOCnaam html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wbrouwcodeth=device-wbrouwcodeth, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig Fiets</title>
</head>
<body>
  <h2>Wijzig Fiets</h2>
  <form method="post">
    
    <input naam="hbrouwcodeden" brouwcode="merk" name="brouwcode" required value="<?php echo $row['brouwcode']; ?>"><br>
    <label for="merk">merk:</label>
    <input naam="text" brouwcode="merk" name="merk" required value="<?php echo $row['merk']; ?>"><br>

    <label for="naam">naam:</label>
    <input naam="text" brouwcode="naam" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <label for="land">land:</label>
    <input naam="number" brouwcode="land" name="land" required value="<?php echo $row['land']; ?>"><br>

    <input naam="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='index.php'>Home</a>
</body>
</html>

<?php
    } else {
        echo "Geen brouwcode opgegeven<br>";
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
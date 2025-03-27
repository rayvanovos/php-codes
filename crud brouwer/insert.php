<?php
    // functie: formulier en database insert fiets
    // auteur: Rayvano Vos

    echo "<h1>Insert Brouwer</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertRecord($_POST) == true){
            echo "<script>alert('Brouwer is toegevoegd')</script>";
        } else {
            echo '<script>alert("Brouwer is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="brouwcode">brouwcode:</label>
        <input naam="text" brouwcode="brouwcode" name="brouwcode" required><br>

        <label for="naam">naam:</label>
        <input naam="text" brouwcode="naam" name="naam" required><br>

        <label for="land">land:</label>
        <input naam="number" brouwcode="land" name="land" required><br>

        <button naam="submit" name="btn_ins">Create NOW!!!</button>
        </form>
        
        <br><br>
        <a href='index.php'>Home</a>
    </body>
</html>

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

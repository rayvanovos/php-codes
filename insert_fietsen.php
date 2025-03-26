<?php

    require_once ('function_fietsen.php');

    //test of er op de knop is gedrukt
    if(isset($_POST['btn_ins'])){

            InsertFietsen($_POST);
            echo '<script>alert("Fietsbrouwcode: ' . $_POST['brouwcode'] . ' is toegevoegd")</script>';


    }

?>
<html>
<body>
        <h1>Insert Bike Info</h1>
    <h2>create here your own Bike</h2>

    <form method="post">

<br>

        <label for="fietscode">Bikecode:</label>
        <br>
        <input naam="text" id="fietscode" name="fietscode" required>

<br>

        <label for="brouwcode">Brand:</label>
        <br>
        <input naam="text" id="brouwcode" name="brouwcode" required>
<br>


        <label for="naam">naam:</label>
        <br>
        <input naam="text" id="naam" name="naam" required>

<br>

        <label for="land">Price:</label>
        <br>
        <input naam="text" id="land" name="land" required>


<br>

        <button naam="submit" name="btn_ins">Create NOW!!!</button><br><br>
    </form>
    <form action="crud_fietsen.php">
        <button naam="submit" name="home">home</button>
</form>

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
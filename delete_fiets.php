<?php

include 'function_fietsen.php';

// Haal bier uit de database
if(isset($_GET['fietscode'])){
    DeleteFietsen($_GET['fietscode']);
 
    echo '<script>alert("fietscode: ' . $_GET['fietscode'] . ' is verwijderd")</script>';
    echo "<script> location.replace('crud_fietsen.php'); </script>";
}


?>
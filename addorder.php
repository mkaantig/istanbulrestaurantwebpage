<!DOCTYPE html>

<?php
    $DBSERVER = "localhost";
    $DBUSER="c1kaandb";
    $DBPASSWORD="cALA1qYl#8i";
    $DBNAME="c1kaandb";
    
    $DBConnection=  mysqli_connect($DBSERVER,$DBUSER,$DBPASSWORD,$DBNAME);
    mysqli_query($DBConnection, "Set NAMES utf8");
?>

<html>
    <head>
        <title>Add Student Result</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-with, initial-scale=1.0">
    </head>
    <body>
        <?php
            if ((isset($_POST["name"])) && (trim($_POST["name"]) != "") && 
               (isset($_POST["surname"])) && (trim($_POST["surname"]) != "") &&
               (isset($_POST["food"])) && (trim($_POST["food"]) != "") &&
               (isset($_POST["tel"])) && (trim($_POST["tel"]) != "") &&
               (isset($_POST["selection"])) && (trim($_POST["selection"]) != ""))
            {
                $InsertOrderSQL="Insert into Orders(Name,Surname,Food,Telno, Selection) values ('" . trim($_POST["name"]) . "','" . trim($_POST["surname"]) . "','" . trim($_POST["food"]) . "','" . trim($_POST["tel"]) . "','" . trim($_POST["selection"]) . "' )";
                $InsertOrder =  mysqli_query($DBConnection, $InsertOrderSQL);
                
                if ($InsertOrder){
                    $Header='Order Added';
                    $Detail='Your order has been added to the system Mr/Mrs.' . $_POST["surname"] . 'with id:' . mysqli_insert_id($DBConnection); 
                }
                else
                {
                    $Header='Order Could not be added!';
                    $Detail='We could not add that order please press back and try again';
                    
                }
                
            }
            else
            {
                $Header='Missing Data!';
                $Detail='In order to be able to add an order you must fill all fields, please go back<a href="Order.html">Order Page</a> and fill in the form.';
            }
            mysqli_close($DBConnection);
            ?>
            <h1> <?php echo $Header; ?></h1>
            <p> <?php echo $Detail; ?></p>
    </body>
</html>
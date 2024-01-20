<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 
-->
<?php
    //this conect logins into the mysql and created a PDO object 
    $dsn='mysql:host=localhost;dbname=dessert_shop;';
    $username='web_user';
    $password='pa55word';


    try {
        $db = new PDO($dsn, $username, $password);
        // echo '<p> You are connected to the database! </p>';
    }
    catch (PDOException $exception) {
        $error_message = $exception->getMessage();
        include('database_error.php');
        exit();
    }
?>

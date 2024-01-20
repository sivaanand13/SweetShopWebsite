<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 
-->
<?php
    //this is the funciton version that returns a PDO object after connecting to the mysql
function getDB(){
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
    return $db;   
}
?>

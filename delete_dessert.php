<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 

    This is the validation form which then ouputs the shipping label to be printed if all data inputs are valid. 
-->
<?php 
//this code retrives the dessert ID from the post array and deletes the dessert from the dessert table
    require_once('database.php');
    $dessertID = filter_input(INPUT_POST, 'dessertID', FILTER_VALIDATE_INT);
    //$dessertCategoryID = filter_input(INPUT_POST, 'dessertCategoryID', FILTER_VALIDATE_INT);
   if ($dessertID != false){
        $query = 'DELETE FROM dessert WHERE dessertID = :dessertID';
        $statement = $db->prepare($query);
        $statement->bindValue(':dessertID', $dessertID);
        $statement->execute();
        $statement->closeCursor();

    }
    header('Location: dessert.php');
?>
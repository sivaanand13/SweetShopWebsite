<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 

    This is the validation form which then ouputs the shipping label to be printed if all data inputs are valid. 
-->
<?php 

    //require the database to get a PDP object 
    require_once('database.php');

    //collecting the data into local variales from the superglobal POST array 
    $dessertCategoryID = filter_input(INPUT_POST, 'dessertCategoryID', FILTER_VALIDATE_INT);
    $dessertCode = filter_input(INPUT_POST, 'dessertCode');
    $dessertName = filter_input(INPUT_POST, 'dessertName');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    //this funciotn returns true if the entered dessert code already exists 
    function duplicateCode($code){
        require('database.php');
        $query = 'SELECT * FROM dessert WHERE dessertCode = :code';
        $statement = $db->prepare($query);
        $statement->bindValue(':code', $code);
        $statement->execute();
        $duplicate = $statement->fetch();
        $statement->closeCursor();
        
        return $duplicate != null; 
    }

    //below are some validations checks to ensure values are valid and within the proper constraints 
    if ($price== null || $price === FALSE) {
        $error_message = "The entered dessert price is not a valid number. Please enter a valid price.";
    }
    else if ($price > 500) {
        $error_message = "The entered dessert price is more than the maximum price ($500.00). Please enter a price under $500.";
    }
    else if ($dessertCategoryID === FALSE || $dessertCategoryID === null ){
        $error_message = 'Dessert Category must be one of the listed option.';
    }
    else if ($dessertCode == null) {
        $error_message = "The dessert code field is blank. Please enter a dessert code.";
    }
    else if (duplicateCode($dessertCode)) {
        $error_message = "A dessert with the entered code already exists. Please enter another code.";
    }
    else if ($dessertName== null) {
        $error_message = "The dessert name field is blank. Please enter a dessert name.";
    }
    else if ($description== null) {
        $error_message = "The dessert description field is blank. Please enter a dessert name.";
    }
    else {
        $error_message = '';
    }
    if ($error_message != '') {
        include('create.php');
        exit();
    }

    //the following code enters the data into the database
    require_once('database.php');
    $query = 'INSERT INTO dessert (dessertCategoryID, dessertCode, dessertName, description, price, dateAdded) VALUES (:dessertCategoryID, :dessertCode , :dessertName , :description , :price , NOW())';
   
    try{    
    $statement = $db->prepare($query);
    $statement->bindValue(':dessertCode', $dessertCode);
    $statement->bindValue(':dessertCategoryID', $dessertCategoryID);
    $statement->bindValue(':dessertName', $dessertName);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
    $error_message = '';
    }
    catch (PDOException $e){
        $error_message = "Your inputed values are valid. However, there was an issue inserting the new dessert. Please try again later.";
    }
    if ($error_message != '') {
        include('create.php');
        exit();
    }

   
?>
<html>
    <head>
        <title> Shipping Label - Siva's Sweets & Desserts </title>
        <link rel="shortcut icon" href="images/icon.jpg">
        <link rel="stylesheet" href="createStyle.css">
</head>
<body>
    <header>
    <?php include("header.php"); 
                if (!isset($_SESSION['is_valid_admin'])) {
                    echo '<p style="text-align:center; color:red;"> <u> You must be logged in to view this page! </u></p>';
                    exit();
                }
                ?>
    </header>
    <main style="height:auto;">
    <p> The dessert has been successfully added! </p> 
    </main>
<footer>
                <?php include("footer.php"); ?>
        </footer>  
</body>
</html>

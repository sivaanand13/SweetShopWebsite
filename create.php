<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 

    This is the page that collects the shipping details.
-->
<?php 
    //setting the defalt values to be ''
    if (!isset($dessertCategoryID)) {
        $dessertCategoryID='';
    }
    if (!isset($dessertCode)) {
        $dessertCode='';
    }
    if (!isset($description)) {
        $description='';
    }
    if (!isset($dessertName)) {
        $dessertName='';
    }
    if (!isset($price)) {
        $price='';
    }
    
    //below is code for retriving all the dessert catagories from the database 
    require_once('database.php');
    $query = 'SELECT * FROM dessertCategories';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
<html>
    <head>
        <title> Create - Siva's Sweets & Desserts </title>
        <!-- linking the favicon and css styles to the page-->
        <link rel="shortcut icon" href="images/icon.jpg">
        <link rel="stylesheet" href="createStyle.css">
    </head>
    <body>
        <header>
        <?php include("header.php"); 
        if (!isset($_SESSION['is_valid_admin'])) {
        echo '<p style="text-align:center; color:red;"> <u> You must be logged in to view this page! </u></p>';
        exit();
  } ?>
        </header>
        <main id="create"> 
            <?php 
                //this is for outputting error messages, if there are any 
                if (!empty($error_message)) { ?>
                <p id="error" style="color:red;"> <?php echo htmlspecialchars($error_message); ?> </p>
            <?php } ?>
            <!-- Below is the sticky form to collect the product details for inserting into database-->
            <form id="add_dessert" action="add_dessert.php" method="post"> 
            <label> Dessert Category: </label> 
            <select align="center" name="dessertCategoryID">
    <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['dessertCategoryID']; ?>">
            <?php echo $category['dessertCategoryName']; ?> 
        </option>
    <?php endforeach; ?>
    </select> <br><br><br>
            <label> Dessert Code: </label> 
            <input type="text"  id="dessertCode" name="dessertCode" value="<?php echo htmlspecialchars($dessertCode); ?>"/>
            <span class="error"></span> <br><br><br>
            <label> Dessert Name: </label> 
            <input type="text"  id="dessertName" name="dessertName" value="<?php echo htmlspecialchars($dessertName); ?>"/>
            <span class="error"></span><br><br><br>
            <label> Dessert Description: </label>
            <input type="text"  id="description" name="description" value="<?php echo htmlspecialchars($description); ?>"/>
            <span class="error"></span><br><br><br>
            <label> Dessert Price: </label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>"/>
            <span class="error"></span><br>      <div align="center" id="buttons"> 
            <button id="reset_button" type="button" value="Reset" > Reset </button>
            <input id="submit" type="submit" value="Add Dessert"><br /> 
            <span class="error" id="submit_message"> </span>
    </div>
        </form>
        </main>
        <footer>
                <?php include("footer.php"); ?>
        </footer>  
    <script
        src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
        integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw="
        crossorigin="anonymous"> </script>

    <script> 
        /*"use script";*/
     $(document).ready( () => {

       $("input:text").next().text("*");

    /*document.querySelector("#dessertCode").addEventListener("input", () => {
        let email = $("#dessertCode").val().trim();
        console.log($("#dessertCode"));
        console.log(dessertCode + ' ' + dessertCode.length);
        if (dessertCode == ""){
            $("#dessertCode").next().text("This field is required. Cannot be left blank.");
        }
        else if (dessertCode.length < 4){
            $("#email").next().text("Dessert Code must have at least 4 characters.");
        }
        else if (dessertCode.length > 100){
            $("#email").next().text("Dessert Code must have a maximum of 10 characters.");
        }
        else {
            $("#email").next().text("");
        }
    });*/
    $('#dessertCode').on('input', event => {
        const dessertCode = $("#dessertCode").val().trim();
        isValid = true;
        if (dessertCode == ""){
            $("#dessertCode").next().text("This field is required. Cannot be left blank.");
            isValid = false; 
        }
        else if (dessertCode.length < 4){
            $("#dessertCode").next().text("Dessert Code must have at least 4 characters.");
            isValid = false; 
        }
        else if (dessertCode.length > 10){
            $("#dessertCode").next().text("Dessert Code must have a maximum of 10 characters.");
            isValid = false; 
        }
        else {
            $("#dessertCode").next().text("");
        }
       
        if (!isValid){
        event.preventDefault(); 
       }
        
    });
    $('#dessertName').on('input', event => {
        const dessertName = $("#dessertName").val().trim();
        isValid = true;
        if (dessertName == ""){
            $("#dessertName").next().text("This field is required. Cannot be left blank.");
            isValid = false; 
        }
        else if (dessertName.length < 10){
            $("#dessertName").next().text("Dessert name must have at least 10 characters.");
            isValid = false; 
        }
        else if (dessertName.length > 100){
            $("#dessertName").next().text("Dessert name must have a maximum of 100 characters.");
            isValid = false; 
        }
        else {
            $("#dessertName").next().text("");
        }
       if (!isValid){
        event.preventDefault(); 
       }
        
    });
    $('#description').on('input', event => {
        const description = $("#description").val().trim();
        isValid = true;
        if (description == ""){
            $("#description").next().text("This field is required. Cannot be left blank.");
            isValid = false; 
        }
        else if (description.length < 10){
            $("#description").next().text("Dessert description must have at least 10 characters.");
            isValid = false; 
        }
        else if (description.length > 255){
            $("#description").next().text("Dessert description must have a maximum of 255 characters.");
            isValid = false; 
        }
        else {
            $("#description").next().text("");
        }
       
        if (!isValid){
        event.preventDefault(); 
       }
        
    });
    $('#price').on('input', event => {
        const price = parseFloat($("#price").val().trim());
       // console.log(price);
        isValid = true;
        if (isNaN(price)){
           // console.log('price');
            $("#price").next().text("This field cannot be left blank and must be numeric.");
            isValid = false; 
        }
        else if (price <= 0){
            $("#price").next().text("Dessert price cannot be zero or negative.");
            isValid = false; 
        }
        else if (price > 100000){
            $("#price").next().text("Dessert price should exceed $100, 000.");
            isValid = false; 
        }
        else {
            $("#price").next().text("");
        }
       
        if (!isValid){
        event.preventDefault(); 
       }
        
    });
    $('#add_dessert').submit( event => {
        const dessertCode = $("#dessertCode").val().trim();
        isValid = true;
        if (dessertCode == ""){
            $("#dessertCode").next().text("This field is required. Cannot be left blank.");
            isValid = false; 
        }
        else if (dessertCode.length < 4){
            $("#dessertCode").next().text("Dessert Code must have at least 4 characters.");
            isValid = false; 
        }
        else if (dessertCode.length > 10){
            $("#dessertCode").next().text("Dessert Code must have a maximum of 10 characters.");
            isValid = false; 
        }
        else {
            $("#dessertCode").next().text("");
        }
        const dessertName = $("#dessertName").val().trim();
        isValid = true;
        if (dessertName == ""){
            $("#dessertName").next().text("This field is required. Cannot be left blank.");
            isValid = false; 
        }
        else if (dessertName.length < 10){
            $("#dessertName").next().text("Dessert name must have at least 10 characters.");
            isValid = false; 
        }
        else if (dessertName.length > 100){
            $("#dessertName").next().text("Dessert name must have a maximum of 100 characters.");
            isValid = false; 
        }
        else {
            $("#dessertName").next().text("");
        }
        const description = $("#description").val().trim();
        isValid = true;
        if (description == ""){
            $("#description").next().text("This field is required. Cannot be left blank.");
            isValid = false; 
        }
        else if (description.length < 10){
            $("#description").next().text("Dessert description must have at least 10 characters.");
            isValid = false; 
        }
        else if (description.length > 255){
            $("#description").next().text("Dessert description must have a maximum of 255 characters.");
            isValid = false; 
        }
        else {
            $("#description").next().text("");
        }
        const price = parseFloat($("#price").val().trim());
        //console.log(price);
        isValid = true;
        if (isNaN(price)){
           
            $("#price").next().text("This field cannot be left blank and must be numeric.");
          //  console.log($('#price').next().text());
            isValid = false; 
        }
        else if (price <= 0){
            $("#price").next().text("Dessert price cannot be zero or negative.");
            isValid = false; 
        }
        else if (price > 100000){
            $("#price").next().text("Dessert price should exceed $100, 000.");
            isValid = false; 
        }
        else {
            $("#price").next().text("");
        }

        if (!isValid){
           // console.log($('#submit_message'));
            $('#submit_message').text("Please resolve the error(s) above before submitting.");
             event.preventDefault(); 
       } else {
        
        $("#submit_message").text("");
       }
        
    });

       $('#reset_button').click( () => {
            //console.log($("input:text").val().trim());
            $("input:text").val("");
            $("input:text").next().text("*");
            $("#submit_message").text("");
        });

    });
    </script>
</body>
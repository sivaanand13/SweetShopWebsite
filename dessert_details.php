<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 
    

    This is the dessert details page.
-->
<?php 
//this is the code to retive the dessert row from the dessert table based on the dessertId value in the GET superglobal array
 require_once('database.php');
    $dessertID = filter_input(INPUT_GET, "dessert_id", FILTER_VALIDATE_INT);
    $query = 'SELECT * FROM dessertCategories c, dessert d WHERE c.dessertCategoryID=d.dessertCategoryID AND dessertID=:dessertID ORDER BY dessertCategoryName';
	$statement = $db->prepare($query);
    $statement->bindValue(":dessertID", $dessertID);
	$statement->execute();
	$dessert = $statement->fetch();
    $statement->closeCursor();
?>
<html>
    <head>
        <title> Home - Siva's Sweets & Desserts </title>
        <!-- code below links the css styles and favicon to the page -->
        <link rel="shortcut icon" href="images/icon.jpg">
        <link rel="stylesheet" href="details.css">
    </head>
    <body>
        <header>
        <?php 
        include("header.php"); ?>

        </header>
        <main> 
        <div id="detail">
            <?php
            //this php code ouputs the retrieved dessert row details stored in the $dessert array 
            if ($dessert === FALSE ){
                echo "<h2 class=error> A dessert record does not exist for the given dessert id. </h2>";
                
            } 
            else {
    echo '<h2><b>' . $dessert['dessertName'] . '</b></h2>';
    echo '<figure align="center"><img id="image" src="images/' . $dessert['dessertCode'] . '-modified.jpg" alt="Product Image" height="250"> </figure>';
    echo '<h5>Dessert ID: ' .$dessert['dessertID'] . '</h5><br\>';
    echo '<h5>Dessert Category ID: ' .$dessert['dessertCategoryID'] . '</h5><br\>';
    echo '<h5>Dessert Code: ' .$dessert['dessertCode'] . '</h5><br\>';
    echo '<h5>Price: $' . $dessert['price']. '</h5><br\>';
    echo '<h5>Date Added: ' . $dessert['dateAdded'] . '</h5><br\>';
    echo '<h5>Product Description: </h5> <p> ' . $dessert['description'] . '</p><br\>';
             } ?>
        </div>

        </main>
        <footer>
                <?php include("footer.php"); ?>
        </footer>   
   
    </body>
    <script>
        //this is the javascript to switch the image based on whether the mouse is over the image or off the image
        const hoverImage = event => {
            image = document.querySelector("#image");
            let link = image.getAttribute("src");
            image.setAttribute("src", link.replace("-modified.jpg", ".jpg"));
        };
        document.addEventListener("DOMContentLoaded", () => {
        document.querySelector("#image").addEventListener("mouseover", hoverImage);
        document.querySelector("#image").addEventListener("mouseout", () => {
            image = document.querySelector("#image");
            let link = image.getAttribute("src");
            image.setAttribute("src", link.replace( ".jpg", "-modified.jpg"));
            });
        });
    </script>

</html>
<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 
-->
<?php 
    //connect to database 
	require_once('database.php');
    //query and fetch the below sql statement 
	$query = 'SELECT dessertID, dessertCategoryName, dessertCode, dessertName, description, price FROM dessertCategories c, dessert d WHERE c.dessertCategoryID=d.dessertCategoryID ORDER BY dessertCategoryName';
	$statement = $db->prepare($query);
	$statement->execute();
	$desserts = $statement->fetchAll();
    $statement->closeCursor();
?>

<html>
    <head>
        <title> Home - Siva's Sweets & Desserts </title>
        <link rel="shortcut icon" href="images/icon.jpg">
        <link rel="stylesheet" href="dessert.css">
    </head>
    <body>
        <header>
        <?php include("header.php"); ?>
        </header>
        <main> 
            
<table>
    <tr>
        <th> Category Name</th>
        <th> Dessert Code</th>
        <th> Dessert Name</th>
<th> Description</th>
<th> Price </th>
<?php if (isset($_SESSION['is_valid_admin'])) {
    echo '<th> Delete </th>';
} ?>

  </tr>
  <?php //this will output the dessert data stored in the $desserts array 
  foreach ($desserts as $dessert): ?>
    <tr>
    <td> <?php echo $dessert['dessertCategoryName']; ?> </td>
    <td> <a href="dessert_details.php?dessert_id=<?php echo $dessert['dessertID'];?>"> <?php echo $dessert['dessertCode']; ?> </a></td>
<td> <?php echo $dessert['dessertName']; ?> </td>
<td> <?php echo $dessert['description']; ?> </td>
    <td> <?php echo '$' . $dessert['price']; ?> </td>
   <?php if (isset($_SESSION['is_valid_admin'])) { ?>
        <td> <form action="delete_dessert.php" method="post">
        <input type="hidden" name="dessertID" value="<?php echo $dessert['dessertID'];?>" />
        <input class="delete" type="submit" value ="Delete" />
        </form> </td>
    <?php } ?>
  </td>
  </tr>
    <?php endforeach; ?>
  </table>

  </main>
        <footer>
                <?php include("footer.php"); ?>
        </footer>   
    
    </body>
    <script>
        "use strict";
        const deleteItem = event => {
            const confirmDelete = confirm("Are you sure?");
            if (!confirmDelete) {
                event.preventDefault();
            }
        };
        document.addEventListener("DOMContentLoaded", () => {
            const submitButtons = document.querySelectorAll(".delete");
            
            for (let i = 0; i < submitButtons.length; i++){
                submitButtons[i].addEventListener("click", deleteItem);
            } 

        });
    </script>
</html>
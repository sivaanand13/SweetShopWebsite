<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 

    This is the header sections that will be in all pages. 
-->
<!-- Below is the banner for the webpages -->

<?php 
// start session if not already started 
       if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<div class="banner">
    <a style="text-align:center;" href="home.php"> <figure> <img style="float:left; " src="images/bannerlogo.png" alt="Siva's Sweets & Desserts logo" height=100em">  
</figure> </a>
    <h1 > Siva's Sweets & Desserts </h1>
</div>
<!-- Below is the navigation bar that will be in all pages -->
<nav>
        <ul align="center">
            <li> <a href="home.php"> Home </a> </li>
           <?php if (isset($_SESSION['is_valid_admin'])) { ?>
                <li> <a href = "shipping.php"> Shipping </a> </li>
<?php } ?>
            <li> <a href = "dessert.php"> Dessert </a> </li>
            <?php if (isset($_SESSION['is_valid_admin'])) { ?>
                <li> <a href = "create.php"> Create </a> </li>
<?php } ?>
           
            <?php 
    //code for login/log out
    
     if (isset($_SESSION['is_valid_admin'])) { ?>
        <li class="right"> <a href='logout.php'> Logout </a> </li>
<?php } else { ?>
    <li class="right"> <a href='login.php'> Login </a> </li>
<?php } ?>
        </ul>
    </nav>
 <?php 

if (isset($_SESSION['is_valid_admin'])) { 
    //output welcome greeting to manager 
      echo '<p style="text-align:center;"> Welcome ' . $_SESSION['admin_first_name'] . ' ' . $_SESSION['admin_last_name'] . ' (' . $_SESSION['admin_email'] . ') </p>';
}  ?>
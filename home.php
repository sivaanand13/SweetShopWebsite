<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 
    

    This is the home page.
-->
<html>
    <head>
        <title> Home - Siva's Sweets & Desserts </title>
        <!-- code below links the css styles and favicon to the page -->
        <link rel="shortcut icon" href="images/icon.jpg">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
        <?php 
        include("header.php"); ?>
        </header>
        <main> 
         <!-- This will be the welcome page with some images and welcome message descriping the shop. -->
            <div class="top">
                 <figure style="float:left;">
                    <img alt="Gulab Jamun Image" src="images/gulab_jamun.jpg" height=250px>
                 <figcaption> Gulab Jamun </figcaption>
                    </figure>  
                    <figure style="float:right;"> 
                    <img alt="Jalebi Image" src="images/jalebi.jpg" height=250px>
                    <figcaption> Jalebi </figcaption>
                    </figure>
            </div> 
            <div class="middle"> <p id="desc"> Siva’s Sweets and Desserts was founded in 2021 by Siva Anand Sivakumar. The founder’s passion for sweets came from his mother who often makes Indian sweets and desserts. This shop is the result of Siva’s wish to share his passion for sweets and desserts with the world. Through this shop, Siva hopes that many will come to enjoy Indian sweets and desserts. Ultimately, Siva wishes to introduce his customers to Indian sweets and desserts and increase the popularity and prevalence of Indian sweets and desserts. </p>
            </div> 
            <div class="bottom">   
                <figure style="float:left;">
                <img  alt="Rice Paysam Image" src="images/payasam.jpg" height=250px>
                <figcaption> Rice Payasam </figcaption>
</figure>
                <figure style="float:right;">
                <img  alt="Palkova Image" src="images/palkova.jpg" height=250px>
                <figcaption> Palkova </figcaption> 
</figure> 
            </div>
        </main>
        <footer>
                <?php include("footer.php"); ?>
        </footer>   
   
    </body>
</html>
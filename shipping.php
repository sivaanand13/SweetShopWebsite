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
    if (!isset($fname)) {
        $fname='';
    }
    if (!isset($lname)) {
        $lname='';
    }
    if (!isset($street)) {
        $street='';
    }
    if (!isset($city)) {
        $city='';
    }
    if (!isset($state)) {
        $state='';
    }
    if (!isset($zcode)) {
        $zcode='';
    }
    if (!isset($date)) {
        $date='';
    }
    if (!isset($onumber)) {
        $onumber='';
    }
    if (!isset($plength)) {
        $plength='';
    }
    if (!isset($pwidth)) {
        $pwidth='';
    }
    if (!isset($pheight)) {
        $pheight='';
    }
    if (!isset($pweight)) {
        $pweight='';
    }
?>
<html>
    <head>
        <title> Shipping - Siva's Sweets & Desserts </title>
        <!-- linking the favicon and css styles to the page-->
        <link rel="shortcut icon" href="images/icon.jpg">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
        <?php include("header.php"); 
        if (!isset($_SESSION['is_valid_admin'])) {
        echo '<p style="text-align:center; color:red;"> <u> You must be logged in to view this page! </u></p>';
        exit();
  } ?>
        </header>
        <main id="shipping"> 
            <?php 
                //this is for outputting error messages, if there are any 
                if (!empty($error_message)) { ?>
                <p id="error" style="color:red;"> <?php echo htmlspecialchars($error_message); ?> </p>
            <?php } ?>
            <!-- Below is the sticky form to collect the shipping details -->
            <form action="validate.php" method="post">
            <label> First Name: </label> 
            <input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>"/><br>
            <label> Last Name: </label> 
            <input type="text" name="lname" value="<?php echo htmlspecialchars($lname); ?>"/><br>
            <label> Street address: </label>
            <input type="text" name="street" value="<?php echo htmlspecialchars($street); ?>"/><br>
            <label> City: </label>
            <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>"/><br>
            <label> State: </label> 
            <input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>"/><br>
            <label> Zip Code: </label> 
            <input type="text" name="zcode" value="<?php echo htmlspecialchars($zcode); ?>"/><br>
            <label> Ship Date: </label> 
            <input type="date" name="date" value="<?php echo htmlspecialchars($date); ?>"/><br>
            <label> Order Number:</label>
            <input type="number" name="onumber" value="<?php echo htmlspecialchars($onumber); ?>"/><br>
            <label> Package length (in):  </label> 
            <input type="text" name="plength" value="<?php echo htmlspecialchars($plength); ?>"/><br>
            <label> Package width (in):  </label> 
            <input type="text" name="pwidth" value="<?php echo htmlspecialchars($pwidth); ?>"/><br>
            <label> Package height (in):  </label> 
            <input type ="text" name="pheight" value="<?php echo htmlspecialchars($pheight); ?>"/><br>
            <label> Package Weight (lbs): </label> 
            <input type="text" name="pweight" value="<?php echo htmlspecialchars($pweight); ?>"/> <br>
            <input align="center" type="submit" value="Print Label"><br>
            </form>
        </main>
        <footer>
                <?php include("footer.php"); ?>
        </footer>  

</body>
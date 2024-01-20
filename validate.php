<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 

    This is the validation form which then ouputs the shipping label to be printed if all data inputs are valid. 
-->
<?php 
    //collecting the data into local variales from the superglobal POST array 
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $street = filter_input(INPUT_POST, 'street');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zcode = filter_input(INPUT_POST, 'zcode'); /*This is not validated for int since that would cause leading zeros from zip codes to be lost*/ 
    $date = filter_input(INPUT_POST, 'date');
    $onumber = filter_input(INPUT_POST, 'onumber');
    $plength = filter_input(INPUT_POST, 'plength', FILTER_VALIDATE_FLOAT);
    $pwidth = filter_input(INPUT_POST, 'pwidth', FILTER_VALIDATE_FLOAT);
    $pheight = filter_input(INPUT_POST, 'pheight', FILTER_VALIDATE_FLOAT);
    $pweight = filter_input(INPUT_POST, 'pweight', FILTER_VALIDATE_FLOAT);
    //below are regular expressions for valid state and zip codes
    $us_zip = "/^[0-9]{5}(-[0-9]{4})?$/";
    $vstate="/^([a-zA-Z]| )*$/";

    //below are some validations checks to ensure values are valid and within the proper constraints 
    if ($pweight === FALSE){
        $error_message = 'Package weight must be a valid number.';
    }
    else if ($pweight > 150 || $pweight < 0) {
        $error_message = "Package weight must be a positive number that is no more than 150 pounds.";
    }
    else if ($pheight === FALSE) {
        $error_message = "Package height must be a valid number.";
    }
    else if ($pheight > 36 || $pheight < 0){
        $error_message = "Package height must be a positive number that is no more than 36 inches.";
    }
    else if ($plength === FALSE) {
        $error_message = "Package length must be a valid number.";
    }
    else if ($plength > 36 || $plength < 0){
        $error_message = "Package length must be a positive number that is no more than 36 inches.";
    }
    else if ($pwidth === FALSE) {
        $error_message = "Package width must be a valid number.";
    }
    else if ($pwidth > 36 || $pwidth < 0){
        $error_message = "Package width must be a positive number that is no more than 36 inches.";
    }
    else if (!preg_match($us_zip, $zcode)){
        
        $error_message = "Zip Code must be a valid US Zip Code in either ##### or #####-#### format.";
    }
    else if (!preg_match($vstate, $state) || empty($state)){
        $error_message = "State must be a valid state.";
    }
    else {
        $error_message = '';
    }
    if ($error_message != '') {
        include('shipping.php');
        exit();
    }
?>
<html>
    <head>
        <title> Shipping Label - Siva's Sweets & Desserts </title>
        <link rel="shortcut icon" href="images/icon.jpg">
        <link rel="stylesheet" href="label.css">
</head>
<body>
    <header>
        <?php include("header.php"); 
                if (!isset($_SESSION['is_valid_admin'])) {
                    echo '<p style="text-align:center; color:red;"> <u> You must be logged in to view this page! </u></p>';
                    exit();}
                    ?>
    </header>
    <main>
    <!-- Below is the code that constructs the shipping label -->
    <section id="priority">
           <section id="dpriority">
                <text> P </text>
            </section>
         <section id="bstamp">
            <img alt="Stamp" align=right src="images/stamp.png" /> </section>
            
        </section>
    <section id="mtitle">
        <h1> <b> USPS PRIORITY MAIL </b> <br>
        </h1>
    
    </section> 
    <section id="lfrom">
        <div id="faddress">
        <p> Siva's Sweets and Desserts </P>
        <p>101 Wall Street </p>
        <p>New York, NY 10118 </p>
        </div>
        <div id="oinfo">
    <p> Order Number: <?php echo htmlspecialchars($onumber); ?></p>
    <p> Ship Date: <?php echo htmlspecialchars($date); ?> </p>
    
    <p>Dimensions: <?php echo htmlspecialchars($plength) . 'in x ' . htmlspecialchars($pwidth) . 'in x ' . htmlspecialchars($pheight) . 'in'; ?> 
</p> <div id="weight"> <p> <?php echo htmlspecialchars($pweight) . ' LB'; ?> </p> </div>
    </div>
    </section>
    
<section id="taddress">
        <div id="lleft">
            <p> SHIP <br> TO:</p>
        </div>
        <div id="rright">
            <?php echo "<p> $fname $lname <br> $street <br> $city" . ", $state $zcode" . "</p>"; ?>
         </div>
</section>
<section id="tracking" align=center>
    <div>
    <p> USPS TRACKING # </p>
</div>
    <div>
    <img alt="Barcode" src="images/barcode.png" />
</div>
    <div>
    <p> 9456 3186 4787 3263 9281 89 </p>
</div>
</section>
<section>
<div id="ccode"> <p> Country Code: US </p> </div>

</section> 
</main>
<footer>
                <?php include("footer.php"); ?>
        </footer>  
</body>
</html>

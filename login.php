<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 
-->

<?php 
  //this is the login page code and collects creds. via a form and send it to the authenticate php script 
if (!isset($login_message)){
    $login_message = 'Please enter the login information.';
} ?>
<html>
<head>
    <title>Login</title>
    <link rel="shortcut icon" href="images/icon.jpg">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header> 
        <?php include("header.php"); ?>
</header>
    <h1>Login</h1>
  <main>
    <form id="login" action="authenticate.php" method='post'>
    <label> Email: </label>
    <input type='text' name='email' value=''/> <br>
    <label> Password: </label>
    <input type="password" name="password" value=''/> <br>
    <input type="submit" value="Login" />
    </form>
<?php echo $login_message; ?>
</main>
</body>
</html>
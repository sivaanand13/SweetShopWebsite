<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 
-->
<?php 
    //destroy session data and redirect to the login page 
session_start();
    $_SESSION = []; //clear all session destory 
    session_destroy(); // cleanup session id in server 
    $login_message = 'You have been logged out.';
    include('login.php');
    
?>
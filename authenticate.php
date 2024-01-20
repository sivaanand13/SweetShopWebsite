<!--Name: Siva Anand Sivakumar 
    Date:  04/21/2023
    Corse: IT202
    Section: 006
    Assignment: Unit 11 Assignment 
    Email: ss546@njit.edu 

    This is the validation form which then ouputs the shipping label to be printed if all data inputs are valid. 
--><?php

//this code takes the login creds entered and verfies if it's valid and if so sets is_valid_admin and sets the manager's name and email 
//wrong email returns invalid cred
//valid email but incorrect password returns incorrect password
    require_once('fdatabase.php');
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    function is_valid_admin_login($email, $password) {
        $db = getDB();
        $query = 'SELECT firstName, lastName, emailAddress, password FROM dessertmanagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
        if ($row === FALSE) {
            $login_message = 'Invalid Credentials. Please try again.'; 
            include('login.php');
            return false; 
        }
        else {
            $hash = $row['password'];
            if ( password_verify($password, $hash)){
                $_SESSION['admin_first_name'] = $row['firstName'];
                $_SESSION['admin_last_name'] = $row['lastName'];
                $_SESSION['admin_email'] = $row['emailAddress'];
                return true;
            }
        }
        $login_message = 'Incorrect password. Please try again.'; 
        include('login.php');
        return false;   
    }

//mostly from slice 22(mostly)
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
if ($email == NULL && $password ==NULL){
    $login_message = 'The email and password fields are empty. Please enter the login information.';
    include('login.php');
}
else if ($email == NULL ){
    $login_message = 'The email field is empty. Please enter the login information.';
    include('login.php');
}
else if (is_valid_admin_login($email, $password)){
    $_SESSION['is_valid_admin'] = true; 
    header('Location: home.php');
}
?>
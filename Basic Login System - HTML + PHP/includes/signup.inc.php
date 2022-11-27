<?php
 
    
    if(isset($_POST["submit"])) {

        // Grabbing the data
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdrepeat = $_POST["pwdrepeat"];
        $email = $_POST["email"];


        // Instanciate the Signup class
        include "../classes/dbh.classes.php";
        include "../classes/signup.classes.php";
        include "../classes/signup-contr.classes.php";
        $signup = new signupContr($uid, $pwd, $pwdrepeat, $email);
        

        // Running the error handlers and user signup
        $signup->signUpUser();


        // Going back to the front page
        header('location: ../index.php?error=none');
        exit();
        
    } else {
        var_dump("I died");
    }


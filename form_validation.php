<?php

    

    // Error messages

    $guestEmptyErr = "";

    $emailEmptyErr = "";

    $educationEmptyErr = "";

    $genderEmptyErr = "";

    $hobyEmptyErr = "";

    $commentEmptyErr = ""; 

    $guestErr = "";

    $emailErr = "";


    if(isset($_POST["save"])) {

        // Set form variables

        $guest           = checkInput($_POST["guest"]);

        $email          = checkInput($_POST["email"]);

}  

 // Name validation

        if(empty($guest)){

            $guestEmptyErr = '<div class="error">Name can not be left blank.</div>';

        } // Allow letters and white space 

        else if(!preg_match("/^[a-zA-Z ]*$/", $guest)) {

            $guestErr = '<div class="error">Only letters and white space allowed.</div>';

        } else {

            echo $guest . '<br>';

        }


    function checkInput($input) {

        $input = trim($input);

        $input = stripslashes($input);

        $input = htmlspecialchars($input);

        return $input;


    }    

?>
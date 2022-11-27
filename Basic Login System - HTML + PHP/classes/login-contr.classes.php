<?php

class loginContr extends login {

    // Create the properties
    private $uid;
    private $pwd;

    // Create the constructor
    // We do create a constructor because we want to pass the data from the form to the class.

    public function __construct($uid, $pwd) {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    // Create the methods



    /**
     * Error handlers
     */

    public function loginUser() {
        if ($this->emptyInputCheck() == false) {
            header('location: ../index.php?error=emptyinput');
            exit();
        }

       

        // If everything is ok, we can create the user
        $this->getUser($this->uid, $this->pwd);

    }

    /**
     * Check if the input fields are empty
     * @return boolean
     */

    private function emptyInputCheck() {
        // Return false if any of the inputs are empty
        if(empty($this->uid) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
    }
    return $result;
  }
}
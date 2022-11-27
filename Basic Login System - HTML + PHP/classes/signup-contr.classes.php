<?php

class signupContr extends signUp {

    // Create the properties
    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;

    // Create the constructor
    // We do create a constructor because we want to pass the data from the form to the class.

    public function __construct($uid, $pwd, $pwdrepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    // Create the methods



    /**
     * Error handlers
     */

    public function signUpUser() {
        if ($this->emptyInputCheck() == false) {
            header('location: ../index.php?error=emptyinput');
            exit();
        }

        if ($this->emptyInputCheck() == false) {
            header('location: ../index.php?error=emptyinput');
            exit();
        }

        if ($this->invalidUid() == false) {
            header('location: ../index.php?error=invaliduid');
            exit();
        }

        if ($this->invalidEmail() == false) {
            header('location: ../index.php?error=invalidemail');
            exit();
        }

        if ($this->pwdMatch() == false) {
            header('location: ../index.php?error=passwordsdontmatch');
            exit();
        }

        if ($this->userExists() == false) {
            header('location: ../index.php?error=useralreadyexists');
            exit();
        }

        // If everything is ok, we can create the user
        $this->setUser($this->uid, $this->pwd, $this->email);

    }

    /**
     * Check if the input fields are empty
     * @return boolean
     */

    private function emptyInputCheck() {
        // Return false if any of the inputs are empty
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
    }
    return $result;
  }

  /**
   * Check if the username is valid
   * @return boolean
   */

  private function invalidUid() {
    // Return false if the username is not valid
    if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
  }

  /**
   * Check if the email is valid
   * 
   * @return boolean
   */

  private function invalidEmail() {
    // Return false if the email is not valid
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
  }

    /**
     * Check if the password and the password repeat are the same
     * 
     * @return boolean
     */

    private function pwdMatch() {
        // Return false if the password and the password repeat are not the same
        if($this->pwd !== $this->pwdrepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    /**
     * Check if the user already exists in the database
     * 
     * @return boolean
     */

     private function userExists() {
        // Return false if the password and the password repeat are not the same
        if(!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
     }



}
<?php

    class signUp extends dbh {

        protected function setUser($uid, $pwd, $email) {
            $stmt = $this->connect()->prepare("INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);");

            // Hashing the password
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
                print_r($stmt->errorInfo());
                die();
                $stmt = null;
                
                
                header('location: ../index.php?error=stmtfailedSetUser');
                exit();
            }
            
            $stmt = null;
        }





        protected function checkUser ($uid, $email) {
            // Here we check if the user already exists in the database, passing the username and email as parameters (into the function)
            // We use the PDO prepared statement to avoid SQL injection
            $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');

            if (!$stmt->execute(array($uid, $email))) {
                $stmt = null;
                header('location: ../index.php?error=stmtfailedCheckUser');
                exit(); 
            }

            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            } else {
                $resultCheck = true;
            }

            return $resultCheck;

        }
        
    }
?>
<?php

class dbh {
    protected function connect() {
        try {
            // create a new PDO connection with the following parameters:
            //  $servername = "mariadb";
            //    $username = "root";
            //    $password = "2cameron2";
            //    $dbname = "oop-login";
            $dbh = new PDO("mysql:host=mariadb;dbname=oop-login", "root", "2cameron2");
            return $dbh;

        } catch (PDOException $e) {
            // If there is an error with the connection, stop the script and display the error.
            exit("Error: " . $e->getMessage());
        }
    }
}









//             // $username = "root";
//             // $password = "2cameron2";
//             // $dbh = new PDO('mysql:host=mariadb;dbname=oop-login', $username, $password);
//             // return $dbh;
//         }
//         catch(PDOException $e) {
//             echo "Connection failed: " . $e->getMessage() . "<br>";
//             die();
//         }
//     }
// }

?>
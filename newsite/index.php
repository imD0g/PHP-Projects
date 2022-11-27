<!-- Create a basic webpage with a login form and a sign up form -->
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
</head>
<body>
    <h1>My Website</h1>
    <h2>Login</h2>

    <?php
        if(isset($_SESSION["userid"])) {
    ?>
    <h1>LOGGED IN</h1>
    <?php
        } else {
        ?>
        <h1>NOT LOGGED IN - FIX WRONG PW</h1>
        <?php
        }
        ?>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <button type="submit" name="submit">Login</button>
    </form>
    <h2>Sign Up</h2>
    
    <form action="includes/signup.inc.php" method="post"><br>
        <input type="text" name="uid" placeholder="Username"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <button type="submit" name="submit">Sign Up</button>
    </form>
</body>
</html>


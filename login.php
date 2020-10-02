<?php require "header.php" ?>

<body>
    <h1 id="title">Login</h1>
    <form class="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="container">
            <i class="fa fa-user icon"></i>
            <input type="text" name="username" id="username" placeholder="Username" required><br>
        </div>
        <input type="password" name="pwd" id="pwd" placeholder="Password" required><br>
        <button class="btn" type="submit" name="submit">Login</button>
    </form>

    <!-- Php Code for checking username already exists or not -->
    <?php
        include_once "connection.php";

        $username = $password = "";

        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['pwd'];            

            // require "checker.php";
            $username_check_query = "SELECT * FROM loginsys WHERE username = '$username'";
            $checker = mysqli_query($conn, $username_check_query);
            $checker_val = mysqli_num_rows($checker);
        
            if($checker_val>0)
            {
                
                $storePass = "SELECT pwd FROM loginsys WHERE username = '$username'";
                $runStorePass = mysqli_query($conn, $storePass);
                $myPass = mysqli_fetch_array($runStorePass);
                
                if(password_verify($password, $myPass)) {
                    echo "<p><br>You are logged In<p>";
                    // header("Location: about.php");
                } else {
                    echo "<p>Please enter the valid password</p>";
                }
                
                // die();
            }
            else
            {
//                 echo "<p><br>Account Doesn't exists to login please create an accout<p>";
                    echo "<p>Please enter the valid username</p>";
            }
        }

        mysqli_close($conn);
    ?>
</body>
</html>

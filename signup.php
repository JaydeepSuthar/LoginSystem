<?php require "header.php" ?>

<body>
    <h1 id="title">Sign Up</h1>
    <form class="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" id="username" placeholder="Username" required><br>
        <input type="text" name="fname" id="fname" placeholder="First Name" required><br>
        <input type="text" name="lname" id="lname" placeholder="Last Name" required><br>
        <input type="text" name="mno" id="mno" placeholder="Mobile Number" pattern="[0-9]{10}" required><br>
        <input type="email" name="email" id="email" placeholder="E-mail" required><br>
        <input type="password" name="pwd" id="pwd" placeholder="Password" required><br>
        <button class="btn" type="submit" name="submit">Sign Up</button>
    </form>

    <?php
        include_once "connection.php";

        $username = $fname = $lname = $mobileno = $password = "";

        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $mobileno = $_POST['mno'];
            $email = $_POST['email'];
            $password = $_POST['pwd'];

            // require "checker.php";
            //Checking account already exist or not            
            $username_check_query = "SELECT * FROM loginsys WHERE username = '$username' OR email = '$email'";
            $checker = mysqli_query($conn, $username_check_query);
            $checker_val = mysqli_num_rows($checker);
        
            if($checker_val>0)
            {
                echo "<p><br>Account Already exist please logged In<p>";
            }
            else
            {
                $query = "INSERT INTO loginsys(username, pwd, fname, lname, phoneno, email)
                            VALUES('$username', '$password', '$fname', '$lname', '$mobileno','$email');";

                if(mysqli_query($conn, $query))
                {
                    echo "<p>Succesfully New User Created</p>";
                    // header("Location: about.php");
                    // exit();                  
                }
                else
                {
                    echo "<p>Due to some reason we unable to create your account please try again</p>";
                }

                //header("Location: /storage/ssd1/594/11939594/public_html/user/header.php");
            }

        }
        mysqli_close($conn);
    ?>
</body>
</html>
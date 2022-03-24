<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <?php
        session_start();
        $_SESSION["logged_in"] = FALSE;
        $_SESSION["user"] = "";
        $error = "";
        $link = mysqli_connect('127.0.0.1:3306', "charlieg", "WebDev2021", "tetris");
        if (!$link) {
            die('Could not connect: ' . mysqli_error());
        }
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['confirm-password'])) {
            $username = $_POST['username'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm-password'];
            if ($password != $confirm) {
                $error = "Passwords did not match.";
            }
            $display = isset($_POST['display']) ? 1 : 0;
            $sql = "INSERT INTO Users VALUES('$username', '$firstName', '$lastName', '$password', $display);";
            
            $sql_check = "SELECT UserName FROM Users WHERE UserName='$username';";
            $result = mysqli_query($link, $sql_check);

            if (mysqli_num_rows($result) == 0) {
                if (mysqli_query($link, $sql) && $error == "") {
                    $_SESSION["logged_in"] = TRUE;
                    $_SESSION["user"] = $username;
                } else {
                    echo "Error: ". mysqli_error($link);
                }
            } else {
                $error = "Username already taken.";
            }
            
        }
        else if (isset($_GET['username']) && isset($_GET['password'])) {
            $username = $_GET['username'];
            $password = $_GET['password'];
            $sql = "SELECT Password FROM Users WHERE UserName='$username';";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['Password'] == $password) {
                $_SESSION["logged_in"] = TRUE;
                $_SESSION["user"] = $username;
            } else {
                $error = "Username or password was invalid";
            }
        }
        mysqli_close($link);
    ?>
    <body>
        <ul>
            <li name="home"><a class="active" href="index.php">Home</a></li>
            <li name="tetris"><a href="tetris.php">Play Tetris</a></li>
            <li name="leaderboard"><a href="leaderboard.php">Leaderboard</a></li>
        </ul>
        <div class="main">
            <div class="welcome">
                <?php
                if ($error != "") {
                    echo "<p class='error'>$error</p>";
                    $error = "";
                }
                if ($_SESSION['logged_in']) {
                    echo '
                    <h1 class="title">Welcome to Tetris</h1>
                    <a href = "tetris.php">
                        <button id="play-button">Click here to play</button>
                    </a>';
                } else {
                    echo 
                    '<form method="get">
                        Username: <input type="text" name="username" style="width: 2cm"><br>
                        Password: <input type="password" name="password" style="width: 2cm"><br>
                        <input type="submit" value="Login">
                        <p>Don\'t have an account? <a href="register.php">Register now</a></p>
                    </form>';
                }
                ?>
                
                
            </div>
        </div>
    </body>
</html>

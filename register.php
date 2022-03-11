<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <ul>
            <li name="home"><a class="active" href="index.php">Home</a></li>
            <li name="tetris"><a href="tetris.php">Play Tetris</a></li>
            <li name="leaderboard"><a href="leaderboard.php">Leaderboard</a></li>
        </ul>
        <div class="main">
            <div class="register">
                <h1 class="title">Register</h1>
                <form action="index.php" method="POST">
                    First Name: <input class="register" type="text" name="firstName" style="width: 35%"><br>
                    Last Name: <input class="register" type="text" name="lastName" style="width: 35%"><br>
                    Username: <input class="register" type="text" name="username" style="width: 35%"><br>
                    Password: <input class="register" type="password" name="password" style="width: 35%" placeholder="Password"><br>
                    <input class="register" type="password" name="confirm-password" style="width: 35%" placeholder="Confirm Password"><br>
                    Display scores on leaderboard <input class="register" type="radio" name="display"><br>
                    <input class="register-button" type="submit" value="Register">
                </form>
            </div>
        </div>
    </body>
</html>

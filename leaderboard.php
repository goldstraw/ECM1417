<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <script src="tetris.js"></script>
    </head>
    <?php
        session_start();
        $link = mysqli_connect('127.0.0.1:3306', "charlieg", "WebDev2021", "tetris");
        if (!$link) {
            die('Could not connect: ' . mysqli_error());
        }
        if (isset($_POST['score']) && isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
            $username = $_SESSION["user"];
            $score = $_POST['score'];
            $sql_check = "SELECT Display FROM Users WHERE UserName='$username';";
            $result = mysqli_query($link, $sql_check);
            $row = mysqli_fetch_assoc($result);
            if ($row['Display'] == 1) {
                $sql = "INSERT INTO Scores (Username, Score) VALUES ('$username', '$score');";
                $result = mysqli_query($link, $sql);
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
                <h1 class="title">Leaderboard</p>
                <table>
                    <tr>
                        <th>Username</th>
                        <th>Score</th>
                    </tr>
                    <?php
                        $link = mysqli_connect('127.0.0.1:3306', "charlieg", "WebDev2021", "tetris");
                        if (!$link) {
                            die('Could not connect: ' . mysqli_error());
                        }
                        $sql_check = "SELECT * FROM Scores ORDER BY Score DESC";
                        $result = mysqli_query($link, $sql_check);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $username = $row["Username"];
                            $score = $row["Score"];
                            echo "<tr><td>$username</td><td>$score</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

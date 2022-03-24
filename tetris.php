<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <script src="tetris.js"></script>
    </head>
    <body>
        <ul>
            <li name="home"><a class="active" href="index.php">Home</a></li>
            <li name="tetris"><a href="tetris.php">Play Tetris</a></li>
            <li name="leaderboard"><a href="leaderboard.php">Leaderboard</a></li>
        </ul>
        <div class="main">
            <div class="welcome">
                <div id="board">
                    <div id="tetris-bg">
                        <p id="score">Score: 0</p>
                    </div>
                </div>
                <?php
                    session_start();

                    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
                        echo '<button id="play-button" onclick="start_tetris()">Start the game</button>';
                    } else {
                        echo '<p class="error">You must be logged in to view this content</p>';
                    }
                ?>
                
            </div>
        </div>
    </body>
</html>

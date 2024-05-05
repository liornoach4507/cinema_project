<?php
# Initialize the session
session_start();

# If user is not logged in then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== TRUE) {
  echo "<script>" . "window.location.href='./login.php';" . "</script>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.css">
    <script src="welcome.js" defer></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Welcome</title>
    <style>
        /* Add additional styles here if needed */
        .movie {
            display: inline-block;
            margin: 10px;
        }

        .movie img {
            width: 200px;
            height: auto;
            cursor: pointer;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .movie img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <nav>
        <ul> 
            
            <li><a href="./logout.php" id="logout">Logout</a></li>
        </ul>
    </nav>
    <div id="background-container"></div>
    <div id="content-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <h4>Your balance is: <?php echo htmlspecialchars($_SESSION['balance']); ?></h4>
        <p id="welcome-message">Welcome to our system! You have successfully logged in.</p>
       
        <div id="movies-container">
            <h2>Movies</h2>
            <div class="movie" data-url="https://www.imdb.com/title/tt6105098">
                <img src="img/king lion.jpg" alt="Movie 1" data-price="100" data-movie-name="The Lion King">
            </div>
            <div class="movie" data-url="https://www.imdb.com/title/tt1201607">
                <img src="img/hary poter.jpg" alt="Movie 2" data-price="100" data-movie-name="harry potter">
            </div>
            <div class="movie" data-url="https://www.imdb.com/title/tt1392170/">
                <img src="img/play.jpg" alt="Movie 3" data-price="100" data-movie-name="play">
            </div>
            <div class="movie" data-url="https://www.imdb.com/title/tt10872600/">
                <img src="img/OIP.jpg" alt="Movie 4" data-price="100" data-movie-name="spiderman">
            </div>
            <div class="movie" data-url="https://www.imdb.com/title/tt0266543/">
                <img src="img/nemo.jpg" alt="Movie 5" data-price="100" data-movie-name="Finding Nemo">
            </div>
            <div class="movie" data-url="https://www.imdb.com/title/tt5433140/">
                <img src="img/fast.jpg" alt="Movie 6" data-price="100" data-movie-name="fast and crazy">
            </div>
            <div class="movie" data-url="https://www.imdb.com/title/tt1155076/">
                <img src="img/karate kid.jpg" alt="Movie 7" data-price="100" data-movie-name="karate kid">
            </div>
            <div class="movie" data-url="https://www.imdb.com/title/tt1790864/">
                <img src="img/ran.jpg" alt="Movie 8" data-price="100" data-movie-name="ran">
            </div>
            <div class="movie" data-url="https://www.imdb.com/title/tt0441773/">
                <img src="img/R.jpg" alt="Movie 9" data-price="100" data-movie-name="kong po panda">
            </div>
        </div>
      </div>
    
</body>
</html>

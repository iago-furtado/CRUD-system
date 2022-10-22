<?php

// Include database file
include 'database.php';

$portfolioOjb = new database();

// Insert Record in customer table
if(isset($_POST['submit'])) {
  $portfolioOjb->insertData($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Investment Portfolio</title>
        <meta name="description" content="Site that create, read, update and delete shares in the client's investment portfolio.">
        <meta name="robots" content="noindex, nofollow">
        <!--  CSS  -->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <!-- Fav icon -->
        <link rel="icon" type="image/x-icon" href="./img/fav-ico.ico">
        <!-- Google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <!--  Add our Bootstrap  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Header -->
        <header>
            <!-- Logo -->
            <div class="logo">
                <a href="#">
                <img src="./img/logo.png" alt="Logo">
                </a>
            </div>
            <div class="portifolioName">
                <h1>Investment Portfolio</h1>
            </div>
            <div class="clientInformation">
                <div class="name">
                    <p>Lebron James</p>
                </div>
                <div class="clientInfo">
                    <div class="info">
                        <a href="#"><img src="./img/bell.png" alt="Facebook"></a>
                    </div>
                    <div class="info">
                        <a href="#"><img src="./img/contact.png" alt="Facebook"></a>
                    </div>
                    <div class="info">
                        <a href="#"><img src="./img/setting.png" alt="Facebook"></a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main -->
        <main>
            <section>
                <h1>New Investment</h1>
            </section>
            <section class="form">
                <!-- Validation -->
                <?php 
                    if (empty($cod)) {
                        $error = "Cod of the company is require";
                      }else if(empty($companyName)){
                        $error = "Company Name is required";
                      }else if(empty($qtt)){
                        $error = "Quantity is required";
                      }else if(empty($price)){
                        $error = "Price is required";
                      }else if(!is_numeric($qtt)){
                        $error = "Quantity must be number";
                      }else if(!is_numeric($price)){
                        $error = "Price must be number";
                      } 
                ?>
                <form action="add.php" method="POST">
                    <!-- Stock cod -->
                    <label for="cod">Cod: </label>
                        <input type="text" name="cod">
                    <br>
                    <!-- Company name -->
                    <label for="companyName">Company Name: </label>
                        <input type="text" name="companyName">
                    <br>
                    <!-- Quantity -->
                    <label for="qtt">Quantity: </label>
                        <input type="text" name="qtt">
                    <!-- Price -->
                    <label for="price">Price: </label>
                        <input type="text" name="price">
                    <br>
                    <!-- Submit -->
                    <input class="btn" type="submit" name="submit" value="Submit">
                    <input class="btn" type="reset" name="reset" value="Reset">
                </form>
            </section>
        </main>
         <!-- Footer -->
        <footer>
            <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">About</a></li>
                <li><a href="index.php">Contact</a></li>
            </ul>
            </nav>
                <a href="#">
                    <img src="./img/logo.png" alt="Logo">
                </a>
            <div>
                <a href="#"><img src="./img/icon-facebook.png" alt="Facebook"></a>
                <a href="#"><img src="./img/icon-instagram.png" alt="Instagram"></a>
                <a href="#"><img src="./img/icon-twitter.png" alt="Twitter"></a>
                <a href="#"><img src="./img/icon-youtube.png" alt="Youtube"></a>
            </div>
        </footer> 
    </body>
</html>
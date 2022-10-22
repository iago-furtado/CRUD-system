<?php
  // Include database file
  include 'database.php';
	$portfolioObj = new database();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $portfolioOjb->deleteRecord($deleteId);
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
    <?php
        if (isset($_GET['msg1']) == "insert") {
        echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Investment added successfully
              </div>";
        }
        if (isset($_GET['msg2']) == "update") { 
          echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                Investment updated successfully
              </div>";
        }
        if (isset($_GET['msg3']) == "delete") {
          echo "<div class='alert alert-success alert-dismissible'>
                <button type='button', class='close' data-dismiss='alert'>×</button>
                Investment deleted successfully
              </div>";
        }
    ?>
      <!-- Display the record -->
      <section>
        <h2>View Investments
          <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
        </h2>
        <table class="table table-hover thead-dark table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Cod</th>
              <th>Company Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $portfolio = $portfolioObj->displayData();
          foreach ($portfolio as $portfolio) {
          ?>
            <tr>
              <td><?php echo $portfolio['id']; ?></td>
              <td><?php echo $portfolio['cod']; ?></td>
              <td><?php echo $portfolio['companyName'] ;?></td>
              <td><?php echo $portfolio['qtt'] ;?></td>
              <td><?php echo $portfolio['price']; ?></td>
              <td>
                <button class="btn btn-primary mr-2"><a href="edit.php?editId=<?php echo $portfolio['id'] ?>">
                    <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
                <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $portfolio['id'] ?>" onclick="confirm('Are you sure you REALY want to do this')">
                    <i class="fa fa-trash text-white" aria-hidden="true"></i>
                  </a>
                </button>
              </td>
            </tr>
          <?php 
            } 
          ?>
          </tbody>
        </table>
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
<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['user_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rent Book</title>
  <link rel="stylesheet" href="assets/css/mains.css">
</head>
<body>
  <section>
    <div class="bg"></div>
    <header>
      <a href="#" class="logo">Book Rental</a>
      <div class="toggle"></div>
      <ul class="navigation">
        <li><a href="user.php" class="active">Home</a></li>
        <li><a href="userrental.php">View History</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </header>
    <div class="content">
      
      <h3 style="text-align:center; color: #386641; font-size: 40px; padding-top: 50px;">Available Books</h3>
      <div class="btn">
      <a href="userth.php" class="button">TH</a>
      <a href="useren.php" class="button">EN</a>
      </div>
      <section class="menu-content">
        <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $database = "registration_system";
         $connection = new mysqli($servername,$username,$password,$database);
         $sql = "SELECT * FROM book NATURAL JOIN type join author using(author_id) where book_lan ='EN'";
         $result1 = $connection->query($sql);
         
         if(mysqli_num_rows($result1) > 0) {
           while($row1 = mysqli_fetch_assoc($result1)){
               $book_id = $row1["book_id"];
               $book_name = $row1["book_name"];
               $type = $row1["type"];
               $book_img = $row1["book_img"];
               $author_name = $row1["author_name"];
               $book_lan = $row1["book_lan"];
               ?>
         <a href="booking.php?id=<?php echo($book_id) ?>">
         <div class="sub-menu">
         <img class="card-img-top" src="<?php echo $book_img; ?>" alt="Card image cap">
             <h5><b> <?php echo $book_name; ?> </b></h5>
             <h6> Languages: <?php echo $book_lan; ?></h6>
             <h6> Author name: <?php echo $author_name; ?></h6>
             <h6> Book category: <?php echo $type; ?></h6>
           </div>
           </a>

     <?php }}
     else {
         ?>
<h1> No books available :( </h1>
         <?php
     }
     ?>
     
     
</section>
</div> 
      </div>
  </section>
</body>
</html>
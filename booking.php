<?php 

    session_start();
    include 'config/db.php';
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
  <link rel="stylesheet" href="assets/css/mainrental.css">
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
    <form role="form" action="bookingconfirm.php" method="POST">

          <?php
                $book_id = $_GET["id"];
                $connection = new mysqli('localhost','root','','registration_system');
                $sql = "SELECT * FROM book natural join type join author using(author_id) where book_id = $book_id";
                $result1 = $connection->query($sql);
                isset($_SESSION['login_customer']);
                
                if(mysqli_num_rows($result1) > 0) {
                  while($row1 = mysqli_fetch_assoc($result1)){
                      $book_id = $row1["book_id"];
                      $book_name = $row1["book_name"];
                      $type = $row1["type"];
                      $author_name = $row1["author_name"];
                      $book_img = $row1["book_img"];
                      ?>
      
            <?php }}
            ?>

          <!-- <div class="form-group"> -->
          <div class="mb-3">
            Selected Book:&nbsp;<?php echo($book_name);?>
                  </div>
          <div class="mb-3">
          Book type:&nbsp;<?php echo($type);?>
                  </div>
          <div class="mb-3">
          Author name:&nbsp;<?php echo($author_name);?>
                  </div>
        <?php $today = date("Y-m-d") ?>
        <div class="mb-3">
          <label><h5>Start Date:</h5></label>
            <input type="date" name="rent_start_date" min="<?php echo($today);?>" required="">
            </div>
            <div class="mb-3">  
          <label><h5>End Date:</h5></label>
          <input type="date" name="rent_end_date" min="<?php echo($today);?>" required="">
          <div class="mb-3">
            
          <input type="hidden" name="book_id" value="<?php echo($book_id);?>">
                
         
           <input type="submit"name="submit" value="Rent Now" class="btn btn-warning pull-right">     
        </form>
      </div>
  </section>
</body>
</html>
<?php 
 include('session_customer.php');
if(!isset($_SESSION['user_login'])){
    session_destroy();
    header("location: signin.php");
}
?> 
<head>
<link rel="stylesheet" href="assets/css/bookconfirm.css">
</head>

<body>
</body>
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
      <h3 style="text-align:center; color: red; font-size: 70px; padding-top: 100px;">Your Booking Error</h3>
      <h3 style="text-align:center; color: red; font-size: 70px; padding-top: 20px;">Please check rent date again</h3>
      <div class="btn">
      <a href="user.php" class="button">Back</a>
    </div>

     
     
</section>
</div> 
      </div>
  </section>

</html>
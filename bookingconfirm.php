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

<?php 

$user_login = $_SESSION['user_login'];
$book_id = $conn->real_escape_string($_POST['book_id']);
$rent_start_date = date('Y-m-d', strtotime($_POST['rent_start_date']));
$rent_end_date = date('Y-m-d', strtotime($_POST['rent_end_date']));
function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}
$err_date = dateDiff("$rent_start_date", "$rent_end_date");
$sql4 = "SELECT firstname,lastname FROM users where id = '$user_login'";

$result4 = $conn->query($sql4);


if (mysqli_num_rows($result4) > 0) {
    while($row = mysqli_fetch_assoc($result4)) {
        $firstname = $row["firstname"];   
        $lastname = $row["lastname"];
    }
}
if($err_date >= 0) { 
$sql1 = "INSERT into rental(id,firstname,lastname,book_id,rental_date,return_date,days) 
   VALUES('" . $user_login . "','" . $firstname . "','" . $lastname . "','" . $book_id . "','" . $rent_start_date ."','" . $rent_end_date . "','" . DATEDIFF($rent_start_date,$rent_end_date) . "')";
    $result1 = $conn->query($sql1);
}
else{
    header("location: bookingfailed.php");
}
?>
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
      <h3 style="text-align:center; color: #386641; font-size: 70px; padding-top: 100px;">Your Booking Confrim</h3>
      <h3 style="text-align:center; color: #386641; font-size: 70px; padding-top: 20px;">Thank you</h3>
      <div class="btn">
      <a href="user.php" class="button">Back</a>
    </div>

     
     
</section>
</div> 
      </div>
  </section>

</html>
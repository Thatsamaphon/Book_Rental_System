<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
        header('location: signin.php');
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book rental</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/mainrental.css">
    
    
</head>

<body>
<section>
    <div class="bg"></div>
    <header>
      <a href="admin.php" class="logo">Book Rental</a>
      <div class="toggle"></div>
      <ul class="navigation">
        <li><a href="admin.php" class="active">Home</a></li>
        <li><a href="adminrental.php">View History</a></li>
        <li><a style=" float:left " href="insert.php" class="btn btn-success">Add Data</a></li>
        <li><a style=" float:left " href="addbook.php" class="btn btn-success">Add Book</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </header>
    <div class="content">

        <table id = "myTable">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Book name</th>
            <th scope="col">Rent date</th>
            <th scope="col">Returned date</th>
            <th scope="col">Day</th>
            <th scope="col">Total amount</th>
            <th scope="col">Returned</th>
            <th scope="col">Return status</th>
            <th scope="col">Update</th>
            </tr>
        </thead>
            <tbody style="color: black">
                <?php
                $user_login = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT rental_id,id,rental_date,returned,return_date,book_name,days,firstname,lastname,return_status FROM rental NATURAL JOIN book");
                $stmt->execute();
                $rentals = $stmt->fetchAll();
                foreach($rentals as $rental){
                ?>
                <tr>
                <td><?php echo $rental['rental_id']?></td>
                <td><?php echo $rental["firstname"]?></td>
                <td><?php echo $rental["lastname"]?></td>
                <td><?php echo $rental["book_name"]?></td>
                <td><?php echo $rental["rental_date"]?></td>
                <td><?php echo $rental["return_date"]?></td>
                <td><?php echo $rental["days"]?></td>
                <td><?php echo $rental["days"]*3, ' ฿'?></td>
                <td><?php echo $rental["returned"]?></td>
                <td><?php echo $rental["return_status"]?></td>
                
                <td>
                        <a class='btn' href ='update.php?id=<?php echo $rental['rental_id'];?>'>Update</a>
                        <a class='btn' style = "color: green;" href ='return.php?return=<?php echo $rental['rental_id'];?>'>Return</a>
                        <a class='btn' style = "color: red;" href ='delete.php?del=<?php echo $rental['rental_id'];?>'>Delete</a>
                </td>
                </tr>
    <?php
    }
    ?>
    </tbody>
     </table>
</div>
    <script>
        function sendGaEvent(category, action, label) {
            ga('send', {
                hitType: 'event',
                eventCategory: category,
                eventAction: action,
                eventLabel: label
            });
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src = "https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
    </script>
</body>
</html>
<?php 

    include_once('function.php');

    $updatedata = new DB_con();

    if (isset($_POST['update'])) {

        $userid = $_GET['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $book_id = $_POST['book_id'];
        $rental_date = $_POST['rental_date'];
        $return_date = $_POST['return_date'];
        $days = $_POST['days'];
        $total_amount = $_POST['total_amount'];
        $return_status = $_POST['return_status'];

        $sql = $updatedata->update($firstname, $lastname, $book_id,  $rental_date, $return_date, $days, $total_amount, $return_status, $userid);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='adminrental.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='update.php'</script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/rental.css">
    
<body>

    <div class="container">
        <h1 class="mt-5">Update Page</h1>
        <a href="adminrental.php" class="btn btn-primary mt-5">Go Back</a>
        <hr>
        <?php 

            $userid = $_GET['id'];
            $updateuser = new DB_con();
            $sql = $updateuser->fetchonerecord($userid);
            while($row = mysqli_fetch_array($sql)) {
        ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="book_id" class="form-label">Book name</label>
                <select name = "book_id" value="<?php echo $row['book_id']; ?>" required>
                <option value=1>The little book</option>
                <option value=2>Good to Great: Why Some Companies Make the Leap and Others Don't</option>
                <option value=3>The World As I See It</option>
                <option value=4>Mrs. Dalloway</option>
                <option value=5>The Call of Cthulhu</option>
                <option value=6>Ms. Marvel Volume 1: No Normal</option>
                <option value=7>From Hell</option>
                <option value=8>Dark Star Safari: Overland from Cairo to Cape Town</option>
                <option value=11>?????????????????????????????? Python 500 ?????????</option>
                <option value=12>??????????????? : ????????? ???????????????????????? ??? ??????????????????</option>
            </select>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" 
                value="<?php echo $row['firstname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname"
                value="<?php echo $row['lastname']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="rental_date" class="form-label">Rent Date</label>
                <input type="date" class="form-control" name="rental_date" 
                value="<?php echo $row['rental_date']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="return_date" class="form-label">Returned Date</label>
                <input type="date" class="form-control" name="return_date" 
                value="<?php echo $row['return_date']; ?>" >
            </div>
            <div class="mb-3">
                <label for="days" class="form-label">Days</label>
                <input type="text" class="form-control" name="days" 
                value="<?php echo $row['days']; ?>" >
            </div>
            <div class="mb-3">
                <label for="return_status" class="form-label">Return Status</label>
                <select name = "return_status" value="<?php echo $row['return_status']; ?>" required>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            </div>
            <?php } ?>
            <br>
            <button type="submit" name="update" class="btn btn-success">UPDATE</button>
        </form>
    </div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        
</body>
</html>
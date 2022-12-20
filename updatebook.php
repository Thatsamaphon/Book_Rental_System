<?php 

    include_once('function.php');

    $updatedatabook = new DB_con();

    if (isset($_POST['update'])) {

        $book_id = $_GET['id'];
        $book_name = $_POST['book_name'];
        $book_img = $_POST['book_img'];
        $book_lan = $_POST['book_lan'];
        $author_id = $_POST['author_id'];
        $type_id = $_POST['type_id'];

        $sql = $updatedatabook->updateBook($book_id,$book_name, $book_img, $book_lan, $author_id, $type_id);
        if ($sql) {
            echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='admin.php'</script>";
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
        <h1 class="mt-5">Update Book Page</h1>
        <a href="admin.php" class="btn btn-primary mt-5">Go Back</a>
        <hr>
        <?php 

            $book_id = $_GET['id'];
            $updatbook = new DB_con();
            $sql = $updatbook->fetchonebook($book_id);
            while($row = mysqli_fetch_array($sql)) {
                ?>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="book_name" class="form-label">Book name</label>
                        <input type="text" class="form-control" name="book_name" 
                        value="<?php echo $row['book_name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="book_img" class="form-label">Book Image</label>
                        <input type="text" class="form-control" name="book_img"
                        value="<?php echo $row['book_img']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="book_lan" class="form-label">Book languages</label>
                        <select name = "book_lan" value="<?php echo $row['book_lan']; ?>" required>
                            <option value="TH">Thai</option>
                            <option value="EN">English</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="author_id" class="form-label">Author ID</label>
                        <select name = "author_id" value="<?php echo $row['author_id']; ?>" required>>
                            <option value=1>Ken Mogi</option>
                            <option value=2>Jim Collins</option>
                            <option value=3>Virginia Woolf</option>
                            <option value=4>Albert Einstein</option>
                            <option value=5>H P Lovecraft , François Baranger</option>
                            <option value=6>G. Willow Wilson</option>
                            <option value=8>Paul Theroux</option>
                            <option value=9>อาจารย์ฆฤณ ชินประสาทศักดิ์</option>
                            <option value=10>นทธี ศศิวิมล</option>
                            <option value=11>ดร. รื่นฤทัย สัจจพันธุ์</option>
                            <option value=12>พระบาทสมเด็จพระพุทธเลิศหล้านภาลัย</option>
                        </select> 
                    </div>
                    <div class="mb-3">
                    <label for="type_id" class="form-label">Type</label>
                    <select name = "type_id" value="<?php echo $row['type_id']; ?>" required>
                        <option value=1>Live</option>
                        <option value=2>Adventure</option>
                        <option value=3>Knowledge</option>
                        <option value=4>Science</option>
                        <option value=5>Horror</option>
                        <option value=6>Novel</option>
                        <option value=7>Comic</option>
                        <option value=8>Travel</option>
                        <option value=9>Cooking</option>
                        <option value=10>Travel</option>
                        <option value=11>Literature</option>
                    </select>
                    </div>
                    <?php } ?>
            <br>
            <a class='btn btn-danger' href ='deletebook.php?del=<?php echo $book_id;?>'>DELETE</a>
            <button type="submit" name="update" class="btn btn-success">UPDATE</button>
        </form>
    </div>
                

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        
</body>
</html>

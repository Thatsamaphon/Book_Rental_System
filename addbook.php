<?php
session_start();
require_once "config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/rental.css">

    </head>
<body>
    
    <div class="container">
        <a href="admin.php" class="btn btn-primary mt-5">Go Back</a>
        <hr>
        <h1 class="mt-5">Add Book Page</h1>
        <hr>
         <form action="insertbook.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="book_name" class="col-form-label">Book Name:</label>
            <input type="text" required class="form-control" name="book_name">
        </div>
        <div class="mb-3">
            <label for="type_id" class="col-form-label">Type ID:</label>
            <select name = "type_id">
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
        <div class="mb-3">
            <label for="book_lan" class="col-form-label">Book languages:</label>
            <select name = "book_lan">
                <option value="TH">Thai</option>
                <option value="EN">English</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="author_id" class="col-form-label">Author name:</label>
            <select name = "author_id">
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
            <label for="img" class="col-form-label">Image:</label>
            <input type="file" required class="form-control" id="imgInput" name="img">
            <img loading="lazy" width="100%" id="previewImg" alt="">
        </div>

        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file)
            }
        }
    </script>

</body>
</html>
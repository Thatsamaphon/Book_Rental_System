<?php

    session_start();
    require_once "config/db.php";

    if (isset($_POST['submit'])){
        $book_name = $_POST['book_name'];
        $type_id = $_POST['type_id'];
        $book_lan = $_POST['book_lan'];
        $author_id = $_POST['author_id'];
        $img = $_FILES['img'];

        $allow = array('jpg', 'png', 'gif','jpeg');
        // แยกชื่อกับนาสกุลไฟล์
        $extension = explode(".", $img['name']);
        // แปลงนามสกุลไฟล์เป็นพิมเล็ก
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;
        // เอาไฟล์ไปเก็บไว้ไหน
        $filePath = "assets/books/" . $fileNew;

        if (in_array($fileActExt, $allow)){
            if ($img['size'] > 0 && $img['error'] == 0){
                if (move_uploaded_file($img['tmp_name'], $filePath)){
                    $sql = $conn->prepare("INSERT INTO book(book_name,type_id,book_lan,author_id,book_img) values(:book_name,:type_id,:book_lan,:author_id,:img)");
                    $sql->bindParam(":book_name", $book_name);
                    $sql->bindParam(":type_id", $type_id);
                    $sql->bindParam(":book_lan", $book_lan);
                    $sql->bindParam(":author_id", $author_id);
                    $sql->bindParam(":img", $filePath);
                    $sql->execute();

                    if($sql){
                        $_SESSION['success'] = "Success";
                        header("location: admin.php" );
                    } else { 
                        $_SESSION['error'] = "Error Please try agian";
                        header("location: admin.php" );
                    }
                }
            }
        }
    }
?>
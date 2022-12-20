<?php 

    include_once('function.php');

    if (isset($_GET['del'])) {
        $book_id = $_GET['del'];
        $deletebook = new DB_con();
        $sql = $deletebook->deletebook($book_id);

        if ($sql) {
            echo "<script>alert('Book Deleted Successfully!');</script>";
            echo "<script>window.location.href='admin.php'</script>";
        }
    }

?>

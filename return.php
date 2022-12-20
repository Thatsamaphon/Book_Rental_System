<?php 

    include_once('function.php');

    if (isset($_GET['return'])) {
        $returnid = $_GET['return'];
        $returndata = new DB_con();
        $sql = $returndata->return($returnid);

        if ($sql) {
            echo "<script>alert('Return Successfully!');</script>";
            echo "<script>window.location.href='adminrental.php'</script>";
        }
    }

?>
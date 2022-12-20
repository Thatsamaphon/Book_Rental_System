<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'registration_system');
    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($firstname, $lastname, $book_id, $rental_date, $return_date,$days) {
            $result = mysqli_query($this->dbcon, "INSERT INTO rental(firstname, lastname, book_id, rental_date, return_date,days) VALUES('$firstname', 
            '$lastname', '$book_id', '$rental_date', '$return_date','$days')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM rental natural join book");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM rental natural join book WHERE rental_id = '$userid'");
            return $result;
        }

        public function fetchonebook($book_id) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM book WHERE book_id = '$book_id'");
            return $result;
        }
        
        public function return($returnid) {
            $date = date("Y-m-d");
            $result = mysqli_query($this->dbcon, "UPDATE rental  SET 
                return_status = 'yes',
                returned = '$date'
                WHERE rental_id = '$returnid'
            ");
            return $result;
        }
        public function update($firstname, $lastname, $book_id, $rental_date, $return_date, $days, $total_amount, $return_status, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE rental  SET 
                firstname = '$firstname',
                lastname = '$lastname',
                book_id = '$book_id',
                rental_date = '$rental_date',
                return_date = '$return_date',
                days = '$days',
                return_status = '$return_status'
                WHERE rental_id = '$userid'
            ");
            return $result;
        }

        public function updateBook($book_id,$book_name, $book_img, $book_lan, $author_id, $type_id) {
            $result = mysqli_query($this->dbcon, "UPDATE book  SET 
                book_name = '$book_name',
                book_img = '$book_img',
                book_lan = '$book_lan',
                author_id = '$author_id',
                type_id = '$type_id'
                WHERE book_id = '$book_id'
            ");
            return $result;
        }
        

        public function delete($rentalid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM rental WHERE rental_id = '$rentalid'");
            return $deleterecord;
        }

        public function deletebook($book_id) {
            $deletebook = mysqli_query($this->dbcon, "DELETE FROM book WHERE book_id = '$book_id'");
            return $deletebook;
        }

    }
    

?>

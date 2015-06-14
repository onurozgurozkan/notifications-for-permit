<?php
    class connect{
        public $conn;
        public function __construct(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "odev3";
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        }

        public function insert($number, $answer){
            $sql = "INSERT INTO bildirim_alma_izinleri (numara, cevap) VALUES (".$number.",".$answer.")";
            $this->conn->exec($sql);
        }
    }
?>
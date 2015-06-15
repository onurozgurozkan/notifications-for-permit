<?php
    class connect{

        protected $conn;

        public function __construct($servername, $dbname, $username, $password){
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        }

        //If number previously attached, this method makes updating
        public function insert($number, $answer){
            $sql = "INSERT INTO notification_for_permit (number, answer) VALUES (".$number.",".$answer.")";
            if (!$this->conn->exec($sql)) {
                $sql = "UPDATE notification_for_permit SET answer=".$answer." WHERE number=".$number;
                $this->conn->exec($sql);
            }
        }



    }

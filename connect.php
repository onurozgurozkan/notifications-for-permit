<?php
    class connect{

        protected $conn;
        protected $servername = "localhost";
        protected $username = "root";
        protected $password = "";
        protected $dbname = "notifications";

        public function __construct(){
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        }

        //If number previously attached, this method makes updating
        public function insert($number, $answer){
            $sql = "INSERT INTO notification_for_permit (number, answer) VALUES (".$number.",".$answer.")";
            if (!$this->conn->exec(@sql)) {
                $sql = "UPDATE notification_for_permit SET answer=".$answer." WHERE number=".$number;
                $this->conn->exec($sql);
            }
        }



    }

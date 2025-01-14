<?php
    spl_autoload_register(function($class){
        require $class . "class.php";
    });

    class Requites {
        private $dbconn;
        private $sql;
        private $data;


        private function __construct() 
        {
            $this->dbconn = Database::getInstance()->getConnection();
        }

        public function insertData($table, $values) {
            $columns = "";
            $placeholders = "";

            foreach($values as $key => $value) {
                $columns .= $key . ", ";
                $placeholders .= ":" . $key . ", ";
            }

            $columns = rtrim($columns, ", ");
            $placeholders = rtrim($placeholders, ", ");

            $this->sql = "INSERT INTO $table($columns) VALUES ($placeholders)";
            $result = $this->dbconn->prepare($this->sql);

            foreach($values as $key => $value) {
                $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $result->bindValue(":" . $key , $value, $type);
            }
            return $result->execute();
        }
    }
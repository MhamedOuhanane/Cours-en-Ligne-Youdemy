<?php
    spl_autoload_register(function($class){
        require $class . ".class.php";
    });

    class Requites {
        private $dbcon;
        private $sql;
        private $data;


        public function __construct() 
        {
            $this->dbcon = Database::getInstance()->getConnection(); 
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
            $result = $this->dbcon->prepare($this->sql);

            foreach($values as $key => $value) {
                $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $result->bindValue(":" . $key , $value, $type);
            }
            return $result->execute();
        }

        public function selectAll($table) {
            $this->sql = "SELECT * FROM $table";

            $this->data = $this->dbcon->prepare($this->sql);
            if ( $this->data->execute()) {
                return $this->data->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        public function selectWhere($table, $columnName1, $columnValue1 ) {
            $this->sql = "SELECT * FROM $table WHERE $columnName1 = :$columnName1";
            $result = $this->dbcon->prepare($this->sql);
            
            $type = is_int($columnValue1) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $result->bindValue(":".$columnName1, $columnValue1, $type);
            if ($result->execute()) {
                return $result->fetch(PDO::FETCH_ASSOC);
            }
        }
    }
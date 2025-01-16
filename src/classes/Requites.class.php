<?php

use function PHPSTORM_META\type;

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

        // insertData
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

        //  selectAll
        public function selectAll($table, $columnName1 = null, $columnValue1 = null, $tableJoin1 = null, $conditionJoin1 = null) {
            $this->sql = "SELECT * FROM $table ";

            if ($tableJoin1 != null && $conditionJoin1 != null) {
                $this->sql .= " JOIN roles r ON $table.$conditionJoin1 = r.$conditionJoin1";
            }

            $this->data = $this->dbcon->query($this->sql);

            if ($columnName1 != null && $columnValue1 != null) {
                $this->sql .= " WHERE $columnName1 = :$columnName1";
                $this->data = $this->dbcon->prepare($this->sql);

                $type = is_int($columnValue1) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $this->data->bindValue(":$columnName1", $columnValue1, $type);
            }

            if ( $this->data->execute()) {
                return $this->data->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        // selectWhere 
        public function selectWhere($table, $columnName1, $columnValue1 ) {
            $this->sql = "SELECT * FROM $table WHERE $columnName1 = :$columnName1";
            $result = $this->dbcon->prepare($this->sql);
            
            $type = is_int($columnValue1) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $result->bindValue(":".$columnName1, $columnValue1, $type);
            if ($result->execute()) {
                return $result->fetch(PDO::FETCH_ASSOC);
            }
        }

        // selectCount
        public function selectCount($table, $columnName1 = null, $columnValue1 = null) {
            $this->sql = "SELECT COUNT(*) FROM $table ";
            $result = $this->dbcon->query($this->sql);

            if ($columnName1 != null && $columnValue1 != null) {
                $this->sql .= " WHERE $columnName1 = :$columnName1";
                $result = $this->dbcon->prepare($this->sql);
                $type = is_int($columnValue1) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $result->bindValue(":$columnName1", $columnValue1, $type);
            }
            if ($result->execute()) {
                $this->data = $result->fetch(PDO::FETCH_ASSOC);
                return $this->data["COUNT(*)"];
            }
        }

        // update
        public function update($table, $values, $columnName1, $columnValue1) {
            $columnSet = "";
            $param = [];

            foreach($values as $Key => $value) {
                $paramKey = "parame" . count($param);
                $columnSet .= $Key . "= :" . $paramKey .", ";
                $param[$paramKey] = $value;
            }

            $columnSet = rtrim($columnSet, ", ");
            $this->sql = "UPDATE $table SET $columnSet WHERE $columnName1 = :conditionValue";
            
            $stmt = $this->dbcon->prepare($this->sql);

            foreach($param as $Key => $value) {
                $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $stmt->bindValue(":$Key", $value, $type);
            }    

            $type = is_int($columnValue1) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue(":conditionValue", $columnValue1, $type);

            if ($stmt->execute()) {
                return $stmt;   
            }
        }

        // deleteWhere
        public function deleteWhere($table, $columnName1, $columnValue1) {
            $this->sql = "DELETE FROM $table WHERE $columnName1 = :keyName";
            $stmt = $this->dbcon->prepare($this->sql);
            $type = is_int($columnValue1) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue(':keyName', $columnValue1, $type);
            if ($stmt->execute()) {
                return $stmt;
            }
        }

        // fetchData
        public function fetchData($table, $filter1, $filter2, $search) {
            $this->sql = "SELECT * FROM $table WHERE 1";
            $params = array();

            if ($filter1 != "") {
                $this->sql .= " AND id_catalogue = ?";
                $params [] = $filter1;
            }
            if ($filter2 != "") {
                $this->sql .= " AND id_tag = ?";
                $params [] = $filter2;
            }
            if ($search != "") {
                $this->sql .= " AND ((cours_titre LIKE ?) OR (createDate LIKE ?))";
                $params [] = "%" . $search . "%"; 
                $params [] = "%" . $search . "%";
            }

            $stmt = $this->dbcon->prepare($this->sql);

            $stmt->execute($params);
                return $this->data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Max
        public function selectMAX($table, $columnName)
        {
            $this->sql = "SELECT MAX($columnName) FROM $table";
            $this->data = $this->dbcon->query($this->sql);
            $this->data = $this->data->fetch(PDO::FETCH_ASSOC);
            return $this->data["MAX($columnName)"];
        }
    }
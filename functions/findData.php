<?php
    function findAll($objectType, $id){
        global $con;

        $o = new $objectType();
        $table = $o->getTable();
        $orderBy = $o->getOrder();
        if(empty($table)){
            throw new Exception("Porperty table not set in model");
        }

        $collection = [];

        $rows = $con->query("SELECT * FROM {$table} ORDER BY $orderBy")->fetch_all(MYSQL_ASSOC);
        
        foreach($rows AS $row) {
            $object = new $objectType();
            foreach($row AS $key => $value) {
                $object->$key = $value;
            }
            $collection[] = $object;
        }

        return $collection;
    }

    function findOne($objectType, $id){
        global $con;

        $o = new $objectType();
        $table = $o->getTable();
        if(empty($table)) {
            throw new Exception("Property table not set in model");
        }

        $row = $con->query("SELECT * FROM {$table} WHERE id = '$id' LIMIT 1");

        if($row->num_rows == 0){
            return NULL;
        }

        $object = new $objectType();
        foreach($row->fetch_assoc() AS $key => $value) {
            $object->$key = $value;
        }

        return $object;
    }
?>
<?php

function findData($objectType, $id=0){
    $o = new $objectType;
    $table = $o->getTable();
    $orderBy = $o->getOrderBy();
    $query = mysqlConnect();

    if($id == 0){
        $getData = $query->prepare("SELECT * FROM $table ORDER BY $orderBy");
        $getData->execute();
        $collection = $getData->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $getData = $query->prepare("SELECT * FROM $table WHERE id = $id ORDER BY $orderBy");
        $getData->execute();
        $collection = $getData->fetch(PDO::FETCH_ASSOC);
    }

    return $collection;
}

function findCol($objectType, $col, $name){
    $o = new $objectType;
    $table = $o->getTable();
    $orderBy = $o->getOrderBy();
    $query = mysqlConnect();
    
    $getData = $query->prepare("SELECT * FROM $table WHERE $col = '$name' ORDER BY $orderBy");
    $getData->execute();
    $collection = $getData->fetchAll(PDO::FETCH_ASSOC);
    return $collection;
}
?>
<?php

function findData($objectType, $id=0){
    $o = new $objectType;
    $table = $o->getTable();
    $orderBy = $o->getOrderBy();
    // $con = "mysql:host=localhost;user=root;dbname=kitchenwiz";
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
?>
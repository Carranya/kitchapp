<?php

namespace Kw\Models;

class Model {

    public function getTable(){
        return $this->table;
    }

    public function getOrderBy(){
        return $this->orderBy;
    }

    public function save($id=0){
        include 'demo/demo.php';
        // echo "In der Demoversion nicht verfügbar!"; die;
        $query = mysqlConnect();
        if($id == 0){
            $keys = "";
            $values = "";
            $count = 1;

            foreach($this->data as $key => $value) {
                $keys .= $key;
                $values .= "'" . $value . "'";
                if($count != count($this->data)){
                    $keys .= ",";
                    $values .= ",";
                }
                $count++;
            }
            $saveData = $query->prepare("INSERT INTO $this->table ({$keys}) values ({$values})");
            $saveData->execute();
        } else {
            foreach($this->data as $key => $value){
                $saveData = $query->prepare("UPDATE $this->table SET {$key} = '$value' WHERE id = $id");
                $saveData->execute();
            }
        }
    }

    public function delete($id){
        include 'demo/demo.php';

        // echo "In der Demoversion nicht verfügbar!"; die;

        $query = mysqlConnect();
        $deleteData = $query->prepare("DELETE FROM $this->table WHERE id = $id");
        $deleteData->execute();
    }

    public function check($currentList, $id=0){
        $this->currentList = $currentList;
        $check = [];
        $index = 0;

        foreach($this->currentList as $list){
            foreach($list as $key => $value){
                if($key ==  'productId'){
                    $check[$key] = $value;
                    if($check[$key] == $this->productId){
                        $this->amount = $this->amount + $this->currentList[$index]['amount'];
                        $id = $this->currentList[$index]['id'];

                        $this->createData();
                    }
                }
            }
            $index++;    
        }
        return $id;
    }
}
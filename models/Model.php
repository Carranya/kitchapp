<?php

namespace Kw\Models;

class Model {
    public $id = 0;
    protected $table = "";
    protected $orderBy = "";

    public function save() {
        global $con;
        $reflect = new \ReflectionObject($this); // Aktuelle Tabelle ausgewählt
        $fields = [];
        foreach ($reflect->getProperties(\ReflectionProperty::IS_PUBLIC) as $prop) { // Liest jede key einzel
            $fileds[$prop->getName()] = $this->{$prop->getName()}; // Speichert Werte zu key ab.
        }

        if($this->id > 0) {
            $query = "UPDATE " . $this->table . " SET ";
            $items = [];
            foreach($fields AS $key => $value) {
                $items[] = " `{$key}`= '{$value}'";
            }
            $query .= implode(",", $items);
            $query .= " WHERE `id` = '{$this->id}' LIMIT 1";

            if(!$con->query($query)) {
                throw new \Exception(mysqli_error($con));
            }
        } else {
            $query = "INSERT INTO " . $this->table . " (";
            $query .= implode(",", array_keys($fields)) . ") VALUES (";
            $query .= "'" . implode("','", array_values($fileds)) . "')";
            if($con->query($query)) {
                $this->id = $con->insert_id;
            } else {
                throw new \Exception(mysqli_error($con));
            }
        }
    }

    public function delete() {
        global $con;
        $query = "DELETE FROM " . $this->table . " WHERE `id` = '" . $this->id . "'";
        if(!$con->query($query)) {
            throw new \Exception(mysqli_error($con));
        }
    }

    public function getTable() {
        return $this->table;
    }

    public function getOrder() {
        return $this->orderBy;
    }
}
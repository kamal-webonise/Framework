<?php

class BaseModel {
    protected $databaseConnection, $table, $modelName, $columnName = [];
    public $id;

    public function __construct() {
      $this->databaseConnection = DatabaseFactory::getDatabaseInstance();
      $this->getTableName();

      // gets model name from table name eg:- table_name will become TableName
      $this->modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->table)));
    }

    public function index() {
        //return $this->databaseConnection->query("select * from $this->table");
        $sql = "select * from ". $this->table;
        echo $sql;
        return $this->databaseConnection->query("select * from users");
    }

    protected function setTableColumns() {
        $columns = $this->getColumns();
        foreach($columns as $column) {
            $columnName = $column->Field;
            $this->columnName[] = $column->Field;
            //$this->{columnName} = null;
        }
    }

    public function getColumns() {
        return $this->databaseConnection->getColumns($this->table);
    }

    public function insert($fields) {
        if(!empty($fields)) {
            return $this->databaseConnection->insert($this->table, $fields);
        }
        else {
            return false;
        }
    }

    public function update($id, $fields) {
        if(empty($fields) || $id == '') {
            return false;
        }
        else {
            return $this->databaseConnection->update($this->table, $id, $fields);
        }
    }

    public function delete($id = '') {
        if($d == '' && $this->id == '') {
            return false;
        }

        $id = ($id == '') ? $this->id : $id; // if no id is passed, already available id will be used

        return $this->databaseConnection->delete($this->table, $id);
    }

    public function query($sql, $bind = []) {
        return $this->databaseConnection->query($sql, $bind);
    }

    // part of active record pattern to save current instance data
    public function save() {
        $fields = [];
        foreach($this->columnName as $column) {
            $fields[$column] = $this->$column;
        }

        // check if we need to insert or update the existing record
        if(property_exists($this, $id) && $this->id != '') {
            return $this->update($this->id, $fields);
        }
        else {
            return $this->insert($fields);
        }
    }

    public function getTableName() {

        if (!isset($this->table)) {
          $tableArray = preg_split('/(?=[A-Z])/', str_replace("Model","",get_class($this)));
          $tableString = '';
          foreach($tableArray as $table) {
              $tableString .= '_'.lcFirst($table);
          }
          $tableString .= 's';
          $this->table = ltrim($tableString, '_');
        }
    }

}

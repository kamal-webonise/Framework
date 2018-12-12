<?php
  class UserModel extends BaseModel {
    function __construct() {
      parent::__construct();
    }

    function insertUser($arr) {
      print_r($this->table);

      return $this->databaseConnection->insert($this->table,$arr);
    }
  }
?>
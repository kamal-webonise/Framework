<?php
  class BaseModel {

    function all($modelName) {
      var_dump($modelName);
      $users = [
      ["name" => "Williams Isaac", "Phone Number" => "090982xxxxxx"],
      ["name" => "Oji Mike", "Phone Number"=> "080982xxxxxx"]
      ];
      print_r(json_encode($users));
    }

    function find() {
      echo "find element";
    }
  }
?>

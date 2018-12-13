<?php
interface DatabaseInterface
{
    //function connect();
   // function disconnect();
    function error();
    function insert($table, $fields);
    function update($table, $id, $fields);
    function delete($table, $id);
    function query($sql, $params);
}

?>
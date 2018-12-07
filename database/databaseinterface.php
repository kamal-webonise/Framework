<?php
interface DatabaseInterface
{
    function connect();
    function disconnect();
    function select($tableName,$columns,$conditions,$limit,$offset);
    function insert($tableName,$columns,$values);
    function update($tableName,$columns,$values,$conditions);
    function delete($tableName, $conditions);
    function fetchFields($tableName);
}

?>
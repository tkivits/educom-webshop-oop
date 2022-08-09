<?php

interface ICrud 
{
    function createUserRow($array);
    function createOrderRow($array);
    public function createOrderItemsRow($order_id, $array);
    public function readOneRow($table, $row, $value);
    public function readMultipleRows($table, $row, $value);
    public function readTable($table);
}

?>
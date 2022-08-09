<?php

interface ICrud 
{
    function createUserRow($array);
    function createOrderRow($array);
    function createOrderItemsRow($order_id, $array);
    function readOneRow($table, $row, $value);
    function readMultipleRows($table, $row, $value);
    function readTable($table);
}

?>
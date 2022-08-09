<?php

interface IShopCrud
{
    function createNewOrder();
    function readSingleProduct($id);
    function readAllProducts();
}

?>
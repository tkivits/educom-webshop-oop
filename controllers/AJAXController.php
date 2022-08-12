<?php

class AJAXcontroller
{
    public $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function processRequest()
    {
        // Variabele uit url ophalen en doorgeven aan model
        $func = Util::getGETvar('function');
        if ($func = 'getRating')
        {
           $this->productID = Util::getGetvar('id');
        }
    }
}

?>
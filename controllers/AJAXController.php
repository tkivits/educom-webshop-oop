<?php

class Ajaxcontroller
{
    public function __construct($copy)
    {
        if (empty($copy)){
            $this->crud = new Crud;
            $this->crud = new RatingCrud($this->crud);
            $this->model = new AjaxModel(null, $this->crud);
            $this->view = new AjaxDoc($this->model);
        } else {
            $this->crud = $copy->crud;
            $this->model = $copy->model;
            $this->view = $copy->view;
        }
    }
}

?>